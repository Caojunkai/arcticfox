<?php
$path = 'D:\WWW\edu';

function recurDir($pathName) {
    $result = array();
    $temp = array();
    if( !is_dir($pathName) || !is_readable($pathName) ){
        return null;
    }
    $allFiles = scandir($pathName);
    foreach($allFiles as $fileName){
        if( in_array($fileName, array('.', '..')) ) continue;
        $fullName = $pathName . DIRECTORY_SEPARATOR . $fileName;
        if( is_dir($fullName) ){
            $result[$fileName] = recurDir($fullName);
        }else{
            $temp[] = $fileName;
        }
    }
    if($temp){
        foreach( $temp as $f ){
            $result[] = $f;
        }
    }

    return $result;
}


function bl($arr, $l = '-|'){
    static $l = '';
    static $str = '';
    foreach($arr as $key=>$val){
        if(is_array($arr[$key])){
            //echo $val . "<br>";
            //echo $l . $key . "<br>";
            $str .= $l . $key . "<br>";
            $l .= '-|';
            bl($arr[$key], $l);
        }else{
            //echo $l . $val . "<br>";
            $str .= $l . $val . "<br>";
        }
    }
    $l = '';
    return $str;
}

$t1 = microtime(true);
$tree = recurDir($path);
$t2 = microtime(true);
echo $t2-$t1;
//echo "<pre>";
//print_r($tree);
//echo "</pre>";
//echo "<br>------------------------------------------<br>";
$data = bl($tree);

echo "<pre>";
print_r($data);
echo "</pre>";