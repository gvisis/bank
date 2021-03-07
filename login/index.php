<?php require_once __DIR__.'/../bootstrap.php'; ?>
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
  <?php if (isset($_SESSION['msg'])) : ?>
  <div class="alert alert-success" role="alert">
    <?= $_SESSION['msg']; session_destroy();?>
  </div>  
<?php endif; ?>
    <div class="container">
      <h1>Login to see the accounts</h1>
      <form action='' method='post'>
        <div class="form-control">
          <input type="text" placeholder=" " required name='username'/>
          <label>Username</label>
        </div>
        <div class="form-control">
          <input type="password" placeholder=" " name='pass' required />
          <label>Password</label>
        </div>
        <button class="btn">Login</button>
        <p class="text">Don't have an account? <a href="<?= URL?>/../login/register.php">Register</a></p>
      </form>
    </div>
    <script src="<?= URL ?>/../app/js/script.js"></script>
  </body>
</html>
