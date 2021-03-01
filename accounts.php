<?php 
  $accountFile = './accounts.json';
  
  if(file_exists($accountFile)){
    $accounts = file_get_contents($accountFile);
    $accUsers = json_decode($accounts,true);
  }
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Database ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Account ID</th>
      <th scope="col">Personal ID number</th>
      <th scope="col">Account balance</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($accUsers as $userID => $user) : ?>
    <tr>
      <th scope="row"><?= $userID ?></th>
      <td><?= $user['firstname'] ?></td>
      <td><?= $user['lastname'] ?></td>
      <td><?= $user['accountid'] ?></td>
      <td><?= $user['persid'] ?></td>
      <td><?= $user['accbalance'] ?></td>
      <td>
        <a href='./add.php' class="btn btn-success btn-sm">Add money</a>
        <a href='./withdraw.php' class="btn btn-primary btn-sm">Withdraw money</a>
        <form style="display: inline-block" action="./deleteAcc.php" method="post">
          <input type="hidden" name='userID' value='<?= $userID ?>'>
          <button type="submit" class="btn btn-danger btn-sm">Delete account</button>
        </form>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>