<?php
return [
  'providers' => [
    'functions'=>'Betasyntax\Functions',
    'view'=>'Betasyntax\View\ViewHaml',
    'auth'=>'Betasyntax\Authentication',
    'request'=>'GuzzleHttp\Psr7\Request',
    'response'=>'GuzzleHttp\Psr7\Response',
    'router'=>'Betasyntax\Router\Router',
    'middleware'=>'Betasyntax\Router\MiddlewareService',
    'config'=>'Betasyntax\Config',
    'logger'=>'Betasyntax\Logger\Logger',
  ],
  'middleware' => [
    'auth'=>'Betasyntax\Authentication',
  ]
];