<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p class="center">
    <?php echo $data['body']?>
</p>

<form action="<?php echo URLROOT?>/users/register" method="post">
    <div class="formWrapper userForm">
        <label for="email">Email</label><sup>*</sup> <br>
        <input type="email" name="email" value="<?php echo $data['email']?>"><br>
        <span class="error"><?php echo $data['emailErr'] ?></span>
    </div>
    <div class="formWrapper userForm">
        <label for="userName">Username</label><sup>*</sup><br>
        <input type="text" name="userName" value="<?php echo $data['userName'] ?>"><br>
        <span class="error"><?php echo $data['userNameErr'] ?></span>
    </div>
    <div class="formWrapper userForm">
        <label for="password">Password</label><sup>*</sup><br>
        <input type="password" name="password" value="<?php echo $data['password'] ?>"><br>
        <span class="error"><?php echo $data['passwordErr'] ?></span>
    </div>
    <div class="formWrapper userForm">
        <label for="ConfirmPassword">Confirm Password</label><sup>*</sup><br>
        <input type="password" name="confirmPassword" value="<?php echo $data['confirmPassword'] ?>"><br>
        <span class="error"><?php echo $data['confirmPasswordErr'] ?></span><br>
        <input type="submit" class="btn" value="Register">
    </div>
    
</form>

<a class="userForm" href="<?php echo URLROOT ?>/users/login">Already got an account? Log in here</a>




<?php require APPROOT . '/views/inc/footer.php'?>