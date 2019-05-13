<?php	
include "database.php";
$db = "store";
$con = connect_db($root, $username, $password, $db);

$query1 = "SELECT * FROM categories";
	
if(isset($_POST["submit"])) {

$name= $_POST["name"];
$desc= $_POST["desc"];
$price= $_POST["prix"];
$cat= $_POST["cat"];
	
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$message="";
// Check if image file is a actual image or fake image
	
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
		$message = "File is an image - " . $check["mime"];
		$uploadOk = 1;
    } else {
		$message="File is not an image - " . $check["mime"];
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    $message= "
  		Sorry, file already exist";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message= "
  		Sorry, your file is too large";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $message= "
  		Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "
	<div style='text-align:center' class='alert alert-warning' role='alert'>
  		Sorry, your file was not uploaded. ".$message."</div>";
	// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "
		<div style='text-align:center' class='alert alert-success' role='alert'>
  		The file ". basename( $_FILES["fileToUpload"]["name"]). ". has been uploaded. ".$message."</div>";
		
		$url= "upload/".basename( $_FILES["fileToUpload"]["name"]);
		
		$query2 = "INSERT INTO items VALUES (null,'$name', '$desc', $price,'$cat','$url')";
		if (mysqli_query($con, $query2)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query2 . "<br>" . mysqli_error($con);
		}

$con->close();
header('Location: ./admin.php');	

    } else {
        echo "
		<div style='text-align:center' class='alert alert-warning' role='alert'>
  		Sorry, there was an error uploading your file.</div>";
	    }
	}

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
            <form id="insert_form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="hassan">Nom:</label>
                    <input type="Name" class="form-control" name="name" id="exampleFormControlInput1" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Description" name="desc">
                </div>
                <div class="form-group">
                    <label for="Prix">Prix: (en DH)</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Prix: (en DH)" name="prix">
                </div>
                <div class="form-group">
                    <label for="Tous les livres">Catégorie</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="cat">
                       
                       <?php
                        if ($result = mysqli_query($con, $query1)) {
                            while ($row = mysqli_fetch_array($result)) {
								echo "<option id='". $row['cat_id'] . "o' value='" . $row['cat_id'] . "'>" . $row['name'] . "</option>";
							}
						}
                        ?>
                        
                    </select>
                </div>
                <div class="input">
                    <label for="avatar">Sélectionner une image:</label>
                    <input type="file" id="avatar" name="fileToUpload" accept="image/png, image/jpeg">
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-success btn-lg" name="submit">Ajouter</button>
                    <button type="submit" class="btn btn-primary btn-lg" name="back">Retour</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>