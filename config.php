<?php
/**
 * Configuration for database connection
 *
 */
$host       = "kunjapur-db.cd7ujhwko4bo.us-west-2.rds.amazonaws.com";
$dbname     = "kunjapurdb";
$username   = "sachit_kunjapur";
$password   = "KunjapurS@ksena1";
$dsn        = "mysql:host=$host;dbname=$dbname";
$port       = "3306";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );
