<?php
include 'database.php';
$query = "SELECT * FROM categories;";
$db = "store";
$con = connect_db($root, $username, $password, $db);
$sql = "SELECT * FROM items;";

if (isset($_POST['id'])) {
    if ($_POST['id'] == "*") {
        $sql = "SELECT * FROM items;";
    } else {
        $sql = " SELECT * FROM items WHERE cat_id =" . $_POST['id'] . ";";
    }
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
            <a href="admin.php" id="admin_button"><i class="fas fa-tachometer-alt" style="color:white; font-size:2.5vw"></i></a>
        </div>
        <div class="content">
            <div class="Choices">
                <form method="post" style='display:inline'>
                    <input type="hidden" value="*" name="id">
                    <button type="submit" class="btn btn-unique btn-rounded" id="all">Tous les livres</button>
                </form>
                <?php
                if ($result = mysqli_query($con, $query)) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<form method='post' style='display:inline'>
                        <input type='hidden' value=" . $row['cat_id'] . " name='id'>
                        <button type='submit' class='btn btn-unique btn-rounded'>" . $row['name'] . "</button>
                        </form>";
                    }
                }
                ?>
            </div>
            <div class="items">
                <div class="container">
                    <div class="row">
                        <div class="card-deck">
                            <?php
                            if ($result = mysqli_query($con, $sql)) {
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "
                                        <div class='col-sm-4'>
                                            <div class='card' style='margin: 10px;'>
                                                    <img class='card-img-top' src='".$row['img']."' alt='Card image cap'>
                                                    <div class='card-img-overlay'>
                                                        <a href='#' class='btn btn-warning btn-lg deactivate' id='price' disabled>". $row['price'] ." DHS</a>
                                                    </div>
                                                    <div class='card-body'>
                                                        <h1>". $row['name'] ."</h1>
                                                        <h2>". $row['description'] ."</h2>
                                                        <button type='button' id='command' class='btn btn-warning btn-lg '>commander</button>
                                                    </div>
                                            </div>
                                        </div>";
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
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
<script>
    $(document).onload(function(){
        $("#all").click();
    })

    $()
</script>
</html>