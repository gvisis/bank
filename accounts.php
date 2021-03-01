<?php 
  $accountFile = './accounts.json';
  
  if(file_exists($accountFile)){
    $accounts = file_get_contents($accountFile);
    $accUsers = json_decode($accounts,true);
    _d($accUsers);
  }

?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Account ID</th>
      <th scope="col">Personal ID number</th>
      <th scope="col">Account balance</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($accUsers as $data) : ?>
    <?php foreach ($data as $id => $user) : ?>
    <tr>
      <th scope="row"><?= $id ?></th>
      <td><?= $user['firstname'] ?></td>
      <td><?= $user['lastname'] ?></td>
      <td><?= $user['accountid'] ?></td>
      <td><?= $user['persid'] ?></td>
      <td><?= $user['accbalance'] ?></td>
      <td>
        <div class="btn-group" role="group">
          <a href='./add.php' class="btn btn-success">Add money</a>
          <a href='./withdraw.php' class="btn btn-primary">Withdraw money</a>
          <form action="./deleteAcc.php" method="post" class="btn btn-danger">
            <input type="hidden" name='userID' value='<?= $id ?>'>
            <button type="submit" class="btn btn-danger">Delete account</button>
          </form>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </tbody>

</table>