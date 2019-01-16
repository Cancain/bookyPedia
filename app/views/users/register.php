<?php require APPROOT . '/views/inc/header.php'?>
<h1>
    <?php echo $data['title'] ?>
</h1>
<p>
    <?php echo $data['body']?>
</p>

<form action="" method="post">
    <div class="formWrapper">
        <label for="email">Email</label> <br>
        <input type="email" name="email">
    </div>
    <div class="formWrapper">
        <label for="userName">Username</label> <br>
        <input type="text" name="userName">
    </div>
    <div class="formWrapper">
        <label for="password">Password</label> <br>
        <input type="password" name="password">
    </div>
    <div class="formWrapper">
        <label for="ConfirmPassword">Confirm Password</label> <br>
        <input type="password" name="confirmPassword">
    </div>
    <input type="submit" class="btn" value="Register">
</form>

<a href="<?php echo URLROOT ?>/users/login">Already got an account? Log in here</a>




<?php require APPROOT . '/views/inc/footer.php'?>