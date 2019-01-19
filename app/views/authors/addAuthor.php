<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p class="center">
    <?php echo $data['body']?>
</p>

<form action="<?php echo URLROOT?>/authors/addAuthor" method="post">
    <div class="formWrapper">
        <label for="firstName">Authors first name</label><sup>*</sup> <br>
        <input type="text" name="firstName" value=""><br>
        <span class="error"></span>
    </div>
    <div class="formWrapper">
        <label for="lastName">Authors last name</label><sup>*</sup><br>
        <input type="text" name="lastName" value=""><br>
        <span class="error"></span>
    </div>
    <div class="formWrapper">
        <label for="alias">Alias</label><br>
        <input type="text" name="alias" value=""><br>
        <span class="error"></span>
    </div>
    <div class="formWrapper">
        <label for="shortDesc">Short description</label><sup>*</sup><br>
        <textarea name="shortDesc" id="" cols="30" rows="5"></textarea><br>
        <span class="error"></span>
    </div>
    <div class="formWrapper">
        <label for="longDesc">Long description</label><br>
        <textarea name="longDesc" id="" cols="30" rows="10"></textarea>
        <span class="error"></span><br>
        <input type="submit" class="btn" value="Add author">
    </div>
    
    
</form>




<?php require APPROOT . '/views/inc/footer.php'?>