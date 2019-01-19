<?php require APPROOT . '/views/inc/header.php'?>
<h1 class="center">
    <?php echo $data['title'] ?>
</h1>
<p>
<b>Username: </b><?php echo $data['userName']?><br>
<b>Email: </b> <?php echo $data['email'] ?><br>
<b>Created at: </b> <?php echo $data['createdAt']?><br>

</p>

<?php require APPROOT . '/views/inc/footer.php'?>