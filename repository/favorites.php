<?php

$sql = "SELECT * FROM favorites";
$result = $dbConn->query($sql);

if( $result->num_rows > 0 ) {
    $favorites = $result->fetch_all();
}
