<?php 
require_once __DIR__.'/../bootstrap.php';
checkIfLoggedIn();
require_once DIR.'/header.php';
require_once DIR.'/accFile.php';

foreach ($accUsers as &$user){
    if ($_POST['userID'] == $user['id']) {
        $userFirstName = $user['firstname'];
        $userLastName = $user['lastname'];
        $userPersId = $user['persid'];
        $userAccNumb = $user['accNumb'];
        $userAccBalance = $user['accbalance'];
    }
}
?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'GET') : ?>
    <form action="" method="post">
    <h1>Account: <?= $userFirstName . ' ' . $userLastName ?>!</h1>
    
    <select name='userID' class="form-select">

        <option>Open to select user</option>
        <?php foreach($accUsers as $user) : ?>
        <option value="<?= $user['id'] ?>"><?= $user['firstname'] . ' ' . $user['lastname'] ?></option>
        <?php endforeach ;?>

    </select>
    <button type="submit" class="btn btn-primary">Select account</button>
    </form>
<?php endif ; ?>   

<?php if (isset($_POST['userID'])) : ?>
    <form action="?id=<?= $_POST['id'] ?? null?>" method="post">
        <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control" value="<?= $userFirstName ?>">
        </div>
        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" value="<?= $userLastName ?>">
        </div>
        <div class="form-group">
            <label>Account number</label>
            <input type="text" class="form-control" value="<?= $userAccNumb ?>">
        </div>
        <div class="form-group">
            <label>Personal ID</label>
            <input type="text" class="form-control" value="<?= $userPersId ?>">
        </div>
        <div class="form-group">
            <label>Account Balance</label>
            <input type="text" class="form-control" value="<?= $userAccBalance ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Account</button>
        <a href='<?= URL ?>' class="btn btn-secondary">Back</a>
    </form>
<?php endif ; ?>