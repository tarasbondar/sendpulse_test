$( document ).ready(function() {

    //login
    $(".form-signin").submit(function(event) {
        var mail = $('#inputEmail').val();
        var pass = $('#inputPassword').val();
        $.ajax({
            method: 'POST',
            url: 'php/login.php',
            data: {mail: mail, pass: pass},
            success: function(response) {
                if (response === 'no_match') {
                    window.alert('No records with given email and password found. Try another one.');
                } else {
                    window.location.href = 'blog.php';
                }
            }
        });
        event.preventDefault();
    });

    $(".go-to-register").click(function() {
        window.location.href = 'register.php';
    });

    $(".to-main-page").click(function() {
        window.location.href = 'index.php';
    });

    //register
    $(".form-register").submit(function(event) {
        var name = $('#inputName').val();
        var mail = $('#inputEmail').val();
        var pass = $('#inputPassword').val();
        var repa = $('#repeatPassword').val();
        if (pass === repa) {
            $.ajax({
                method: 'POST',
                url: 'php/register.php',
                data: {name: name, mail: mail, pass: pass},
                success: function(response) {
                    if (response === 'email_exists') {
                        window.alert('Entered email is already reserved. Try another one.');
                    } else {
                        window.alert('Account was created successfully! Try to login with your email and password now.');
                        window.location.href = 'index.php';
                    }
                },
                error: function() {
                    window.alert('something is wrong');
                }
            });
        } else {
            window.alert('Passwords don\'t match each other.'); //passwords must be equal
        }
        event.preventDefault();
    });

    $('.new-task').click(function(){
        window.location.href = 'task.php';
    });

    //manage task
    $(".form-task").submit(function(event) {
        var id      = $('#taskId').val();
        var user_id = $('#userId').val();
        var title   = $('#taskTitle').val();
        var date    = $('#taskDate').val();
        var descr   = $('#taskDescr').val();

        $.ajax({
            method: 'POST',
            url: 'php/task.php',
            data: {title: title, date: date, id: id, user_id: user_id, descr: descr},
            success: function(response) {
                if (response === 'wrong_date') {
                    window.alert('You\'ve entered passed time. Go for the one in the future.');
                    $('#taskDate').focus();
                } else {
                    window.location.href = 'blog.php';
                }
            },
            error: function() {
                window.alert('something is wrong');
            }
        });

        event.preventDefault();
    });

    $('.return-task').click(function(){
        window.location.href = 'blog.php';
    });

    $('.edit-task').click(function(){
        var id = $(this).attr('class').split(' ').pop().replace('task-','');
        window.location.href = 'task.php?task='+id;
    });

    $('.mark-task').click(function(){
        if (confirm('Is it really done?')) {
            var id = $(this).attr('class').split(' ').pop().replace('task-', '');
            $.ajax({
                method: 'POST',
                url: 'php/mark.php',
                data: {id: id},
                success: function (response) {
                    if (response === 'error') {
                        window.alert('Something went wrong.');
                    } else {
                        window.location.href = 'blog.php';
                    }
                }
            });
        }
    });

    $('.del-task').click(function(){
        if (confirm('Are you sure?')) {
            var id = $(this).attr('class').split(' ').pop().replace('task-','');
            $.ajax({
                method: 'POST',
                url: 'php/delete.php',
                data: {id: id},
                success: function(response) {
                    if (response === 'error') {
                        window.alert('Something went wrong.');
                    } else {
                        window.alert('Task was deleted');
                        window.location.href = 'blog.php';
                    }
                }
            });
        }
    });

    $(".logout").click(function(){
        $.ajax({
            url: 'php/logout.php'
        });
        window.location.href = 'index.php';
    });

});