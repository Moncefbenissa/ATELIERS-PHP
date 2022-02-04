<?php
            require 'connection.php'; 
            $requete_reception = "SELECT * FROM exo;";
            $result = mysqli_query($conn,$requete_reception); 
            $exercices=mysqli_fetch_all($result,MYSQLI_ASSOC)  ;  
            if(isset($_POST['delete'])){

                $id = (int)$_POST['id_delete'];
                $requete_supp = "DELETE FROM exo WHERE id=$id;";
                mysqli_query($conn,$requete_supp);
                header('location:index.php');
            }

            if(isset($_POST['update'])){

                $id_up = (int)$_POST['id_update'];
                

            }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CRUD</title>
    <style>
        .container{
            margin-top: 50px;
            width: 50%;
            margin-left: 30%;
        }
    </style>
</head>
<body>
    <div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="create.php"><button class="btn btn-primary">CREATE</button></a>
    </nav>

    </div>
    <div class="container">
    <h1>AFFICHAGE: </h1>
        
            <table class="table table-hover table-dark">
            <?php
           
        if(count($exercices)>0){ ?>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">LABEL</th>
                <th scope="col">AUTEUR</th>
                <th scope="col">DATE</th>
                <th scope="col">DELETE</th>
                <th scope="col">UPDATE</th>
            
              </tr>
            </thead>
            <?php  } ?>
            <tbody>
              <?php foreach($exercices as $exercice ){?>
                  <tr>
                      <td><?php echo $exercice['id']  ?></td>
                      <td><?php echo $exercice['label']  ?></td>
                      <td><?php echo $exercice['auteur']  ?></td>
                      <td><?php echo $exercice['_date']  ?></td>
                      <td>
                          <form action="./index.php" method="POST">
                              <input type="hidden" name="id_delete" value="<?php echo $exercice['id']?>">
                              <button type="submit" name='delete'>DELETE</button>
                          </form>
                      </td>
                      <td>
                          <form action="./update.php" method="POST">
                              <input type="hidden" name="id_update" value="<?php echo $exercice['id']?>">
                              <button type="submit" name='update'>UPDATE</button>
                          </form>
                      </td>
                      
                  </tr>
              <?php }?>
            </tbody>
          </table>
      
    </div>
</body>
</html>
