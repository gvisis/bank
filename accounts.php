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
    <?php foreach ($accUsers as $ind => $data) : ?>
    <tr>
      <th scope="row"><?= $ind +1 ?></th>
      <td><?= $data['firstname'] ?></td>
      <td><?= $data['lastname'] ?></td>
      <td><?= $data['accountid'] ?></td>
      <td><?= $data['persid'] ?></td>
      <td><?= $data['accbalance'] ?></td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <a href='./add.php' class="btn btn-success">Add money</a>
          <a href='./withdraw.php' class="btn btn-primary">Withdraw money</a>
          <button type="button" class="btn btn-danger">Delete account</button>
        </div>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>