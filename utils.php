<?php

$envcontents = explode("\r", file_get_contents("./.env"));

foreach ($envcontents as $line) if($line)
{
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