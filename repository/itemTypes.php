<?php

function getAllItemTypes($dbConn) {
    $sql = "SELECT * FROM item_types";
    $result = $dbConn->query($sql);

    $itemTypes = array();
    if( $result->num_rows > 0 ) {
        while( $row = $result->fetch_assoc() ) {
            $itemTypes[ $row['item_type_id'] ] = $row;
        }
    }

    return $itemTypes;
}
