<h2>เพิ่มรายการรายจ่าย</h2>
<form action="add_expense.php" method="post">
    <div class="form-group">
        <label for="date">วันที่:</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">รายละเอียด:</label>
        <input type="text" name="description" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="amount">จำนวนเงิน:</label>
        <input type="number" name="amount" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="deposit">การมัดจำ (ถ้ามี):</label>
        <input type="number" name="deposit" class="form-control">
    </div>

    <div class="form-group">
        <label for="paid">ชำระเสร็จสิน:</label>
        <select name="paid" class="form-control">
            <option value="0">ไม่</option>
            <option value="1">ใช่</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">บันทึก</button>
</form>
