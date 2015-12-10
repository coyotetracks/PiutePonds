<?php

require_once('db_info.php');

function get_ini_property($property_key) {
	$property_value = ini_get($property_key);
	$html = "<h3>".$property_key." = (".$property_value.")</h3>";
	return $html;
}

function show_name_value($name, $value) {
	$html = "<h3>".$name." = (".$value.")</h3>";
	return $html;
}

?>

<html>
   <head>
      <title>What's Up?</title>
   </head>
   <body>

	<h2>What is Up?</h2>
	<h3>4</h3>

      <?php
          echo "<H4>test</H4>";

          $db = new db_info();
          $db->setDatabase("jeff");
          echo show_name_value("db", $db->getDatabase());

          echo show_name_value("_SERVER[COMPUTERNAME]", $_SERVER['COMPUTERNAME']);
          echo show_name_value("_ENV[COMPUTERNAME]", $_ENV['COMPUTERNAME']);
          echo show_name_value("getenv(COMPUTERNAME)", getenv('COMPUTERNAME'));
          //echo show_name_value("$_SERVER['SERVER_NAME']'", $_SERVER['SERVER_NAME']);
		  echo get_ini_property("mysql.default_host");
		  echo get_ini_property("mysql.default_user");
		  echo get_ini_property("mysql.default_password");
      ?>

    <h4>end</h4>

   </body>
</html>
