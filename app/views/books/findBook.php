<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center"><?php echo $data['title'] ?></h1>
<p class="center"><?php echo $data['body']?></p>

<?php foreach ($data['books'] as $book ): ?> 
    <h1><?php echo $book->title ?></h1>
    <p><?php echo $book->bookBody ?></p>
    <p>Author: <?php echo $book->firstName . ' ' . $book->lastName ?></p>
    <small>Added by: <?php echo $book->userName ?></small>

<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'?>