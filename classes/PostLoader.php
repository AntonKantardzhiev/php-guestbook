<?php
declare(strict_types=1);


class PostLoader
{
    private array $posts = [];
    public const DESTINATION = "classes/Posts.txt";
    public const MAX_SHOWING_POSTS = 20;

    public function __construct()
    { if(file_exists( self::DESTINATION)){
        $this->posts = json_decode(file_get_contents(self::DESTINATION));
    }
    }

    public function getPosts(): mixed
    {
        return $this->posts;
    }

    public function setPost(array $posts): void
    {
        $this->posts = $posts;
    }

    public function writePost(Post $newP): void
    {
        try {
            $this->posts[]=$newP->toArray();
            file_put_contents(self::DESTINATION,(json_encode($this->posts,JSON_THROW_ON_ERROR,512)));

        }catch (JsonException $exception){
            if($exception){
                var_dump($exception);
            }
            return;
        }
    }
    public function readPost():?array
    {
        try {
            return $this->posts= json_decode(file_get_contents(self::DESTINATION), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            if ($exception) {
                var_dump($exception);
            }
            return null;
        }
    }
}