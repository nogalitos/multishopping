<?php
 $clientLibraryPath = APP_PATH.'libs/ZendGdata/library/';
  
 set_include_path(get_include_path() . PATH_SEPARATOR . $clientLibraryPath);
  
 require_once 'Zend/Loader.php';
?>
