<?php
declare(strict_types=1);

require_once "classes/Post.php";
require_once "classes/PostLoader.php";
require "templates/header.php";
const DESTINATION = "classes/Posts.txt";

if (isset($_POST['submit'])) {

    $newP = new Post($_POST['title'], date('D, d M Y'), $_POST['content'], $_POST['author']);
    $newL = new PostLoader();
    $newL->readFile(DESTINATION, $newP);
}
?>
<!--Main Content--->
<form action="" method="post">
    <label for="form">
        <input type="text" class="field" name="title" placeholder="Title">
        <input type="text" class="field" name="content" placeholder="WHot wold you wanna say?">
        <input type="text" class="field" name="name" placeholder="And your name is?">
        <button type="submit" class="btn" name="action">Submit</button>
    </label>
</form>


<!--End Content--->
<?php require "templates/footer.php"; ?>
