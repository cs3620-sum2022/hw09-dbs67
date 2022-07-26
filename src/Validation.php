<?php
/**
 * Validation.php
 *
 * PHP Version 8
 *
 * @category Source
 * @package  App
 * @author   Don Stringham <donstringham@weber.edu>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://weber.edu
 */
namespace App;

$host = 'mysql-db';
$dbname = 'cs3620';
$user = 'cs3620';
$pass = 'letmein';

// TODO write code that validates the  data variables passed in on http://localhost/Validation.php?col_string=Two&col_number=2

// $_GET is a PHP super-global read more about super-globals here:
// https://secure.php.net/manual/en/language.variables.superglobals.php

print("Homework 09 - Data Validation</br>");
var_dump($_GET);
print("</br>");
print("col_string=" . $_GET['col_string'] . "</br>");
print("col_number=" . $_GET['col_number'] . "</br>");