<?php require_once __DIR__.'/../bootstrap.php'; checkIfLoggedIn(); ?>
<form action="" method="get">
    <select name='userID' class="form-select">
        <option>Open to select user</option>
        <?php usort($accUsers, 'sortByLastName'); ?>
        <?php foreach($accUsers as $user) : ?>
        <option value="<?= $user['id'] ?>"><?= $user['firstname'] . ' ' . $user['lastname'] ?></option>
        <?php endforeach ;?>
    </select>
    <button type="submit" class="btn btn-primary">Select account</button>
</form>