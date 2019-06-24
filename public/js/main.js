var errors_alerts = `<div class="alert alert-danger alert-dismissible fade show text-muted" role="alert">
    <strong><i class="fas fa-exclamation-circle mr-2"></i>Se produjeron los siguientes errores:</strong>
    <ul>(items)</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>`;

var done_alerts = `<div class="alert alert-success alert-dismissible fade show text-muted" role="alert">
    <i class="fas fa-check-circle mr-2"></i>(response)
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>`;

$(document).ready(function() {
    /**
     * CRUD
     */
        // READ //
        $('#btn_list').click(function() {
            if ($(this).attr('data-path').split('/').pop() == 'usuarios')
                GetUsuarios();
            else
                GetReportes();
                
        })
    
        $(document).on('click', '#btn_filter_reportes', function() {
            GetReportes($('#fecha_desde').val(), $('#fecha_hasta').val());
        })
        // READ //
        
        // CREATE //
        $(document).on('click', '.btn_create', function(e) {
            e.preventDefault();
            let datafileds = $(this).data();
            $.ajax({
                type : 'GET',
                url : datafileds.path,
                success: function(data) {
                    $('#formModalLbl').text(datafileds.title);
                    $('#formModal .modal-body').html(data);
                    $('#formModal').modal('toggle');
                }
            });
        });

        $(document).on('submit', '#form_create', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                error: function(data) {
                    let dataJSON = data.responseJSON;
                    let items = '';
                    $.each(dataJSON.errors, function() {
                        items += `<li>${this[0]}</li>`;
                    })
                    $('.form_errors').html(errors_alerts.replace('(items)', items));
                },
                success: function(data) {
                    $('#formModal').modal('toggle');
                    $('#table').html(data);
                    $('.alerts').html(done_alerts.replace('(response)', 'El registro fue creado exitosamente'));
                }
            });
        });
        // CREATE //

        // EDIT //
        $(document).on('click', '.btn_edit', function(e) {
            e.preventDefault();
            let datafileds = $(this).data();
            $.ajax({
                type : 'GET',
                url : datafileds.path,
                success: function(data) {
                    $('#formModalLbl').text(datafileds.title);
                    $('#formModal .modal-body').html(data);
                    $('#formModal').modal('toggle');
                }
            });
        });

        $(document).on('submit', '#form_edit', function(e) {
            e.preventDefault();
            let action = $(this).attr('action');
            $.ajax({
                url: action,
                type: 'PUT',
                data: $(this).serialize(),
                error: function(data) {
                    let dataJSON = data.responseJSON;
                    let items = '';
                    $.each(dataJSON.errors, function() {
                        items += `<li>${this[0]}</li>`;
                    })
                    $('.form_errors').html(errors_alerts.replace('(items)', items));
                },
                success: function(data) {
                    if (action.indexOf(`/usuarios/${$('#dropdownMenuUsuario').text().trim()}`) > -1) {
                        let data_path = $('.dropdown-item.btn_edit').attr('data-path');
                        let old_name = $('#dropdownMenuUsuario').text().trim();
                        let name = $('input[name="name"]').val()
                        $('.dropdown-item.btn_edit').attr('data-path', data_path.replace(old_name, name));
                        $('.dropdown-item.btn_edit').data('path', data_path.replace(old_name, name));
                        $('#dropdownMenuUsuario').text(name);
                    } else {
                        $('#table').html(data);
                    }
                    $('#formModal').modal('toggle');
                    $('.alerts').html(done_alerts.replace('(response)', 'El registro fue editado exitosamente'));
                }
            });
        });
        // EDIT //

        // DELETE //
        $(document).on('click', '.btn_delete', function(e) {
            e.preventDefault();
            let datafileds = $(this).data();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type : 'DELETE',
                url : datafileds.path,
                error: function(data) {
                    let dataJSON = data.responseJSON;
                    let items = '';
                    $.each(dataJSON.errors, function() {
                        items += `<li>${this[0]}</li>`;
                    })
                    $('.alerts').html(errors_alerts.replace('(items)', items));
                },
                success: function(data) {
                    $('#table').html(data);
                    $('.alerts').html(done_alerts.replace('(response)', 'El registro fue eliminado exitosamente'));
                }
            });
        })
        // DELETE //
    /**
     * CRUD
     */        

     $(document).on('click', '.btn_edit_password', function(e) {
        e.preventDefault();
        if ($('input[name="clave_actual"]').length) return false;
        let strInputs = '<div class="form-group d-flex position-relative"><i class="text-muted fas fa-eye pass-showhide"></i>'
            + '<input type="password" class="form-control" name="clave_actual" placeholder="Clave Actual"></div>'
            + '<div class="form-group d-flex position-relative"><i class="text-muted fas fa-eye pass-showhide"></i>'
            + '<input type="password" class="form-control" name="clave_nueva" placeholder="Clave Nueva"></div>'
        $('#form_edit .row').before(strInputs);
    })

    $(document).on('click', '.pass-showhide', function() {
        let password_input = $(this).next();
        if ($(this).hasClass('fa-eye')) {
            password_input.attr('type', 'text');
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
        }
        else {
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            password_input.attr('type', 'password');
        }
    });

    $(document).on('change keyup keypress paste', 'textarea', function() {
        $('#chars').text(`Caracteres Restantes: ${400 - $(this).val().length}`);
    });
});

function GetReportes(fecha_desde=GetCurrentDate(), fecha_hasta=GetCurrentDate()) {
    let urlbase = (document.querySelector('base') || {}).href;
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: `${urlbase}reportes/filter`,
        type: 'POST',
        data: { 'fecha_desde': fecha_desde, 'fecha_hasta': fecha_hasta },
        error: function(data) {
            let dataJSON = data.responseJSON;
            let items = '';
            $.each(dataJSON.errors, function() {
                items += `<li>${this[0]}</li>`;
            })
            $('.alerts').html(errors_alerts.replace('(items)', items));
        },
        success: function(data) {
            $('#table').html(data);
            $('#btn_list').attr('data-path',`${urlbase}usuarios`);
            $('#btn_list').text('Listar Usuarios');
        }
    });
}

function GetUsuarios() {
    let urlbase = (document.querySelector('base') || {}).href;
    $.ajax({
        url: `${urlbase}usuarios`,
        type: 'GET',
        success: function(data) {
            $('#table').html(data);
            $('#btn_list').attr('data-path',`${urlbase}reportes/filter`);
            $('#btn_list').text('Listar Reportes');
        }
    });
}

function GetCurrentDate() {
    let date = new Date();
    return `${date.getFullYear()}-${("0" + (date.getMonth() + 1)).slice(-2)}-${("0" + date.getDate()).slice(-2)}`;
}