<?php
//$xml = new DOMDocument();
//$xml->load('test.xml');
//$users = $xml->getElementsByTagName('users');
//$len = $users->length;
$xmlData = file_get_contents('http://api.wycq.521g.com/game/mrt_consume/xyg');
$xml = simplexml_load_string($xmlData);
var_dump($xml->awards->award);