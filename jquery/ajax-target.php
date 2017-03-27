<?php

header("Content-type: application/json");
$response = [
    "name" => $_POST['name'],
    "age" => $_POST['age'],
];
echo json_encode(json_encode($response));