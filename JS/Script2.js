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
                    menuItem_submitted:1,
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
        var editFormId = "ponuka-menuEditFormID" + id;
        //console.log(editFormId);
        var editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "block";
        //console.log(id);

    });

    $("a.cancelEditItembtn").click(function () {
        var id = $(this).data("itid");
        var editFormId = "ponuka-menuEditFormID" + id;
        var editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "none";

    });

    $("a.submitEditItembtn").click(function () {
        let id = $(this).data("itid");
        let editFormId = "ponuka-menuEditFormID" + id;
        let newNameElement = document.getElementById("editItem_name"+id);
        let newName = $(newNameElement).val();
        let newPriceElement = document.getElementById("editItem_price"+id);
        let newPrice = $(newPriceElement).val();
        let newDescriptionElement = document.getElementById("editItem_description"+id);
        let newDescription = $(newDescriptionElement).val();
        let newIngredientsElement = document.getElementById("editItem_ingredients"+id);
        let newIngredients = $(newIngredientsElement).val();
        if (newPrice === "" ) {
            alert('Prosím najprv napíšte komentar!');
        }else {
            $.ajax({
                url: 'Ponuka.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    menuItem_submitted:1,
                    menuItem_edited: 1,
                    menuItem_editID: id,
                    menuItem_Name: newName,
                    menuItem_Description: newDescription,
                    menuItem_Ingredients: newIngredients,
                    menuItem_Price: newPrice,
                }, success: function (response) {
                    console.log(response);
                    window.location = window.location;
                }

            });
        }
        var editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "none";
        location.reload();
    });

    $("a.deleteItembtn").click(function () {
        var id = $(this).data("itid");
        console.log(id);
        $.ajax({
            url: 'Ponuka.php',
            method: 'POST',
            dataType: 'json',
            data: {
                menuItem_deleted:1,
                menuItem_deleteID: id,
            }, success: function (response) {
                console.log(response);
                console.log("done");
            }

        });
        location.reload();

    });

    $("#add_new_picture").click(function() {
        $(this).css("display", "none");
        $("#picture_Form").css("display", "block");

    });

    $("#cancel_new_picture").click(function() {
        $("#picture_Form").css("display", "none");
        $("#add_new_picture").css("display", "block");

    });

    $("#submit_picture").click(function (){
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    });

    $("a.editPicturebtn").click(function () {
        let id = $(this).data("itid");
        let editFormId = "pictureEditForm" + id;
        let editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "block";
        let picture = "pictureDisplay" +id;
        document.getElementById(picture).style.display= "none";

    });

    $("a.deletePicturebtn").click(function () {
        let id = $(this).data("itid");
        $.ajax({
            url: 'Ponuka.php',
            method: 'POST',
            dataType: 'json',
            data: {
                picture_deleted:1,
                picture_deleteID: id,
            }, success: function (response) {
                console.log(response);
            }

        });
        location.reload();

    });

    $("a.submitEditPicturebtn").click(function () {
        let id = $(this).data("itid");
        let editFormId = "pictureEditFormID" + id;
        let newNameElement = document.getElementById("editPicture_name"+id);
        let newName = $(newNameElement).val();
        let newDescriptionElement = document.getElementById("editPicture_description"+id);
        let newDescription = $(newDescriptionElement).val();
        if (newName === "" ) {
            alert('Prosím najprv napíšte komentar!');
        }else {
            $.ajax({
                url: 'Fotogaleria.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    picture_edited: 1,
                    picture_editID: id,
                    picture_Name: newName,
                    picture_Description: newDescription,
                }, success: function (response) {
                    console.log(response);
                    window.location = window.location;
                }

            });
        }
        let editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "none";
        location.reload();
    });

    $("a.cancelEditPicturebtn").click(function () {
        let id = $(this).data("itid");
        let editFormId = "pictureEditFormID" + id;
        let editElementForm = document.getElementById(editFormId);
        editElementForm.style.display = "none";
        let picture = "pictureDisplay" +id;
        document.getElementById(picture).style.display= "block";
    });





});