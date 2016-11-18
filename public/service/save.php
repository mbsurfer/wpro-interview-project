<?php

require __DIR__ . '/../../repository/db.php';

$postParams = $_POST;

$sql = "INSERT IGNORE INTO favorites SET ";
$sql .= " item_type_id = ". (int)$postParams['item_type_id']." ,";
$sql .= " name = '".$postParams['name']."' ";

$result = $dbConn->query($sql);

echo json_encode( array(
    'success' => empty($result) ? false : true,
    'errorMsg' => isset($dbConn->error) ? $dbConn->error : null
));
exit;