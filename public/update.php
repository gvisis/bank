<?php 
require_once __DIR__.'/../bootstrap.php';
checkIfLoggedIn();
require_once DIR.'/header.php';
require_once DIR.'/accFile.php';
require_once DIR.'updateSelect.php';

foreach ($accUsers as $user){
        if (isset($_GET['userID']) && $_GET['userID'] == $user['id']) {
            $userFirstName = $user['firstname'];
            $userLastName = $user['lastname'];
            $userPersId = $user['persid'];
            $userAccNumb = $user['accNumb'];
            $userAccBalance = $user['accbalance'];
        }
    }
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $userFirstName = $_POST['firstname'];
//     $userLastName = $_POST['lastname'];
//     $userPersId = $_POST['persid'];
//     $userAccNumb = $_POST['accNumb'];
//     $userAccBalance = $_POST['accbalance'];

//     $accountsJSON= file_get_contents($accountFile);
//     $accountsArr = json_decode($accountsJSON, true);
//     $accountsArr[] = $_POST;

//     file_put_contents($accountFile,json_encode($accountsArr));
// }
?>

<?php if (isset($_GET['userID'])) : ?>
    <h1>Account: <?= $userFirstName . ' ' . $userLastName ?>!</h1>
    <form action="" method="post">
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