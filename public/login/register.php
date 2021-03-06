<?php 

require_once __DIR__.'/../../bootstrap.php'; 
require_once __DIR__.'/../accFile.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (createAccount($_POST['username'], $_POST['pass'], $_POST['firstname'], $_POST['lastname'])) {
        header("Location: ".URL."/login/");
        exit;
    };
    
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
  <?php if (isset($_SESSION['msg'])) : ?>
  <div class="alert alert-danger" role="alert">
    <?= $_SESSION['msg']; session_destroy();?>
  </div>  
<?php endif; ?>
    <div class="container">
      <h1>Create new account</h1>
      <form action='' method='post'>
        <div class="form-control">
          <input type="text" placeholder=" " required name='username'/>
          <label>Username</label>
        </div>
        <div class="form-control">
          <input type="text" placeholder=" " required name='firstname'/>
          <label>First name</label>
        </div>
        <div class="form-control">
          <input type="text" placeholder=" " required name='lastname'/>
          <label>Last name</label>
        </div>
        <div class="form-control">
          <input type="password" placeholder=" " name='pass' required />
          <label>Password</label>
        </div>
        <button class="btn">Create Account</button>
        <a href='../login' class="btn">Back</a>
        <p class="text">Forgot <a href="#">password?</a></p>
      </form>
    </div>
    <script src="<?= URL ?>../../app/js/script.js"></script>
  </body>
</html>
