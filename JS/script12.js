$(document).ready(function() {
    var id3 = 5
    var id2 = "#cicina" + id3
    console.log(id2);


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
        var email = $("#email").val();
        var pass = $("#pass").val();
        var name = $("#uname").val();

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
            alert('Prosím skontrolujete zadane údaje!');
        }


    });


    $("#submitComment").click(function () {

        var comment_text = $("#comment_text").val();
        if (comment_text === "" ) {
            alert('Prosím najprv napíšte komentar!');
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

    $("#submitItem").click(function () {
        var itemName = $("#item_name").val();
        var itemDescription =$("#item_description").val();
        var itemIngredients =$("#item_ingredients").val();
        var itemPrice =$("#item_price").val();
        console.log(itemPrice);
        if (itemPrice === "" ) {
            alert('Prosím najprv napíšte komentar!');
        }else {
            $.ajax({
                url: 'Ponuka.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    menuItem_added: 1,
                    menuItem_Name: itemName,
                    menuItem_Description: itemDescription,
                    menuItem_Ingredients: itemIngredients,
                    menuItem_Price: itemPrice,
                }, success: function (response) {
                    console.log(response);
                }

            });
        }
    });

    $("#addMenuItem").click(function () {
        $("#addMenuItem").css("display", "none");

        $("#addMenuItemForm").css("display", "block");
    });

    $("a.editItembtn").click(function () {
        var id = $(this).data("itid");
        //var id = document.getElementById(idtest).getAttribute("data-itid");
        var editFormId = "ponuka-menuEditFormID" + id;
        console.log(editFormId);
        var editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "block";
        console.log(id);


    });

});