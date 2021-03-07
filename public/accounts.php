<?php 
require_once __DIR__.'/../bootstrap.php';
require_once DIR.'/accFile.php'; 
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Database ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Account Number</th>
      <th scope="col">Personal ID number</th>
      <th scope="col">Account balance</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php usort($accUsers, 'sortByLastName'); ?>
    <?php foreach ($accUsers as $userID => $user) : ?>
    <tr>
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['firstname'] ?></td>
      <td><?= $user['lastname'] ?></td>
      <td><?= $user['accNumb'] ?></td>
      <td><?= $user['persid'] ?></td>
      <td>$ <?= $user['accbalance'] ?></td>
      <td>
        <a href='<?= URL ?>/add.php?userID=<?= $userID ?>' class="btn btn-success btn-sm">Add money</a>
        <a href='<?= URL ?>/withdraw.php?userID=<?= $userID ?>' class="btn btn-primary btn-sm">Withdraw money</a>
        <form style="display: inline-block" action="<?= URL ?>/deleteAcc.php?userID=<?= $user['id'] ?>" method="post">
          <button type="submit" class="btn btn-danger btn-sm">Delete account</button>
        </form>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>