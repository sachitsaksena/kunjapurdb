<?php
/**
 * Configuration for database connection
 *
 */
$host       = "localhost";
$dbname     = "inventory";
$username   = "root";
$password   = "root";
$dsn        = "mysql:host=$host;dbname=$dbname";
$port       = "8889";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
