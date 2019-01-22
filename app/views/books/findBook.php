<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center"><?php echo $data['title'] ?></h1>
<p class="center"><?php echo $data['body']?></p>

<?php foreach ($data['books'] as $book ): ?> 
    <a href="<? echo URLROOT ?>/books/show/<?php echo $book->bookId?>"><h2><?php echo $book->title ?></h2></a>
        <p><?php echo $book->bookBody ?></p>
        <p>Author: <?php echo $book->firstName . ' ' . $book->lastName ?></p>
        <?php if(!empty($book->series)) :?>
            <p>Series: <?php echo $book->series ?></p>
            <p>Number in series: <?php echo $book->seriesNum ?></p>
    <?php endif;?>
    <small>Added by: <?php echo $book->userName ?></small>

<?php endforeach; ?>

<?php require APPROOT . '/views/inc/footer.php'?>