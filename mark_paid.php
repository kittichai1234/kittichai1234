<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['key'])) {
    $key = $_GET['key'];
    $expenses = json_decode(file_get_contents('expenses.json'), true);
    $expenses[$key]['paid'] = 1;

    file_put_contents('expenses.json', json_encode($expenses));

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
