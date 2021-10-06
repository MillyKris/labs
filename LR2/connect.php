<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=coursera', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}