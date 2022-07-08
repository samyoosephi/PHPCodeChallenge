<?php

function autoloader($class)
{
    require_once $class . '.php';
}

spl_autoload_register('autoloader');


$cm = new CacheManager(new Redis());
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','1');
$cm->lpush('two','2');
echo $cm->get('one');


$cm = new CacheManager(new Memcache());
$cm->connect('somehost','121');
$cm->set('one','1');
$cm->lpush('two','2'); // generates exception
echo $cm->get('one');