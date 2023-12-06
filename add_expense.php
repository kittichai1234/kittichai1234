<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newExpense = [
        'date' => $_POST['date'],
        'description' => $_POST['description'],
        'amount' => $_POST['amount'],
        'deposit' => isset($_POST['deposit']) ? $_POST['deposit'] : 0,
        'paid' => $_POST['paid'],
    ];

    $expenses = json_decode(file_get_contents('expenses.json'), true);
    $expenses[] = $newExpense;

    file_put_contents('expenses.json', json_encode($expenses));

    header('Location: index.php');
    exit;
}
?>
