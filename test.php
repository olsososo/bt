<?php
header("Content-type: text/html; charset=utf-8");

$con = mysql_connect("45.63.48.211", "root", "itisasinglesong");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db("sphinx",$con);
$result = mysql_query('select id, name from torrents where id > 373312');

$handle = fopen('test.log', 'a');
while($row = mysql_fetch_assoc($result)) {
	fwrite($handle, $row['id'].' '.$row['name']."\r\n");
}

mysql_close();
