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