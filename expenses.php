<h2>รายการรายจ่าย</h2>
<table class="table">
    <thead>
        <tr>
            <th>วันที่</th>
            <th>รายละเอียด</th>
            <th>จำนวนเงิน</th>
            <th>การมัดจำ</th>
            <th>ยอดคงเหลือ</th>
            <th>การชำระเสร็จสิน</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $expenses = json_decode(file_get_contents('expenses.json'), true);

        foreach ($expenses as $key => $expense) {
            $balance = $expense['amount'] - (isset($expense['deposit']) ? $expense['deposit'] : 0);
            echo "<tr>
                    <td>{$expense['date']}</td>
                    <td>{$expense['description']}</td>
                    <td>{$expense['amount']}</td>
                    <td>" . (isset($expense['deposit']) ? $expense['deposit'] : '-') . "</td>
                    <td>$balance</td>
                    <td>" . ($expense['paid'] ? 'ใช่' : 'ไม่ใช่') . "</td>
                    <td>
                        <a href='edit_expense.php?key=$key' class='btn btn-warning btn-sm'>แก้ไข</a>
                        <a href='delete_expense.php?key=$key' class='btn btn-danger btn-sm'>ลบ</a>
                        <a href='mark_paid.php?key=$key' class='btn btn-success btn-sm'>เสร็จสิน</a>
                    </td>
                </tr>";
        }
        ?>
    </tbody>
</table>
