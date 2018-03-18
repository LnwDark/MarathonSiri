<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
$this->title = 'จัดการข้อมูลผู้สมัคร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-index">
    <?php $columns=[
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'fullName',
            'headerOptions' => ['style' => 'width:40%'],
            'pageSummary'=>'Total',
            'pageSummaryOptions'=>['class'=>'text-right text-warning'],
//                        'group'=>true
        ],
        [
            'label' => 'เบอร์โทร',
            'attribute'=>'phone',
            'headerOptions' => ['class' => 'text-center','style' => 'width:10%'],
        ],
        [
            'label' => 'ประเภทสมัคร',
            'attribute'=>'type_register',
            'headerOptions' => ['class' => 'text-center','style' => 'width:10%'],
        ],
        [
            'label' => 'ระยะ',
            'attribute'=>'type_run',
                'headerOptions' => ['class' => 'text-right','style' => 'width:10%'],
            'contentOptions' => ['class' => 'text-right']
        ],
        [
            'label' => 'ขนาดเสื้อ',
            'attribute'=>'size_shirts',
            'headerOptions' => ['class' => 'text-right', 'style' => 'width:10%'],
            'contentOptions' => ['class' => 'text-right']
        ],

//        [
//            'label' => 'สถานะ',
//            'format'=>'raw',
//            'headerOptions' => ['style' => 'width:10%'],
//            'attribute'=>'typeStatusName'
//        ],
        [
            'label' => 'การรับสินค้า',
            'attribute'=>'DeliveryName',
            'headerOptions' => ['class' => 'text-right', 'style' => 'width:10%'],
            'contentOptions' => ['class' => 'text-right']
        ],
        [
            'label' => 'จัดการข้อมูล',
            'format'=>'raw',
             'value'=>function($model){
                return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => '']);
             }
        ],
    ];
    $exportConfig=[

        [
            'attribute' => 'fullName',
            'headerOptions' => ['style' => 'width:40%'],
            'pageSummary'=>'Total',
            'pageSummaryOptions'=>['class'=>'text-right text-warning'],
//                        'group'=>true
        ],
        [
            'label' => 'เบอร์โทร',
            'attribute'=>'phone',
            'headerOptions' => ['class' => 'text-center','style' => 'width:10%'],
        ],
        [
            'label' => 'ประเภทสมัคร',
            'attribute'=>'type_register',
            'headerOptions' => ['class' => 'text-center','style' => 'width:10%'],
        ],
        [
            'label' => 'ระยะ',
            'attribute'=>'type_run',
            'headerOptions' => ['class' => 'text-right','style' => 'width:10%'],
            'contentOptions' => ['class' => 'text-right']
        ],
        [
            'label' => 'ขนาดเสื้อ',
            'attribute'=>'size_shirts',
            'headerOptions' => ['class' => 'text-right', 'style' => 'width:10%'],
            'contentOptions' => ['class' => 'text-right']
        ],



    ]
    ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' =>$columns,
        'exportConfig' => [
            GridView::EXCEL => [
                'label' => 'Excel',
                'icon' => 'file-excel-o',
                'iconOptions' => ['class' => 'text-success'],
                'showHeader' => true,
                'showPageSummary' => true,
                'showFooter' => true,
                'showCaption' => true,
                'filename' => 'grid-export',
                'alertMsg' => 'The EXCEL export file will be generated for download',
                'options' => ['title' => 'Microsoft Excel 95+'],
                'mime' => 'application/vnd.ms-excel',
                'config' => [
                    'worksheet' => 'ExportWorksheet',
                    'cssFile' => ''
                ]
            ],
        ],
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar' =>  [
                    [
                            'content' =>''
                    ],

                    '{toggleData}',
                    ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $exportConfig,
                        'hiddenColumns' => [7],
                        //'disabledColumns'=>[1, 2], // ID & Name
                        'fontAwesome' => true,
                        'dropdownOptions' => [
                            'label' => 'Export',
                            'class' => 'btn btn-danger'
                        ],
                        'exportConfig' => [
                            ExportMenu::FORMAT_TEXT => false,
                            ExportMenu::FORMAT_PDF => false,
                            ExportMenu::FORMAT_HTML => false,
                            ExportMenu::FORMAT_CSV => false,
                            ExportMenu::FORMAT_EXCEL_X => true,
                            ExportMenu::FORMAT_EXCEL => [
                                'label' => 'ออกรายงาน excel ',
                                'icon' => 'file-excel-o',
                                'iconOptions' => ['class' => 'text-success'],
                                'showHeader' => true,
                                'alertMsg' => 'ยืนยันการออกรายงาน',
                                'filename' => 'ออกรายงานผู้สมัครทั้งหมด',
                                'options' => ['title' => 'Excel'],
                                'alertMsg' => 'ยืนยันการ',
                                'mime' => 'application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                                'extension' => 'xls',
//                                'writer' => 'Excel2007'
                            ],
                        ],
                    ])
                ],
                // set export properties
        'export'=>[
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
                // parameters from the demo form
                'showPageSummary' => false,
                'striped'=>true,
                'hover'=>true,
                'bordered' => true,
                'condensed' => true,
                'responsive' => true,
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => Html::encode($this->title),
                ],
                'persistResize' => false,
                'toggleDataOptions' => ['minCount' => 5],
            ]); ?>

        </div>
