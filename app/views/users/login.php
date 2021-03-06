<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p class="center">
    <?php echo $data['body']?>
</p>
<?php flash('registerSuccess'); ?>

<form class="center" action="<?php echo URLROOT?>/users/login" method="post">
    <div class="formWrapper userForm">
        <label for="email">Email</label> <br>
        <input type="email" name="email" value="<?php echo $data['email']?>"><br>
        <span class="error"><?php echo $data['emailErr'] ?></span>
    </div>
    <div class="formWrapper userForm">
        <label for="password">Password</label> <br>
        <input type="password" name="password" value="<?php echo $data['password'] ?>"><br>
        <span class="error"><?php echo $data['passwordErr'] ?></span><br>
        <input type="submit" class="btn" value="Login"><br>
    </div>
    

<a href="<?php echo URLROOT ?>/users/register">Need an account? Register here here</a>




<?php require APPROOT . '/views/inc/footer.php'?>