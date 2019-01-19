<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center"><?php echo $data['title'] ?></h1>
<p class="center"><?php echo $data['body']?></p>

<?php foreach ($data['authors'] as $author) :?>
<h1><?php echo $author->firstName . ' ' . $author->lastName?></h1>
<p><?php echo $author->body?></p>
<small><?php echo 'Added by: '.$author->userName?></small>

<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'?>