<?php


class PostLoader
{
    private array $post=[];


    public function getPost(): array
    {
        return $this->post;
    }
    public function setPost(array $post): void{
        $this->post[]= $post;
    }
public function readFile(string $fileName,Post $post):? array{
        try{
            return json_decode(file_get_contents($fileName),true,512,JSON_THROW_ON_ERROR);
        }catch (JsonException $exception){
            if($exception){
                var_dump($exception);
            }
            return null;
        }
}
}