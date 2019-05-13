<?php
include 'database.php';
$db = "store";
$con = connect_db($root, $username, $password, $db);

if (isset($_POST['oui'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE item_id=$id";
    $query2 = "SELECT * FROM items where item_id = $id";
    $res = mysqli_query($con, $query2);
    $row = mysqli_fetch_array($res);
    if (mysqli_query($con, $sql)) {
        unlink($row['img']);
        header("location: ./admin.php");
    }
}
else if (isset($_POST['non'])) {
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>ADMIN PANEL</title>
</head>

<body>
    <div class="full_container">
        <div class="header">
            <img id="deco" src="img/relax.png" alt="icon">
            <h1>متجر العلم النافع</h1>
            <img src="img/relax.png" alt="icon">
        </div>
        <div class="content ">
            <div class="alert alert-warning " role="alert" style="width:30vw ">
                <h6 style=" text-align:center;">Etes Vous Sure De Vouloir Supprimer?</h6>
            </div>

            <div class="button d-flex justify-content-around">
                <form method="post">
                    <button type="submit" class="btn btn-success btn-lg " name="oui">OUI</button>
                    <button type="submit" class="btn btn-primary btn-lg" name="non">NON</button>
                </form>
            </div>

        </div>
    </div>

</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>