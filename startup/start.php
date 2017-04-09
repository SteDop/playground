<?php
use League\BooBoo\Runner;
use League\BooBoo\Formatter\HtmlTableFormatter;
use League\BooBoo\Formatter\NullFormatter;
use League\BooBoo\Handler\LogHandler;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$runner = new Runner();
$html = new HtmlTableFormatter;
$null = new NullFormatter;

$log = new Logger('playground');
$streamHandler = new StreamHandler('path/to/your.log', Logger::WARNING);
$logHandler = new LogHandler($log);

$log->pushHandler($streamHandler);

$html->setErrorLimit(E_ERROR | E_WARNING | E_USER_ERROR | E_USER_WARNING);
$null->setErrorLimit(E_ALL);

$runner->pushFormatter($null);
$runner->pushFormatter($html);



$runner->pushHandler($logHandler);
$runner->register();
return \Playground\App::play();