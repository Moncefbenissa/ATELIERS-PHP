<?php
    require 'connection.php'; 
    //load('index.php',$id_up); 


    if(isset($_POST['update'])){
        $id_up = (int)$_POST['id_update'];
         
        $req = "SELECT * FROM exo WHERE id=$id_up;"; 
        $result_p = mysqli_query($conn,$req); 
        $tableau_u = mysqli_fetch_assoc($result_p);
           
   }


    if(isset($_POST['modifier'])){
        
        $id_up_2 = (int)$_POST['id_up']; 

        $label_n = $_POST['label_n']; 
        $auteur_n =  $_POST['auteur_n']; 
        $date_n =  $_POST['date_n'];
        
        $requete_up = "UPDATE exo SET label = '$label_n', auteur = '$auteur_n', _date ='$date_n' WHERE id=$id_up_2;" ;
        $result_update = mysqli_query($conn,$requete_up);
        if($result_update){
           header("Location:./index.php"); 
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
    <form action="./update.php" method="POST">
        <div>
            <input type='hidden' name='id_up' value="<?php echo $id_up ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">LABEL</label>
            <input type="text" name="label_n" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter label" value="<?php echo $tableau_u['label']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">AUTEUR</label>
            <input type="text" name="auteur_n" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter auteur" value="<?php echo $tableau_u['auteur']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">DATE</label>
            <input type="date" name="date_n" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter date" value="<?php echo $tableau_u['_date']?>">
        </div>
        <button type="submit" name="modifier" class="btn btn-primary">MODIFIER</button>
        </form>
    </div>
</body>
</html>