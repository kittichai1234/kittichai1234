<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['key'])) {
    $key = $_GET['key'];
    $expenses = json_decode(file_get_contents('expenses.json'), true);
    $expenses[$key] = [
        'date' => $_POST['date'],
        'description' => $_POST['description'],
        'amount' => $_POST['amount'],
        'deposit' => isset($_POST['deposit']) ? $_POST['deposit'] : 0,
        'paid' => $_POST['paid'],
    ];

    file_put_contents('expenses.json', json_encode($expenses));

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
