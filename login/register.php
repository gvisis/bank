<?php 

require_once __DIR__.'/../bootstrap.php'; 
require_once DIR.'/accFile.php'; 

$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$username = $_POST['username'] ?? '';
$pass = $_POST['pass'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  if (!$firstname) {
    $errors[] = "Please enter your first name";
} elseif (isNameValid($firstname)) {
    $errors[] = isNameValid($firstname);
} 

if (!$lastname) {
    $errors[] = "Please enter your last name";
} elseif (isNameValid($lastname)) {
    $errors[] = isNameValid($lastname);
}
if (!$username) {
  $errors[] = 'Please enter username';
}

if (!$pass) {
  $errors[] = 'Please enter password';
}

if (empty($errors)) {
  createAccount($username, $pass, $firstname, $lastname);
  $_SESSION['msg'] = "Account created succesfully!";
  header("Location: ".URL.'/../login/');
  exit;
}
};

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= URL ?>/css/login.css" />
    <title>ManTBank</title>
  </head>
  <body>
  <?php if(!empty($errors)) : ?>
  <div class="alert alert-danger" role="alert">
    <?php foreach ($errors as $error) : ?>
        <div><?= $error ?></div>
    <?php endforeach ;?>
  </div>  
<?php session_destroy() ;?>
<?php endif ;?>
    <div class="container">
      <h1>Create new account</h1>
      <form action='' method='post'>
        <div class="form-control">
          <input type="text" placeholder=" " name='username' value='<?= $username?>'/>
          <label>Username</label>
        </div>
        <div class="form-control">
          <input type="text" placeholder=" " name='firstname' value='<?= $firstname?>'/>
          <label>First name</label>
        </div>
        <div class="form-control">
          <input type="text" placeholder=" " name='lastname' value='<?= $lastname?>'/>
          <label>Last name</label>
        </div>
        <div class="form-control">
          <input type="password" placeholder=" " name='pass' />
          <label>Password</label>
        </div>
        <button class="btn">Create Account</button>
        <a href='<?= URL ?>/../login' class="btn">Back</a>
        <p class="text">Forgot <a href="#">password?</a></p>
      </form>
    </div>
    <script src="<?= URL ?>/../app/js/script.js"></script>
  </body>
</html>
