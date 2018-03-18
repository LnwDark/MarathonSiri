<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: "Garuda";
        }

        .mainpage {
            height: 50%;
            width: 100%;
            border: 1px solid black;
        }

        .sender {
            height: 120px;
            width: 350px;
            margin-top: 35px;
            /*padding-top: 1px;*/
         padding-left: 10px ;
            font-size: 14px ;
            margin-left: 40px;
            border: 1px solid black;
        }

        .reveiver {
            margin-top: 80px;
            margin-left: 250px;
            border: 1px solid black;
            height: 150px;
            width: 420px;
        }
        able {
            background-color: transparent;
        }
        caption {
            padding-top: 8px;
            padding-bottom: 8px;
            color: #777;
            text-align: left;
        }
        th {
            text-align: left;
        }

        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }

        .shirts{
            margin-top: -100px;
            margin-left: 540px;
        }
    </style>
</head>
<body>
<?php foreach ($dataProvider as $key => $value): ?>
    <div class="mainpage">
        <div class="sender" >
            <div style="font-size: 18px ; font-weight: bold;">ชื่อและที่อยู่ผู้ส่ง</div>
                <div style="font-size: 16px; ">โรงเรียนสิริรัตนาธร</div>
                <div style="font-size: 16px; ">ซอยอุดมสุข30  สุขุมวิท103 บางนา กทม 10260</div>
        </div>
        <div class="shirts">
        <table class="table">
            <thead>
            <tr>
                <th>ขนาดเสื้อ</th>
                <th style="text-align: right;">จำนวน</th>
            </tr>
            </thead>
            <?php foreach ( Yii::$app->db->createCommand("SELECT size_shirts,COUNT (size_shirts) AS sum_size FROM register WHERE register_id=:register_id OR ID=:id GROUP BY size_shirts")->bindValues(['register_id' =>  $value['id'] , 'id' =>  $value['id'] ])->queryAll() as $Qmodel): ?>
                <tr>
                    <td><?= @$Qmodel['size_shirts'] ?></td>
                    <td style="text-align: right;"><?= @$Qmodel['sum_size'] ?> ตัว</td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <br>
        <br>
        <div class="reveiver" style="padding-left: 10px">
            <div style="font-size: 18px ; font-weight: bold">ชื่อและที่อยู่ผู้รับ     </div>
                <div style="font-weight: normal ; font-size: 16px"><strong>คุณ<?= $value['fullname'] ?></strong></div>
                <div style="font-weight: normal ; font-size: 16px"> <?=$value['address'].' '.'ม.'.@$value['house_no'].' '.'ซ.'.@$value['soi'].' '.'ถ.'.@$value['street'] ?></div>
            <div style="font-weight: normal ; font-size: 16px"> <?='ต.'.$value['district'] .' '.'อ.'.$value['amphoe'].' '.'จ.'.$value['province'].' '.$value['zipcode'] ?></div>
            <div style="font-weight: normal ; font-size: 16px"> <?='เบอร์ติดต่อ:'.' '.$value['phone']  ?></div>
        </div>

    </div>

<?php endforeach; ?>
</body>
</html>
