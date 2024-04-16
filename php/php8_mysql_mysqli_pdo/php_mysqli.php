<?php

// mysqli

try {
    $mysqli = new mysqli("localhost", "root", "test", "test");
    $result = $mysqli->query("SELECT 'Привет, дорогой пользователь MySQL!' AS _message FROM DUAL");
    $row = $result->fetch_assoc();
    echo htmlentities($row['_message']);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Finally.\n";
}
