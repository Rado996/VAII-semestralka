<!DOCTYPE html>
<html lang="sk">
<head>

    <?php include('Head.php');
    ?>
    <style>
        <?php include 'css/1.css'; ?>
    </style>
</head>
<body>

<div class="container addPictureForm col-4" >
    <div class="pictureForm" id="picture_Form">
        <form action="Server.php" method="post" enctype="multipart/form-data">
            <label for="pic_name" > Názov obrazku </label>
            <input   id="pic_name" name="pic_name" class="form-control" cols="10" rows="1" placeholder="nejaky nazov">
            <label for="pic_desc" > Popis </label>
            <input  id="pic_desc" name="pic_desc" class="form-control" cols="10" rows="2">
            <label for="pic_source"> Obrázok </label>
            <input  id="pic_source" type="file" name="image" class="form-control" cols="30" rows="1" placeholder="vyberte obrázok">
            <button class="btn btn-primary btn-sm pull-right" type="submit" name="submit_picture" id="submit_picture">Pridať obrázok</button>
            <button class="btn btn-warning btn-sm pull-right"  id="cancel_new_picture">Zruš</button>
        </form>
    </div>

    <button class="btn btn-primary btn-sm pull-right"  id="add_new_picture">Pridať obrázok</button>

</div>

<?php if (isset($pics)):
foreach ($pics as $picture):
$pictureID = $picture['id'] ; ?>
<div class="container-fluid ">
    <div class="stlpec">

        <?php echo "<img src='img/".$picture['Image']."' alt='".$picture['Image_description']."' >" ?>

    </div>
</div>

<?php endforeach ?>
<?php endif ?>




<div class="riadok">
    <div class="stlpec">
        <img src="img/acai.jpg" alt="napoj">
        <img src="img/acaibowl.jpg" alt="jedlo">
        <img src="img/cheesecake.jpg" alt="kolac">
        <img src="img/croisan.jpg" alt="jedlo">
        <img src="img/drink.jpg" alt="napoj">

    </div>
    <div class="stlpec">
        <img src="img/kvety.jpg" alt="kvetz">
        <img src="img/limonada1.jpg" alt="napoj">
        <img src="img/limonada2.jpg" alt="napoj">
        <img src="img/limonada3.jpg" alt="napoj">
    </div>
    <div class="stlpec">
        <img src="img/kava.jpg" alt="napoj">
        <img src="img/kolace.jpg" alt="kolac">
        <img src="img/mojito.jpg" alt="napoj">
        <img src="img/toast.jpg" alt="jedlo">
    </div>
    <div class="stlpec">
        <img src="img/kolac.jpg" alt="kolac">
        <img src="img/melon.jpg" alt="napoj">
        <img src="img/frape.jpg" alt="napoj">
        <img src="img/milkshake.jpg" alt="napoj">
    </div>
</div>


</body>
</html>