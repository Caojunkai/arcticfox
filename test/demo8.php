<?php
$xml = simplexml_load_file("test.xml");
foreach ($xml as $keys => $values){
    echo $values->attributes();
//    foreach ($values as $key => $value){
//        echo $value;
//    }
}