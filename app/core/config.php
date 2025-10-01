<?php
// awardspace: themark73@yahoo.com
if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define('ROOT', "http://localhost/bookreview.myartsonline.com/public");
  // database config
  define("DBHOST", "localhost");
  define("DBNAME", "4530493_themark73");
  define("DBUSER", "root");
  define("DBPASS", "");
} else {
  define('ROOT', "https://bookreview.myartsonline.com/");
  // database config
  define("DBHOST", "fdb3.awardspace.net");
  define("DBNAME", "4530493_themark73");
  define("DBUSER", "4530493_themark73");
  define("DBPASS", "Hilltopper#95");
}

define('APP_NAME', 'App Name');
define('APP_DESC', 'App Descriiption');

// true means show errors
define('DEBUG', true);

