<script>
// On mouse-over, execute myFunction
window.onload = function myFunction() {
  document.getElementById("myCheck").click(); // Click on the checkbox
}
</script>


<?php 

require_once('header.php');
require_once('../login_signin/connexion.php');

if (isset($_GET['edit'])) 
{
  $id = $_GET['edit']; 
  $sql = "SELECT * FROM etudiants  WHERE id='$id'";
  $query = mysqli_query($conn , $sql);
  $row = mysqli_fetch_array($query);

  $id = $row['id'];
  $nom = $row['nom'];
  $prenom = $row['prenom'];
  $email = $row['email'];
}

if (isset($_POST['modifier']) && $_POST['modifier'] == 'Modifier') 
{
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];

  $select = mysqli_query($conn , "SELECT * FROM  etudiants WHERE email = '$email' ");
  $select1 = mysqli_query($conn , "SELECT * FROM  etudiants WHERE nom = '$nom' ");
  $select2 = mysqli_query($conn , "SELECT * FROM  etudiants WHERE prenom = '$prenom' ");
  
    if(mysqli_num_rows($select))
    {
 ?>     
      <div class="alert alert-danger text-center" role="alert">
        <p> email already used ! </p>
      </div> 
<?php 
    $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom' WHERE id='$id' ";
    $query = mysqli_query($conn , $sql);
    header("location: main.php");
    } 
    else 
    {
      $sql = "UPDATE etudiants SET nom='$nom', prenom='$prenom', email='$email' WHERE id='$id' ";
      $query = mysqli_query($conn , $sql);
      header("location: main.php");
    }
}
  if($query)
    { 

    }
    else 
      {
        header("location: main.php?error=fail");
      }
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body style="background-color: white">

<?php  include_once('main.php'); ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-grid mx-auto d-none" data-bs-toggle="modal" data-bs-target="#modal2"
id="myCheck" onload="myFunction()" onloadstart="myFunction()">
  Modifier un utilisateur
</button>

<!-- Modal -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier un utilisateur</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden"  name="id" value="<?php echo $id; ?>" /></br></br>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nom</label>
          <input type="text" name="nom" required class="form-control" value="<?php echo $nom; ?>">
        </div>
        <div class="mb-3">
          <label for="exampleInputPrenom1" class="form-label">Prenom</label>
          <input type="text" name="prenom" required class="form-control" value="<?php echo $prenom; ?>">
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="modifier" value="Modifier" class="btn btn-primary" />
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script></head>
<script src="../css/bootstrap.min.js"></script> 
</body>
</html>