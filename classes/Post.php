<?php
declare(strict_types=1);

class Post
{
    protected string $title;
    protected string $date;
    protected string $content;
    protected string $author;

    public function __construct(string $title, $content, string $author)
    {
        date_default_timezone_set("Europe/Brussels");
        $this->title = $title;
        $this->date = Date('D, d M Y');
        $this->content = $content;
        $this->author = $author;
    }

    public function toArray(): array
    {
        return ['title' => $this->title,
            'date' => $this->date,
            'content' => $this->content,
            'author' => $this->author];
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }



}