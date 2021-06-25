<?php
    $con = mysql_connect("username","password","") or die('Could not connect: ' . mysql_error());
    mysql_select_db("employee", $con);
?>