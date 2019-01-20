<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p class="center">
    <?php echo $data['body']?>
</p>

<?php if($_SESSION) : ?>
<form action="<?php echo URLROOT?>/authors/addAuthor" method="post">
    <div class="formWrapper">
        <label for="firstName">Authors first name</label><sup>*</sup> <br>
        <input type="text" name="firstName" 
        value="<?php echo $data['firstName']?>"><br>
        <span class="error"><?php echo $data['firstNameErr'] ?></span>
    </div>
    <div class="formWrapper">
        <label for="lastName">Authors last name</label><sup>*</sup><br>
        <input type="text" name="lastName" 
        value="<?php echo $data['lastName']?>"><br>
        <span class="error"><?php echo $data['lastNameErr'] ?></span>
    </div>
    <div class="formWrapper">
        <label for="alias">Alias</label><br>
        <input type="text" name="alias" 
        value="<?php echo $data['alias'] ?>"><br>
        <span class="error"></span>
    </div>
    <div class="formWrapper">
        <label for="shortDesc">Short description</label><sup>*</sup><br>
        <textarea name="shortDesc" id="" cols="30" rows="5"><?php echo $data['shortDesc'] ?></textarea><br>
        <span class="error"><?php echo $data['shortDescErr'] ?></span>
    </div>
    <div class="formWrapper">
        <label for="longDesc">Long description</label><br>
        <textarea name="longDesc" id="" cols="30" rows="10"><?php echo $data['longDesc']?></textarea>
        <span class="error"></span><br>
        <input type="submit" class="btn" value="Add author">
    </div>  
</form>
<? else: ?>
<p>You need to login to add authors or books. <br>
Please <a href="<?php echo URLROOT ?>/users/login">Log in</a> or <a href="<?php echo URLROOT ?>/users/register">Register</a></p>

<?php endif; ?>




<?php require APPROOT . '/views/inc/footer.php'?>