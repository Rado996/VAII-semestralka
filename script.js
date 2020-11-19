$(document).ready(function() {


    $("#LogIn").click(function () {
        var name = $("#name").val();
        var pass = $("#pass").val();

        if (name != "" && pass != "" ){
            $.ajax({
                url: 'Login.php',
                method:'POST',
                dataType: 'json',
                data: {
                    Login: 1,
                    name: name,
                    pass: pass
                }, success: function (response){
                    console.log(response);
                }

            });

        }


    });

    $("#Logout").click(function () {
        $(this).hide();
        $.ajax({
            url: 'Index.php',
            method:'POST',
            dataType: 'json',
            data: {
                Logout: 1,
            }, success: function (response){
                console.log(response);
            }

        });

    });

    $("#Register").click(function () {
        var name = $("#uname").val();
        var email = $("#email").val();
        var pass = $("#pass").val();

        if (name != "" && pass != ""  && email != ""){
            $.ajax({
                url: 'Register.php',
                method:'POST',
                dataType: 'json',
                data: {
                    Register: 1,
                    name: name,
                    email: email,
                    password: pass
                }, success: function (response){
                    if(response === 'failedEmail')
                        alert('Prosím zadajte valídný email!');
                    else if(response === 'failedUserExists')
                        alert('Zadaný email už je registrovaný!');
                    else{
                        window.location = window.location;
                    }
                }

            });

        }else {
            alert('Prosím skontrolujete zadane údaje!')
        }


    });

    $("#submitComment").click(function () {
        var comment_text = $("#comment_text").val();

        if (comment_text === "" ) {
            alert('Prosím najprv napíšte komentar!')
        }else {
            $.ajax({
                url: 'Recenzie.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    comment_posted: 1,
                    comment_text: comment_text,
                }, success: function (response) {
                    console.log(response);
                }

            });
        }
    });


});