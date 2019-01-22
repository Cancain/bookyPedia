<div id="navBg"></div>
<i id="userIcon" class="fas fa-user center"></i>
<i id="menuIcon" class="fas fa-compass center"></i>
<?php if(empty($_SESSION['userName'])) : ?>
<div id="userBar" class="hidden">
    <ul class="vNav center">
        <a href="<?php echo URLROOT ?>/users/login">
            <div class="vNavBg">
                <li>Log in</li>
            </div>
        </a>
        <a href="<?php echo URLROOT ?>/users/register">
            <div class="vNavBg">
                <li>Register</li>
            </div>
        </a>
    </ul>
</div>
<?php else : ?>
<div id="userBar" class="hidden">
    <ul class="vNav center">
        <a href="<?php echo URLROOT ?>/users/profile">
            <div class="vNavBg">
                <li>
                    <?php echo $_SESSION['userName'] ?>
                </li>
            </div>
        </a>
        <a href="<?php echo URLROOT ?>/users/logout">
            <div class="vNavBg">
                <li>Log out</li>
            </div>
        </a>
    </ul>
</div>
<?php endif; ?>
<?php if(!$_SESSION) : ?>
<div id="userBarLg" class="">
    <ul class="hNav right">
        <li><a href="<?php echo URLROOT ?>/users/login">Log in</a></li>
        <li><a href="<?php echo URLROOT ?>/users/register">Register</a></li>
    </ul>
</div>
<?php else: ?>
<div id="userBarLg" class="">
    <ul class="hNav right">
        <li><a href="<?php echo URLROOT ?>/users/profile">
                <?php echo $_SESSION['userName'] ?></a></li>
        <li><a href="<?php echo URLROOT ?>/users/logout">log out</a></li>
    </ul>
</div>
<?php endif; ?>
<div id="searchBar" class="center">
    <form action="<?php echo URLROOT?>/pages/search" method="POST">
        <input id="searchField" type="text" placeholder="Search" name="search" id="">
        <input id="searchBtn" class="btn" name="searchBtn" type="submit" value="Go">
    </form>
</div>
<div id="mainNav" class="hidden">
    <nav>
        <ul class="vNav center">
            <a href="<?php echo URLROOT ?>/books/findBook">
                <div class="vNavBg">
                    <li>Find books</li>
                </div>
            </a>
            <a href="<?php echo URLROOT ?>/authors/findAuthor">
                <div class="vNavBg">
                    <li>Find authors</li>
                </div>
            </a>
            <a href="<?php echo URLROOT ?>/books/addBook">
                <div class="vNavBg">
                    <li>Add book</li>
                </div>
            </a>
            <a href="<?php echo URLROOT ?>/authors/addAuthor">
                <div class="vNavBg">
                    <li>Add author</li>
                </div>
            </a>
        </ul>
    </nav>
</div>
<div id="mainNavLG" class="">
    <nav>
        <ul class="hNav center pronunced">
            <li><a href="<?php echo URLROOT ?>/books/findBook">Find books</a></li>
            <li><a href="<?php echo URLROOT ?>/authors/findAuthor">Find authors</a></li>
            <li><a href="<?php echo URLROOT ?>/books/addBook">Add book</a></li>
            <li><a href="<?php echo URLROOT ?>/authors/addAuthor">Add author</a></li>
        </ul>
    </nav>
</div>