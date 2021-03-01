<?php include_once __DIR__.'/header.php';?>


<a href="./newaccount.php" class="btn btn-success">Create new account</a>
<?php include_once __DIR__.'/accounts.php'; ?>

<?php if (!empty($_GET['delete'])) : ?>

<?php if ($_GET['delete'] === 'fail'): ?>
<div class="alert alert-danger" role="alert">
  Could not delete this account because the bank balance is not empty!
</div>
<?php elseif ($_GET['delete'] === 'success') : ?>
<div class="alert alert-success" role="alert">
  Account was succesfully deleted!
</div>
<?php endif; ?>

<?php endif; ?>
</body>

</html>