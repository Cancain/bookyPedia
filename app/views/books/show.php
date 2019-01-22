<?php require APPROOT . '/views/inc/header.php'?>
<h1><?php echo $data->title ?></h1>
<a href="<?php echo URLROOT?>/authors/show/<?php echo $data->authorId ?>"><h2>Author: <?php echo $data->lastName .', '. $data->firstName ?></h2></a>
<?php if($data->subTitle) echo '<p>'.$data->subTitle.'</p>'?>
<?php if($data->series) echo '<p>Part '. $data->seriesNum .' of: '.$data->series.'</p>'?>
<p><?php echo $data->body ?></p><br>
<?php if($data->longBody) echo '<p>'. $data->longBody.'</p>'?>
<small>Added by user: <?php echo $data->userName?>

<?php require APPROOT . '/views/inc/footer.php'?>
