<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Register */

$this->title = 'Update Register: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fullName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="register-view">
    <div class="text-right">
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">ข้อมูลสมาชิก <?= @$model->getFullName() ?></h3>
                </div>
                <div class="panel-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">สรุปค่าชำระ</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $total = 0;
                    $onePrice= $model->getPriceRegister($model->type_register);
                    $DATA=app\models\Register::findAll(['register_id'=>$model->id]);
                    if(!empty($DATA)){
                        foreach ($DATA as $show){
                            $total+=$model->getPriceRegister($show->type_register);
                        }
                            $total=$model->getCalAllSend($model->delivery_status,$total+$onePrice);;
                    }else{
                        $total = $model->getCalAllSend($model->delivery_status,$onePrice);
                    }
                    ?>
                    <ul class="list-group">
                        <li class="list-group-item"><h4>สถานะการรับ :  <?=@$model->DeliveryName?></h4></li>
                        <li class="list-group-item"><h3>ยอดรวมทั้งหมด : <?=@number_format($total,0)?> </h3></li>
                    </ul>

                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">สรุปรายการ</h3>
                </div>
                <div class="panel-body">
                    <?php
                    $sql = "SELECT size_shirts,COUNT (size_shirts) AS sum_size FROM register WHERE register_id=:register_id OR ID=:id GROUP BY size_shirts";
                    $query = Yii::$app->db->createCommand($sql)->bindValues(['register_id' => $model->id, 'id' => $model->id])->queryAll();

                    ?>
                    <h4>รายการประเภท</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ชื่อรายการ</th>
                            <th>จำนวน</th>
                        </tr>
                        </thead>
                        <?php foreach (Yii::$app->db->createCommand("SELECT type_register,COUNT (type_register) AS sum_type_register FROM register WHERE register_id = :register_id OR ID=:id GROUP BY type_register")->bindValues(['register_id' => $model->id, 'id' => $model->id])->queryAll() as $Qmodel): ?>
                            <tr>
                                <td><?= @$Qmodel['type_register'] ?></td>
                                <td><?= @$Qmodel['sum_type_register'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <hr>
                    <h4>รายการระยะทาง</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ชื่อรายการ</th>
                            <th>จำนวน</th>
                        </tr>
                        </thead>
                        <?php foreach (Yii::$app->db->createCommand("SELECT type_run,COUNT (type_run) AS sum_type_run FROM register WHERE register_id = :register_id OR ID=:id GROUP BY type_run")->bindValues(['register_id' => $model->id, 'id' => $model->id])->queryAll() as $Qmodel): ?>
                            <tr>
                                <td><?= @$model->getTypeRunNameKey($Qmodel['type_run']) ?></td>
                                <td><?= @$Qmodel['sum_type_run'] ?></td>
                                <td><?= @$Qmodel['sum_type_run'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <hr>
                    <h4>รายการขนาดเสื้อ</h4>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ชื่อรายการ</th>
                            <th>จำนวน</th>
                        </tr>
                        </thead>
                        <?php foreach ($query as $Qmodel): ?>
                            <tr>
                                <td><?= @$Qmodel['size_shirts'] ?></td>
                                <td><?= @$Qmodel['sum_size'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                </div>
            </div>
        </div>
    </div>

