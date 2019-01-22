<?php require APPROOT . '/views/inc/header.php'?>
<h1><?php echo $data['author']->lastName . ', ' . $data['author']->firstName ?></h1>
<p><?php echo $data['author']->body ?></p><br>
<h4>Written books (added to Bookypedia)</h4>
<ul>
    <?php foreach ($data['books'] as $book): ?>

    <a href="<?php echo URLROOT?>/books/show/<?php echo $book->id?>"><li class="bookItem"><?php echo $book->title ?></li></a>

    <?php endforeach; ?>
</ul>
<small>Added by user: <?php echo $data['author']->userName ?>
<?php require APPROOT . '/views/inc/footer.php'?>