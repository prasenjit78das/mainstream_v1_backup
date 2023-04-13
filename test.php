<?php
// Create a new MySQLi object
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Get foreign key constraints of the table
$result = $mysqli->query("SHOW CREATE TABLE table_name");
$row = $result->fetch_row();
$foreign_key_constraints = $row[1];

// Extract table name(s) referenced by foreign key
preg_match_all('/CONSTRAINT `.*` FOREIGN KEY \(`.*`\) REFERENCES `(.*)` \(`.*`\)/U', $foreign_key_constraints, $matches);
$referenced_tables = array_unique($matches[1]);

// Check if referenced table matches
if (in_array("referenced_table_name", $referenced_tables)) {
    echo "Foreign key exists in referenced_table_name";
} else {
    echo "Foreign key does not exist in referenced_table_name";
}

// Close database connection
$mysqli->close();
?>