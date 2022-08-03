<?php

/**
 * SQLInjection.php
 *
 * PHP Version 8
 *
 * @category Source
 * @package  App
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */

declare(strict_types=1);

namespace App;

$host = 'localhost';
$dbname = 'cs3620';
$user = 'cs3620';
$pass = 'letmein';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$pdo = null;

print("Homework 09 - SQL Injection</br>");
var_dump($_GET);
print("</br>");

// URL with SQL injection: http://localhost/SQLInjection.php?col_string=%27Two%27+OR+1=1--&col_number=2
try {
    $pdo = new \PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), $e->getCode());
}

// $query = "SELECT * FROM test WHERE col_string = {$_GET['col_string']} AND col_number = {$_GET['col_number']}";
$query1 = "SELECT * FROM test WHERE col_string = :colString AND col_number = :colNumber";

// $stmt = $pdo->query($query);
$stmt = $pdo->prepare($query1);
$stmt->execute([
    'colString' => $_GET['col_string'],
    'colNumber' => $_GET['col_number'],
]);

print('Retrieved ' . $stmt->rowCount() . ' row(s)</br></br>');

while ($row = $stmt->fetch()) {
    printf('<li>%s, %s, %s, %s, %s</li></br>', $row[0], $row[1], $row[2], $row[3], $row[4]);
}

$stmt->closeCursor();

echo "All done...";
