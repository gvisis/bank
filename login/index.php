<?php require_once __DIR__.'/../bootstrap.php'; 

if (isset($_GET['logout'])) {
  session_destroy();
  header("location: ".URL.'/../login/');
  exit;
}

if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
  header("location: ".URL);
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!file_exists(DIR.'/../login/superUsers.json')) {
    $_SESSION['msg'] = "Wrong password or username bad";
    $_SESSION['msg_status'] = 0;
    header('Location: '.URL.'/../login/');
    die;
  }
$username = $_POST['username'] ?? '';
$pass = $_POST['pass'] ?? '';
$superUserAccDatabase = file_get_contents(DIR.'/../login/superUsers.json');
$superUserAccDatabase = json_decode($superUserAccDatabase, true);

  foreach ($superUserAccDatabase as $superUser) {
    if ($superUser['username'] === $username) {
     if (password_verify($pass,$superUser['pass'])) {
            $_SESSION['login'] = 1;
            $_SESSION['user'] = $username;
            header("Location: ".URL);
            exit;
      }
    }
  }
  $_SESSION['msg_status'] = 0;
  $_SESSION['msg'] = "Wrong password or username";
  header('Location: '.URL.'/../login/');
  die;
}
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
  <div class="alert alert-<?= ($_SESSION['msg_status']) == 0 ? 'danger' : 'success'?>" role="alert">
    <?= $_SESSION['msg']; session_destroy();?>
  </div>  
<?php endif; ?>


    <div class="container">
      <h1>Login to ManTBank</h1>
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
