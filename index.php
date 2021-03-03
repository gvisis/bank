<?php 
include_once __DIR__.'/header.php';
session_start();
?>

<?php include_once __DIR__.'/accounts.php'; ?>
<?php if (isset($_SESSION['msg'])) : ?>
  <div class="alert alert-<?= ($_SESSION['msg_status']) == 0 ? 'danger' : 'success'?>" role="alert">
    <?= _d($_SESSION['msg_status']) ?>
    <?= $_SESSION['msg']; session_destroy();?>
  </div>  
<?php endif; ?>
</body>

</html>