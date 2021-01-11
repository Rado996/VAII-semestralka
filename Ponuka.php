
<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php')  ?>


</head>
<body>

<div class="container col-4 " id="addMenuItemForm" >
    <label > Názov položky </label>
        <input  name="item_name" id="item_name" class="form-control" cols="10" rows="1" placeholder="nejaky nazov">
    <label > Popis </label>
        <input name="item_description" id="item_description" class="form-control" cols="30" rows="1">
    <label > Ingrediencie </label>
        <input name="item_ingredients" id="item_ingredients" class="form-control" cols="30" rows="1">
    <label > Cena  </label>
        <input name="item_price" id="item_price" class="form-control" cols="5" rows="1">
        <button class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitItem">Pridať položku</button>
</div>

<div class="container col-2">
    <button class="btn btn-primary btn-sm " name="addMenuItem" id="addMenuItem">Pridať položku</button>
</div>

<div id="editItemModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <label > Názov položky </label>
                <input  name="editItem_name" id="editItem_name" class="form-control" cols="10" rows="1" >
                <label > Popis </label>
                <input name="editItem_description" id="editItem_description" class="form-control" cols="30" rows="1">
                <label > Ingrediencie </label>
                <input name="editItem_ingredients" id="editItem_ingredients" class="form-control" cols="30" rows="1">
                <label > Cena € </label>
                <input name="editItem_price" id="editItem_price" class="form-control" cols="5" rows="1">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-block" id="saveEdit">Uložiť</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Zavrieť</button>
            </div>
        </div>
    </div>


</div>


<?php if (isset($menu)):
    foreach ($menu as $menuItem):
        $menuItemID = $menuItem['id'] ; ?>
        <div class="container-fluid " id="ponuka-menu">
            <table>
                <tr>
                    <td colspan="11"><?php echo $menuItem['ItemName']; ?></td>
                    <td colspan="1" class="cena"> <?php echo $menuItem['Price']; ?>€ </td>
                </tr>
                <tr>
                    <td colspan="11"> <?php echo $menuItem['Description']; ?> </td>
                    <td colspan="1" > <div class="edit"><a class="editItembtn" data-itid="<?php echo $menuItem['id']; ?>" id="editMenuItem" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z"/>
                                </svg></a> </div></td>
                </tr>
                <tr>
                    <td colspan="11"> <?php echo $menuItem['Ingredients']; ?>  </td>
                    <td colspan="1" > <div class="delete" > <a class="deleteItembtn" data-itid="<?php echo $menuItem['id']; ?>" id="deleteMenuItem" > <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a> </div></td>
                </tr>
            </table>
        </div>

        <div class="container-fluid edit_menu_form" id="ponuka-menuEditFormID<?php echo $menuItem['id']; ?>">
            <table>
                <tr>
                    <td colspan="11">
                        <label for="editItem_name<?php echo $menuItem['id']; ?>" > Názov položky </label>
                        <input  class="form-control edit_menu_item" name="editItem_name" id="editItem_name<?php echo $menuItem['id']; ?>"  cols="2" rows="1" placeholder="<?php echo $menuItem['ItemName']; ?> ">
                    </td>
                    <td colspan="1" >
                        <label for="editItem_price<?php echo $menuItem['id']; ?>" > Cena </label>
                        <input  name="editItem_price" id="editItem_price<?php echo $menuItem['id']; ?>" class="form-control edit_menu_item" cols="2" rows="1" placeholder="<?php echo $menuItem['Price']; ?> " >€
                    </td>
                </tr>
                <tr>
                    <td colspan="11">

                    <label for="editItem_description<?php echo $menuItem['id']; ?>" > Popis </label>
                        <input  name="editItem_description" id="editItem_description<?php echo $menuItem['id']; ?>" class="form-control edit_menu_item" cols="2" rows="1" placeholder="<?php echo $menuItem['Description']; ?> " >
                   </td>
                    <td colspan="1" > <div class="submit"><a class="submitEditItembtn" data-itid="<?php echo $menuItem['id']; ?>" id="submitEditMenuItem" ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                    <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.117 8.117 0 0 1-3.078.132 3.658 3.658 0 0 1-.563-.135 1.382 1.382 0 0 1-.465-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.393-.197.625-.453.867-.826.094-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.2-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.175-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.247-.013-.574.05-.88.479a11.01 11.01 0 0 0-.5.777l-.104.177c-.107.181-.213.362-.32.528-.206.317-.438.61-.76.861a7.127 7.127 0 0 0 2.657-.12c.559-.139.843-.569.993-1.06a3.121 3.121 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.591 1.927-5.566 4.66-7.302 6.792-.442.543-.796 1.243-1.042 1.826a11.507 11.507 0 0 0-.276.721l.575.575zm-4.973 3.04l.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043l.002.001h-.002z"/>
                                </svg></a> </div></td>
                </tr>
                <tr>
                    <td colspan="11">

                        <label for="editItem_ingredients<?php echo $menuItem['id']; ?>" > Zloženie </label>
                        <input  name="editItem_ingredients" id="editItem_ingredients<?php echo $menuItem['id']; ?>" class="form-control edit_menu_item" cols="2" rows="1" placeholder="<?php echo $menuItem['Ingredients']; ?>  " >

                    </td>
                    <td colspan="1" > <div class="cancel" > <a class="cancelEditItembtn" data-itid="<?php echo $menuItem['id']; ?>" id="cancelEditMenuItem"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a> </div></td>
                </tr>
            </table>

        </div>
    <?php endforeach ?>
<?php endif ?>

</body>

</html>