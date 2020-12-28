<?php
header("content-type:text/html;charset=utf-8");
if($_GET["a"]){
$fp= fopen('jk.txt', "w");
$len = fwrite($fp,date("Y-m-d H:i:s")." - ".$_GET["a"]);
fclose($fp);
}
if($_GET["b"]){
 $file_path = "jk.txt";
 if(file_exists($file_path)){echo file_get_contents($file_path);}
}
?>