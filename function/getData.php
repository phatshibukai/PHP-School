<?php
declare(strict_types=1);

function getQuery(string $q): array
{
    $conn = require_once("../connection/connection.php");

    try {
        $sql = $q;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $ex) {
        echo "Error: " . $ex->getMessage();
    }
}
