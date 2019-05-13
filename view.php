<?php
include "database.php";
$db = "store";
$con = connect_db($root, $username, $password, $db);
$id = $_GET['id'];


if (isset($_GET['id'])) {
    $query1 = "SELECT * FROM items where item_id = $id;";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
    $cat_id = $row1['cat_id'];

    $query2 = "SELECT * FROM categories where cat_id = $cat_id;";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
}

if(isset($_POST['back'])) {
    header("location: ./admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Reem+Kufi" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="style(2).css">
    <title>ADMIN PANEL</title>
</head>

<body>
    <div class="full_container">
        <div class="header">
            <img id="deco" src="img/relax.png" alt="icon">
            <h1>متجر العلم النافع</h1>
            <img src="img/relax.png" alt="icon">
        </div>
        <div class="content">
            <div class="car">
                <div class="slam1">
                    <form id="update_form" method="post">
                        <h1>Modifier un item:</h1>
                        <div class='form-group'>
                            <label for='hassan'>Nom:</label>
                            <input type='Name' class='form-control' name='name' id='exampleFormControlInput1' value='<?php echo $row1['name'] ?>' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='Description'>Description</label>
                            <input type='text' class='form-control' id='exampleFormControlInput1' name='desc' value='<?php echo $row1['description'] ?>' disabled>
                        </div>
                        <div class='form-group'>
                            <label for='Prix'>Prix: (en DH)</label>
                            <input type='number' class='form-control' id='exampleFormControlInput1' name='prix' value='<?php echo $row1['price'] ?>' disabled>
                        </div>
                        <div class="form-group">
                            <label for="Tous les livres">Catégorie</label>
                            <input type='text' class='form-control' id='exampleFormControlInput1' name='cat' value='<?php echo $row2['name'] ?>' disabled>
                        </div>
                        <div class='form-group' style="display:inline">
                            <label style="display:inline">Image: </label>
                            <p style="color:white; display:inline"><?php echo $row1['img'] ?></p>
                        </div>
                        <div class=" button">
                            <button type="submit" class="btn btn-primary btn-lg" name="back"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Retour</button>
                        </div>
                    </form>
                </div>
                <div class="slam2" style="margin-top: 2vw;">
                    <form id="card_form">
                        <div class='card' >
                            <img class='card-img-top' src=<?php echo $row1['img'] ?> alt='Card image cap'>
                            <div class='card-img-overlay'>
                                <a href='#' class='btn btn-warning btn-lg deactivate' id='price' disabled><?php echo $row1['price'] ?> dhs</a>
                            </div>
                            <div class='card-body'>
                                <h1><?php echo $row1['name'] ?></h1>
                                <h2><?php echo $row1['description'] ?></h2>
                            </div>
                            <div class="card-footer">
                                <button type='button' id='command' class='btn btn-warning btn-lg '>Commander</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>