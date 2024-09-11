<?php
try {
    $pdo = new PDO('mysql:host=186.202.152.237;dbname=diariocor', 'mcqeletro', 'Mcq@134*');
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>
