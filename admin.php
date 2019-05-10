<?php
include "database.php";
$db = "store";
$query = "SELECT items.item_id, items.name, items.description, items.price, categories.name AS category FROM items, categories WHERE categories.cat_id = items.cat_id";
$con = connect_db($root, $username, $password, $db);


if (isset($_GET['id'])) { }


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
        <div class="content">
            <div class="table_container table-responsive">
                <table class="table table-hover table-dark table-bordered" id="admin_table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Categorie</th>
                            <th scope="col" style='text-align:center; width: 35%'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result = mysqli_query($con, $query)) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td style='text-align: center'>
                                <form method='get' action='view.php' style='display:inline;'>
                                    <input type='hidden' value=" . $row['item_id'] . " name='id'/>
                                    <button type='submit' class='btn btn-light'><i class='fas fa-eye'></i>&nbsp;&nbsp;Voir</button>
                                </form>
                                <form method='get' action='update.php' style='display:inline;'>
                                    <input type='hidden' value=" . $row['item_id'] . " name='id'/>
                                    <button type='submit' class='btn btn-primary'><i class='fas fa-pen'></i>&nbsp;&nbsp;Modifier</button>
                                </form>
                                <form method='get' action='delete.php' style='display:inline;'>
                                    <input type='hidden' value=" . $row['item_id'] . " name='id'/>
                                    <button type='submit' class='btn btn-danger'><i class='far fa-trash-alt'></i>&nbsp;&nbsp;Supprimer</button>
                                </form>
                                </td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                location.reload();
            },2000)
        })
    </script>
</body>

</html>