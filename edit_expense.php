<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['key'])) {
    $key = $_GET['key'];
    $expenses = json_decode(file_get_contents('expenses.json'), true);
    $expense = $expenses[$key];
} else {
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายการรายจ่าย</title>
    <!-- เพิ่ม Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>แก้ไขรายการรายจ่าย</h2>
        <form action="update_expense.php?key=<?php echo $key; ?>" method="post">
            <div class="form-group">
                <label for="date">วันที่:</label>
                <input type="date" name="date" class="form-control" value="<?php echo $expense['date']; ?>" required>
            </div>

            <div class="form-group">
                <label for="description">รายละเอียด:</label>
                <input type="text" name="description" class="form-control" value="<?php echo $expense['description']; ?>" required>
            </div>

            <div class="form-group">
                <label for="amount">จำนวนเงิน:</label>
                <input type="number" name="amount" class="form-control" value="<?php echo $expense['amount']; ?>" required>
            </div>

            <div class="form-group">
                <label for="deposit">การมัดจำ (ถ้ามี):</label>
                <input type="number" name="deposit" class="form-control" value="<?php echo isset($expense['deposit']) ? $expense['deposit'] : ''; ?>">
            </div>

            <div class="form-group">
                <label for="paid">การชำระเสร็จสิน:</label>
                <select name="paid" class="form-control">
                    <option value="0" <?php echo $expense['paid'] == 0 ? 'selected' : ''; ?>>ไม่</option>
                    <option value="1" <?php echo $expense['paid'] == 1 ? 'selected' : ''; ?>>ใช่</option>
                </select>
            </div>

            

            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        </form>
    </div>

    <!-- เพิ่ม Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
