<?php


class Post
{
    protected string $title;
    protected string $date;
    protected string $content;
    protected string $author;


    public function __construct(string $title, string $date, string $content, string $author)
    {
        $this->title = $title;
        $this->date = $date;
        $this->content = $content;
        $this->author = $author;
    }

    public function toArray(): array
    {
        return ['name' => $this->title,
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

    public function getDate(): string
    {
        date_default_timezone_set("Europe/Brussels");
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
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