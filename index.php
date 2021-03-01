<?php
declare(strict_types=1);
require_once "classes/Post.php";
require_once "classes/PostLoader.php";
require "templates/header.php";
const MAX_SHOWING_POSTS = 20;

session_start();

if(!isset($_POST['submit'])){
    $newL= new PostLoader();
}
if (isset($_POST['submit'])) {
    function check(string $data) : string
    {
        return trim(htmlspecialchars($data, ENT_NOQUOTES, "UTF-8"));
    }
    if (!empty($_POST['title']&& $_POST['content']&& $_POST['author'])) {
        $title = check($_POST['title']);
        $content = check($_POST['content']);
        $author = check($_POST['author']);
        $newP = new Post($title,$content,$author);
        $newL = new PostLoader();
        $newL->writePost($newP);
        header("Location:index.php");
        exit;
    }else{
        echo "You must fill in all the fields ";
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

<?php
if(isset($newL)):
    for ($i=0; $i<MAX_SHOWING_POSTS; $i++):
        $posts= $newL->readPost();

            ?>
    <div class="post">
        <p class="title"><?php echo $posts[$i]["title"]?></p>
        <p class="content"><?php echo $posts[$i]["content"]?></p>
        <p class="author">-<i><?php echo $posts[$i]["author"]; echo $posts[$i]["date"]?></i></p>
        <br>
    </div>
<!--End Content--->
<?php  endfor; endif; require "templates/footer.php"; ?>
