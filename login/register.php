<?php 

require_once __DIR__.'/../bootstrap.php'; 
require_once DIR.'/accFile.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  if (!$_POST['firstname']) {
    $errors[] = "Please enter your first name";
} elseif (isNameValid($_POST['firstname'])) {
    $errors[] = isNameValid($_POST['firstname']);
} 

if (!$_POST['lastname']) {
    $errors[] = "Please enter your last name";
} elseif (isNameValid($_POST['lastname'])) {
    $errors[] = isNameValid($_POST['lastname']);
}
if (!$_POST['username']) {
  $errors[] = 'Please enter username';
}

if (!$_POST['pass']) {
  $errors[] = 'Please enter password';
}

 _d(empty($errors));
  if (empty($errors)) {
    createAccount($_POST['username'], $_POST['pass'], $_POST['firstname'], $_POST['lastname']);
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
          <input type="text" placeholder=" " name='username'/>
          <label>Username</label>
        </div>
        <div class="form-control">
          <input type="text" placeholder=" " name='firstname'/>
          <label>First name</label>
        </div>
        <div class="form-control">
          <input type="text" placeholder=" " name='lastname'/>
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
