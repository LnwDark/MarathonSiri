<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Register;
/* @var $this yii\web\View */
/* @var $model app\models\Register */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>
    <h3>ข้อมูลส่วนตัว</h3>
    <hr>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'sex')->radioList($model->getItemSex()) ?>

    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'birthday')->textInput(['type'=>'date']) ?>

    </div>
</div>

    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'emergency_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput() ?>
            <?= $form->field($model, 'emergency_phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <h3>ข้อมูลรายละเอียดการสมัคร</h3>
    <hr>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>รายการประเภท</th>
            <th>ระยะ</th>
            <th>ขนาดเสื้อ</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=@$model->type_register; ?></td>
                <td><?=@$model->typeRunName; ?></td>
                <td><?=@$model->size_shirts; ?></td>
            </tr>
        </tbody>
    </table>
    <?php if(empty(!$ref_data=Register::find()->where(['register_id'=>$model->id])->all())):?>
    <div class="row">
        <div class="col-md-12">
            <h4>รายละเอียดข้อมูลสมาชิก</h4>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>รายการประเภท</th>
                    <th>ระยะ</th>
                    <th>ขนาดเสื้อ</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ref_data as$k=> $md):?>
                <tr>
                    <td><?=@$k+1 ?></td>
                    <td><?=@$md->fullName; ?></td>
                    <td><?=@$md->type_register; ?></td>
                    <td><?=@$md->typeRunName; ?></td>
                    <td><?=@$md->size_shirts; ?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <?php endif;?>
    <div class="form-group text-right">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
