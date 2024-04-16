<?php

// PDO

try {
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'test', 'test');
    $statement = $pdo->query("SELECT 'Привет, дорогой пользователь MySQL!' AS _message FROM DUAL");
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    echo htmlentities($row['_message']);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
    echo "Finally.\n";
}
