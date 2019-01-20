<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p class="center">
    <?php echo $data['body']?>
</p>

<form action="" method="post">
    <div class="formWrapper">
        <label for="title">Book title</label><sup>*</sup><br>
        <input type="text" name="title" id="">
    </div>
    <div class="formWrapper">
        <label for="subTitle">Sub title</label><br>
        <input type="text" name="subTitle" id="">
    </div>
    <div class="formWrapper">
        <label for="author">Author</label><sup>*</sup><br>
        <input type="text" name="author" id="">
    </div>
    <div class="formWrapper">
        <label for="series">series</label><br>
        <input type="text" name="series" id="">
    </div>
    <div class="formWrapper">
        <label for="seriesNum">Number in series</label><br>
        <input type="number" name="seriesNum" id="">
    </div>
    <div class="formWrapper">
        <label for="body">Short description</label><sup>*</sup><br>
        <textarea name="body" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="formWrapper">
        <label for="longBody">Long description</label><br>
        <textarea name="longBody" id="" cols="30" rows="20"></textarea>
        <input type="submit" value="Submit">
    </div>
</form>
<?php require APPROOT . '/views/inc/footer.php'?>