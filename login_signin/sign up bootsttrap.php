<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login_signin style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Sign up</title>
    
</head>
<body>
<?php require('../main/header_no_btn.html'); ?>
<!--<ul class="nav justify-content-center p-2 mb-2 bg-primary">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">espace utilisateur</a>
  </li>
</ul> -->
<form action="sign up action_page.php" method="POST" class="mx-auto border border-2 rounded-1" style="max-width: 350px; margin-top: 130px; padding: 10px;">
  <h1 class="h3 mb-3 font-weight-normal text-center">sign up</h1>

  <div class="mb-3">
    <label for="user" class="form-label">User</label>
    <input type="text" class="form-control" name="user" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <div class="d-flex justify-content-between">
  <button type="submit" class="btn btn-primary">Submit</button>
  <p class="m-0 my-auto ">already have an account? <a href="log in bootsttrap.php">Log in</a></p>
  </div>
</form>

</body>
</html>