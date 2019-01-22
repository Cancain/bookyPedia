<?php require APPROOT . '/views/inc/header.php'?>
<h1>Authors</h1>
<?php foreach($data['authors'] as $author) :?>
<a href="<?php echo URLROOT ?>/authors/show/<?php echo $author->id?>"><h2><?php echo $author->lastName . ', ' . $author->firstName  ?></h2></a>
<?php endforeach;?>
<br>
<h1>Books</h1>
<?php foreach($data['books'] as $book) :?>
<a href="<?php echo URLROOT?>/books/show/<?php echo $book->id?>"><h2><?php echo $book->title?></h2></a>
<?php endforeach;?>

<?php require APPROOT . '/views/inc/footer.php'?>