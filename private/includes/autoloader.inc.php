<?php 

   spl_autoload_register('loader');

   function loader($className) {
      $path = './private/classes/';
      $extension = '.class.php';
      $fullPath = $path . $className . $extension;

      if(!file_exists($fullPath)) {
         return false;
      }

      include_once $fullPath;
   }