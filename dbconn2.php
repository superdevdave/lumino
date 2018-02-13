<?php

$servername = "127.0.0.1";
$username = "root";
$password = "Pass@1234@1";
$dbname = "TILL";

$connection = odbc_connect("Driver={Pervasive ODBC Engine Interface};ServerName=$servername;dbq=$dbname;");
?>