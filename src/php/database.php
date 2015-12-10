<?php

function db_connect_bad() {
   $result = new mysqli('localhost', 'grebe', 'grebe', 'ponds');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

?>
