<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center"><?php echo $data['title'] ?></h1>
<p class="center"><?php echo $data['body']?></p>
<?php flash('addAuthorSuccess'); ?>
<?php require APPROOT . '/views/inc/footer.php'?>