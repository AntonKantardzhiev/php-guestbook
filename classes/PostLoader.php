<?php
declare(strict_types=1);


class PostLoader
{
    private array $posts = [];
    public const DESTINATION = "classes/Posts.txt";

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function setPost(array $posts): void
    {
        $this->posts[] = $posts;
    }

    public function writePost(Post $newP): void
    {
        try {
            file_put_contents(self::DESTINATION,(json_encode($newP,JSON_THROW_ON_ERROR,512)));

        }catch (JsonException $exception){
            if($exception){
                var_dump($exception);
            }
            return;
        }
    }
    public function readFile(string $fileName): ?array
    {
        try {
            return json_decode(file_get_contents($fileName), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            if ($exception) {
                var_dump($exception);
            }
            return null;
        }
    }
}