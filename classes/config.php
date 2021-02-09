<?php


define('websiteTitle','BusinessBlog');
 $path = str_replace('\\', '/', "http://".$_SERVER['SERVER_NAME'].__DIR__.'/');


 $path = str_replace($_SERVER['DOCUMENT_ROOT'],'', $path);
define('ROOT',str_replace('classes', 'public', $path));

define('ASSETS', str_replace('classes','public/assets',$path));



?>