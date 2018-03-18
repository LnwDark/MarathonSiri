<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">รายการจำนวนส่งเสื้อ แบบเดี่ยว</h3>
    </div>
    <div class="panel-body">
        <code>
            - sum date  by day
            -send one user
        </code>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>ขนาดเสื้อ</th>
                <th>วันที่</th>
                <th>จำนวน</th>
                <th>จัดการ</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>L</td>
                <td>10-02-2561</td>
                <td>20</td>
                <td>
                    <a href="<?=\yii\helpers\Url::to(['mock-up/send-v'])?>"><i class="glyphicon glyphicon-pencil"></i> </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>XL</td>
                <td>09-02-2561</td>
                <td>10</td>
                <td>
                    <i class="glyphicon glyphicon-pencil"></i>
                </td>
            </tr>
            <tr class="success">
                <td>3</td>
                <td>2XL</td>
                <td>02-02-2561</td>
                <td>5</td>
                <td>
                    <i class="glyphicon glyphicon-ok"></i>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>