<?php
    require_once 'connection.php'; 

    if(isset($_POST['submit'])){

        $label = $_POST['label'] ; 
        $auteur = $_POST['auteur']; 
        $date = $_POST['date']; 
    
        $requete_creation = "INSERT INTO exo(label,auteur,_date) VALUES ('$label','$auteur','$date')";
        $result = mysqli_query($conn,$requete_creation); 
        if($result){
            header("Location:index.php"); 
        }else{
            echo "ERREUR DE CREATION"; 
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD APP</title>
    <style>
        .container{
            margin-top: 50px;
            width: 50%;
            margin-left: 30%;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>CREATE:</h1>
    <form action="./create.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">LABEL</label>
            <input type="text" name="label" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter label" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">AUTEUR</label>
            <input type="text" name="auteur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter auteur" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">DATE</label>
            <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">ENREGISTRER</button>
        </form>
    </div>
</body>
</html>