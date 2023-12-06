<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['key'])) {
    $key = $_GET['key'];
    $expenses = json_decode(file_get_contents('expenses.json'), true);
    unset($expenses[$key]);

    file_put_contents('expenses.json', json_encode(array_values($expenses)));

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
