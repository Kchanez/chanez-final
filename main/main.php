<?php
require_once('header.php'); 
require_once('../login_signin/connexion.php');

session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM etudiants"; 
$result = mysqli_query($conn, $sql);
// Fetch all
$afficher =mysqli_fetch_all($result, MYSQLI_ASSOC);
// Free result set
mysqli_free_result($result);
mysqli_close($conn);
 
$tableau = array (
        "#" ,
        "Nom",
        "Prenom",
        "Email",
        "Modifier",
        "Supprimer"
    );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
  </head>
<body>
    
<!-- <div style="margin: 30px auto; width: 331px;">
    <a href="add_user.php">
    <input type="button" name="Ajouter" class="btn btn-primary" value="Ajouter un utilisateur">
    </a>
</div> -->


<!-- Button trigger modal -->
<button type="button" class="d-flex justify-content-center btn btn-primary d-grid mx-auto my-4 btn-lg"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
    Ajouter un utilisateur
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="add_user.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nom</label>
          <input type="text" name="nom" required class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPrenom1" class="form-label">Prenom</label>
          <input type="text" name="prenom" required class="form-control" id="exampleInputPrenom1">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="submit" value="Ajouter" class="btn btn-primary" /></br></br>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>


<div style="margin: 0 20px; padding: 0;"> 
    <table class="table">
    <thead>
    <tr>
        <?php 
            for ($i=0; $i <count($tableau) ; $i++) 
            {
        ?>
            <th scope="col"> <?php echo $tableau[$i]; ?></th>
        <?php 
            }
        ?>  
    </tr>
    </thead>
    
    <tbody>
    <?php
        for ($i=0; $i<count($afficher) ; $i++)
        {
            if ($_SESSION['user_id'] == $afficher[$i]['id_user']) 
            {
    ?>
        <tr>
        <th scope="row" class="align-middle"><?php echo $afficher[$i]['id'];?> </th>
        <td class="align-middle"><?php echo $afficher[$i]['nom']; ?></td>
        <td class="align-middle"><?php echo $afficher[$i]['prenom']; ?></td>
        <td class="align-middle"><?php echo $afficher[$i]['email']; ?></td>
        <td>
            <a href="update_user.php?edit=<?php echo $afficher[$i]['id']?> "> 
                <input type="submit" name="edit" value="Modifier" class="btn btn-warning"/>  
            </a>
        </td>    
        <td>
            <a href="Delete_user.php?id=<?php echo $afficher[$i]['id']?> "> 
                <input type="submit" name="supp" value="Supprimer" class="btn btn-danger" onclick="confirm('Are you sure that you wanna delete?')"/>  
            </a>
        </td>     
        </tr>
    <?php 
    }}
    ?> 
    </tbody>
    </table>
</div>

<?php $user_id = null ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></head>
<script src="../css/bootstrap.min.js"></script>

</body>
</html>