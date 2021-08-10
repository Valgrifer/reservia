<?php

$envcontents = explode("\n", file_get_contents("./.env"));

foreach ($envcontents as $line) if($line)
{
    $line = str_replace(["\n", "\r"], "", $line);
    $split = explode("=", $line);

    if(sizeof($split) < 2)
        continue;

    $_ENV[$split[0]] = substr($line, strlen($split[0]) + 1);
    unset($line, $split);
}
unset($envcontents);

function str_ends_with ($handle, $str)
{
    return substr($str, -1) == $handle;
}
function url($url)
{
    return $_ENV["BASEURL"] . (!str_ends_with("/", $_ENV["BASEURL"]) ? "/" : "") . $url;
}

class nav_items
{
    private $name;
    private $slug;

    /**
     * nav_items constructor.
     * @param $name
     * @param $slug
     */
    public function __construct($name, $slug = null)
    {
        $this->name = $name;
        if($slug)
            $this->slug = $slug;
        else
            $this->slug = strtolower($name);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }
}

class Card
{
    private $title;
    private $img;
    private $price;
    private $score;

    public function __construct($title, $img, $price = 0, $score = 0)
    {
        $this->title = $title;
        $this->img = $img;
        $this->price = $price;
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }
}