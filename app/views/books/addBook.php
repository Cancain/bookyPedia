<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p class="center">
    <?php echo $data['body']?>
</p>

<?php if($_SESSION): ?>
<form action="" method="post">
    <div class="formWrapper">
        <label for="author">Author</label><sup>*</sup><br>
        <select name="author">
            <?php foreach ($data['authors'] as $author) : ?>
            <option value="<?php echo $author->authorId ?>">
                <?php echo $author->lastName . ', ' . $author->firstName?>
            </option>
            <?php endforeach;?>

        </select>
        <span class="error">
            <?php echo $data['authorErr'] ?></span>
    </div>
    <div class="formWrapper">
        <label for="title">Book title</label><sup>*</sup><br>
        <input type="text" name="title" value="<?php echo $data['bookTitle']?>"><br>
        <span class="error">
            <?php echo $data['titleErr'] ?></span>
    </div>
    <div class="formWrapper">
        <label for="subTitle">Sub title</label><br>
        <input type="text" name="subTitle" value="<?php echo $data['subTitle']?>">
    </div>
    <div class="formWrapper">
        <label for="series">series</label><br>
        <input type="text" name="series" value="<?php echo $data['series']?>">
    </div>
    <div class="formWrapper">
        <label for="seriesNum">Number in series</label><br>
        <input type="number" name="seriesNum" value="<?php echo $data['seriesNum']?>">
    </div>
    <div class="formWrapper">
        <label for="body">Short description</label><sup>*</sup><br>
        <textarea name="body" cols="30" rows="10"><?php echo $data['bookBody'] ?></textarea><br>
        <span class="error">
            <?php echo $data['bodyErr'] ?></span>
    </div>
    <div class="formWrapper">
        <label for="longBody">Long description</label><br>
        <textarea name="longBody" cols="30" rows="20"><?php echo $data['longBody'] ?></textarea>
        <input class="btn" type="submit" value="Submit">
    </div>
</form>

<?php else: ?>

<p class="center">You need to login to add authors or books. <br>
    Please <a href="<?php echo URLROOT ?>/users/login">Log in</a> or <a href="<?php echo URLROOT ?>/users/register">Register</a></p>

<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'?>