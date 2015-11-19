<?php
$xml = new DOMDocument();
$xml->load("http://localhost/arcticfox/tmp/com_wing/wing.xml");
$string = $xml->getElementsByTagName("version")->item(0)->nodeValue;
echo $string;

