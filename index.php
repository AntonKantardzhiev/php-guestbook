<?php
declare(strict_types=1);
require_once "classes/Post.php";
require_once "classes/PostLoader.php";
require "templates/header.php";
require "classes/Posts.txt";

session_start();

if (isset($_POST['submit'])) {

    if (!isset($_POST['title'], $_POST['content'], $_POST['author'])) {
        echo "You must fill in all the fields ";
    }
    $newP = new Post($_POST['title'], $_POST['content'], $_POST['author']);
    $newL = new PostLoader();
    $newL->writePost($newP);
    if (isset($newL)) {
        var_dump($newL->readPost());

    }
}
?>
<!--Main Content--->
<form action="" method="post">
    <label for="form">
        <input type="text" class="field" name="title" placeholder="Title">
        <input type="text" class="field" name="content" placeholder="What wold you wanna say?">
        <input type="text" class="field" name="author" placeholder="And your name is?">
        <button type="submit" class="btn" name="submit">Submit</button>
    </label>
</form>


<!--End Content--->
<?php require "templates/footer.php"; ?>
