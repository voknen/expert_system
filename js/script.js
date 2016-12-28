function registerFormAction() {
    $('body').on('submit', '#register-form', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');

        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                    $('#register-form')[0].reset();
                    $('#register-form').before('<p class="success">' + response.success + '</p>')
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        if (key == 'role') {
                            $('select[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                        }
                        $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                    });
                });
            }
        });
        
        return false;
    });
}

function loginFormAction() {
    $('body').on('submit', '#login-form', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');

        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                    if (response.role == 'user') {
                        window.location.href = "/expert_system/views/index_user.php";
                    } else {
                        window.location.href = "/expert_system/views/index_expert.php";
                    }
                    document.cookie = "id=" + response.user_id + "; path=/";
                    document.cookie = "role=" + response.role + "; path=/";
                    document.cookie = "is_logged=" + response.is_logged + "; path=/";
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                    });
                });
            }
        });
        
        return false;
    });
}

function addCompanyAction() {
    $('body').on('submit', '#add-company', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');

        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                $('#add-company')[0].reset();
                $('#add-company').before('<p class="success">' + response.success + '</p>')
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                    });
                });
            }
        });
        
        return false;
    });
}

function editCompanyAction() {
    $('body').on('submit', '#edit-company', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');
        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                $('#edit-company').before('<p class="success">' + response.success + '</p>')
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                    });
                });
            }
        });
        
        return false;
    });
}

function addPositionAction()
{
    $('body').on('submit', '#add-position', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');
        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                $('#add-position')[0].reset();
                $('#add-position').before('<p class="success">' + response.success + '</p>')
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        if (key == 'salary' || key == 'name' || key == 'experience') {
                            $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                        } else {
                            $('select[name="' + key + '[]"]').after('<p class="error-input">' + sub_value + '</p>');
                        }  
                    });
                });
            }
        });
        
        return false;
    });
}

function editPositionAction()
{
    $('body').on('submit', '#edit-position', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');
        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                $('#edit-position').before('<p class="success">' + response.success + '</p>')
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        if (key == 'salary' || key == 'name' || key == 'experience') {
                            $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                        } else {
                            $('select[name="' + key + '[]"]').after('<p class="error-input">' + sub_value + '</p>');
                        }  
                    });
                });
            }
        });
        
        return false;
    });
}

function deletePositionAction()
{
    $('body').on('click', '.delete-position', function(){
        var data = {
            id : $(this).data('id'),
            company_id : $(this).data('company-id'),
            action : 'delete_position_action'
        }
        $.ajax({
            url: '../library/ajax.php',
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                
            },
            success: function (response) {
                if (response.success) {
                    window.location.href = '/expert_system/views/view_company.php?id=' + response.id;  
                }
            },
            error: function (xhr) {
                
            }
        });
        
        return false;
    })
}

function editUserDataAction()
{
    $('body').on('submit', '#edit-user-data', function(){
        var data = $(this).serializeArray();
        var formUrl = $(this).attr('action');
        $.ajax({
            url: formUrl,
            type: 'POST',
            dataType: 'json',
            data: data,
            beforeSend: function () {
                $('p.error-input').remove();
                $('p.success').remove();
            },
            success: function (response) {
                $('#edit-user-data').before('<p class="success">' + response.success + '</p>')
            },
            error: function (xhr) {
                var json_response = JSON.parse(xhr.responseText);
                $.each(json_response, function(key, value){
                    $.each(value, function(sub_key, sub_value){
                        if (key == 'salary' || key == 'firstname' || key == 'experience' || key == 'lastname' || key == 'email') {
                            $('input[name="' + key + '"]').after('<p class="error-input">' + sub_value + '</p>');
                        } else {
                            $('select[name="' + key + '[]"]').after('<p class="error-input">' + sub_value + '</p>');
                        }  
                    });
                });
            }
        });
        
        return false;
    });
}

function findPositionsBy()
{
    $('body').on('change', '#show-positions', function(){
        var id = $(this).val();
        $('div.positions').hide();
        $('#' + id).show();
    });
}

$(document).ready(function(){
    $(".main_menu_user").load("menu_user.html");
    $(".main_menu_expert").load("menu_expert.html");
    registerFormAction();
    loginFormAction();
    addCompanyAction();
    editCompanyAction();
    addPositionAction();
    editPositionAction();
    deletePositionAction();
    editUserDataAction();
    findPositionsBy();
});