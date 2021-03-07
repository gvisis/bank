<?php 
require __DIR__.'/../bootstrap.php';
include_once DIR.'header.php';
checkIfLoggedIn();
?>

<?php include_once DIR.'/accounts.php'; ?>
<?php if (isset($_SESSION['msg'])) : ?>
  <div class="alert alert-<?= ($_SESSION['msg_status']) == 0 ? 'danger' : 'success'?>" role="alert">
    <?= $_SESSION['msg']; unset($_SESSION['msg']);?>
  </div>  
<?php endif; ?>
</body>

</html>