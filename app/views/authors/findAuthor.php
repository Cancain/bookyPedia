<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center"><?php echo $data['title'] ?></h1>
<p class="center"><?php echo $data['body']?></p>

<?php foreach ($data['authors'] as $author) :?>
<a href="<?php echo URLROOT ?>/authors/show/<?php echo $author->authorId ?>"><h2><?php echo $author->lastName . ', ' . $author->firstName?></h2></a>
<p><?php if($author->alias) echo 'Alias: ' . $author->alias ?></p>
<p><?php echo $author->body?></p>
<small><?php echo 'Added by: '.$author->userName?></small>

<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'?>