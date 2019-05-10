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
            <form id="insert_form">
                <div class="form-group">
                    <label for="hassan">Nom:</label>
                    <input type="Name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="Prix">Prix: (en DH)</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Prix: (en DH)">
                </div>
                <div class="form-group">
                    <label for="Tous les livres">Catégorie</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>html</option>
                        <option>CSS</option>
                        <option>JS</option>
                        <option>bootstrap</option>
                        <option></option>
                    </select>
                </div>
                <div class="input">
                    <label for="avatar">Sélectionner une image:</label>
                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
                </div>
                <div class="button">
                    <button type="button" class="btn btn-success btn-lg">Ajouter</button>
                    <button type="button" class="btn btn-primary btn-lg">Retour</button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>