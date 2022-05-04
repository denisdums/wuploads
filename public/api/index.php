<?php

require './Creator.php';


if (!isset($_POST['distant']) || !isset($_POST['local'])) {
    header("Content-Type: application/json");
    header("HTTP/1.1 400 Bad Request");
    echo json_encode(['error' => $_POST]);
    exit();
}


$creator = new Creator($_POST['distant'], $_POST['local'], $_POST['type']);
$content = $creator->getContent();

header("Cache-Control: no-cache, must-revalidate");
header("HTTP/1.1 200 OK");
echo json_encode(['content' => $content]);
exit();