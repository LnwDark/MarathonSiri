<?php

namespace app\controllers;

use app\models\RegisterDetails;
use Yii;
use app\models\Register;
use app\models\RegisterSearch;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;

/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new RegisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Register();
        $modelDetail = new  RegisterDetails();
        if ($model->load(Yii::$app->request->post())) {
            $model->status = 0;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Register model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Register::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPostRegister()
    {
        if ($dataPost = Yii::$app->request->post('data')) {
            $dataJsonPost = json_decode($dataPost, true);
            $ref_id = '';
            if (isset($dataJsonPost)) {
                foreach ($dataJsonPost as $array1) {
                    if (count($array1) > 1) {
                        foreach ($array1 as $k => $model) {
                            if ($k == 0) {
                                $register = new  Register();
                                $register->firstname = $model['info']['firstname'];
                                $register->lastname = $model['info']['lastname'];
                                $register->sex = $model['info']['gender'] == 'male' ? 1 : 2;
                                $register->birthday = $model['info']['dob'];
                                $register->email = $model['info']['email'];
                                $register->phone = $model['info']['mobile'];
                                $register->delivery_status = $model['info']['shipmethod'] == 'post' ? 1 : 2;
                                $register->emergency_name = $model['info']['emer_person'];
                                $register->emergency_phone = $model['info']['emer_contact'];
                                $register->type_register = $model['info']['type']; // ประเภท
                                $register->type_run = $model['info']['distance'];
                                $register->size_shirts = $model['info']['size'];
                                $register->type_group = 2; //สมัครทีม
                                $register->address = $model['address']['address'];
                                $register->house_no = $model['address']['moo'];
                                $register->soi = $model['address']['soi'];
                                $register->street = $model['address']['street'];
                                $register->district = $model['address']['subDistrict'];
                                $register->amphoe = $model['address']['district'];
                                $register->province = $model['address']['province'];
                                $register->zipcode = $model['address']['zipcode'];
                                $register->type_group = 2; //สมัครเดี่ยว
                                if (!empty($model['info']['file'])) {
                                    $register->status = 1;
                                } else {
                                    $register->status = 0;
                                }
                                if ($register->save()) {
                                    $ref_id = $register->id;
                                }
                            } else {
                                $register_ref = new  Register();
                                $register_ref->register_id = $ref_id;
                                $register_ref->firstname = $model['info']['firstname'];
                                $register_ref->lastname = $model['info']['lastname'];
                                $register_ref->sex = $model['info']['gender'] == 'male' ? 1 : 2;
                                $register_ref->birthday = $model['info']['dob'];
                                $register_ref->email = $model['info']['email'];
                                $register_ref->phone = $model['info']['mobile'];
                                $register_ref->type_register = $model['info']['type']; // ประเภท
                                $register_ref->type_run = $model['info']['distance'];
                                $register_ref->size_shirts = $model['info']['size'];
                                $register_ref->save();
                            }
                        }
                        echo 'success';
                    } else {
                        foreach ($array1 as $getModel2) {
                            $register = new  Register();
                            $register->firstname = $getModel2['info']['firstname'];
                            $register->lastname = $getModel2['info']['lastname'];
                            $register->sex = $getModel2['info']['gender'] == 'male' ? 1 : 2;
                            $register->birthday = $getModel2['info']['dob'];
                            $register->email = $getModel2['info']['email'];
                            $register->phone = $getModel2['info']['mobile'];
                            $register->delivery_status = $getModel2['info']['shipmethod'] == 'post' ? 1 : 2;
                            $register->emergency_name = $getModel2['info']['emer_person'];
                            $register->emergency_phone = $getModel2['info']['emer_contact'];
                            $register->type_register = $getModel2['info']['type']; // ประเภท
                            $register->type_run = $getModel2['info']['distance'];
                            $register->size_shirts = $getModel2['info']['size'];
                            //ที่อยู่
                            $register->address = $getModel2['address']['address'];
                            $register->house_no = $getModel2['address']['moo'];
                            $register->soi = $getModel2['address']['soi'];
                            $register->street = $getModel2['address']['street'];
                            $register->district = $getModel2['address']['subDistrict'];
                            $register->amphoe = $getModel2['address']['district'];
                            $register->province = $getModel2['address']['province'];
                            $register->zipcode = $getModel2['address']['zipcode'];
                            $register->type_group = 1; //สมัครเดี่ยว
                            if (!empty($getModel2['info']['file'])) {
                                $register->status = 1;
                            } else {
                                $register->status = 0;
                            }
                            $register->save();

                        }
                        echo 'success';
                    }
                }
            } else {
                echo 'no';
            }
        }
    }

    public function actionGetData()
    {
        $path = Yii::getAlias('@webroot/js');
        $fileName = "data.json";
        $dataJsonPost = json_decode(file_get_contents($path . DIRECTORY_SEPARATOR . $fileName), true);
        $ref_id = '';
        if (isset($dataJsonPost)) {
            foreach ($dataJsonPost as $array1) {
                if (count($array1) > 1) {
                    foreach ($array1 as $k => $model) {
                        if ($k == 0) {
                            $register = new  Register();
                            $register->firstname = $model['info']['firstname'];
                            $register->lastname = $model['info']['lastname'];
                            $register->sex = $model['info']['gender'] == 'male' ? 1 : 2;
                            $register->birthday = $model['info']['dob'];
                            $register->email = $model['info']['email'];
                            $register->phone = $model['info']['mobile'];
                            $register->delivery_status = $model['info']['shipmethod'] == 'post' ? 1 : 2;
                            $register->emergency_name = $model['info']['emer_person'];
                            $register->emergency_phone = $model['info']['emer_contact'];
                            $register->type_register = $model['info']['type']; // ประเภท
                            $register->type_run = $model['info']['distance'];
                            $register->size_shirts = $model['info']['size'];
                            $register->type_group = 2; //สมัครทีม
                            $register->address = $model['address']['address'];
                            $register->house_no = $model['address']['moo'];
                            $register->soi = $model['address']['soi'];
                            $register->street = $model['address']['street'];
                            $register->district = $model['address']['subDistrict'];
                            $register->amphoe = $model['address']['district'];
                            $register->province = $model['address']['province'];
                            $register->zipcode = $model['address']['zipcode'];
                            $register->type_group = 2; //สมัครเดี่ยว
                            if (!empty($model['info']['file'])) {
                                $register->status = 1;
                            } else {
                                $register->status = 0;
                            }
                            if ($register->save()) {
                                $ref_id = $register->id;
                            }
                        } else {
                            $register_ref = new  Register();
                            $register_ref->register_id = $ref_id;
                            $register_ref->firstname = $model['info']['firstname'];
                            $register_ref->lastname = $model['info']['lastname'];
                            $register_ref->sex = $model['info']['gender'] == 'male' ? 1 : 2;
                            $register_ref->birthday = $model['info']['dob'];
                            $register_ref->email = $model['info']['email'];
                            $register_ref->phone = $model['info']['mobile'];
                            $register_ref->type_register = $model['info']['type']; // ประเภท
                            $register_ref->type_run = $model['info']['distance'];
                            $register_ref->size_shirts = $model['info']['size'];
                            $register_ref->save();
                        }
                    }
                    echo 'success';
                } else {
                    foreach ($array1 as $getModel2) {
                        $register = new  Register();
                        $register->firstname = $getModel2['info']['firstname'];
                        $register->lastname = $getModel2['info']['lastname'];
                        $register->sex = $getModel2['info']['gender'] == 'male' ? 1 : 2;
                        $register->birthday = $getModel2['info']['dob'];
                        $register->email = $getModel2['info']['email'];
                        $register->phone = $getModel2['info']['mobile'];
                        $register->delivery_status = $getModel2['info']['shipmethod'] == 'post' ? 1 : 2;
                        $register->emergency_name = $getModel2['info']['emer_person'];
                        $register->emergency_phone = $getModel2['info']['emer_contact'];
                        $register->type_register = $getModel2['info']['type']; // ประเภท
                        $register->type_run = $getModel2['info']['distance'];
                        $register->size_shirts = $getModel2['info']['size'];
                        //ที่อยู่
                        $register->address = $getModel2['address']['address'];
                        $register->house_no = $getModel2['address']['moo'];
                        $register->soi = $getModel2['address']['soi'];
                        $register->street = $getModel2['address']['street'];
                        $register->district = $getModel2['address']['subDistrict'];
                        $register->amphoe = $getModel2['address']['district'];
                        $register->province = $getModel2['address']['province'];
                        $register->zipcode = $getModel2['address']['zipcode'];
                        $register->type_group = 1; //สมัครเดี่ยว
                        if (!empty($getModel2['info']['file'])) {
                            $register->status = 1;
                        } else {
                            $register->status = 0;
                        }
                        $register->save();

                    }
                    echo 'success';
                }
            }
        } else {
            echo 'no';
        }
    }

    public function actionPostSumDay()
    {
        $dataProvider = Yii::$app->db->createCommand("SELECT DATE (created_at) AS date_send,COUNT (ID) FROM register WHERE register_id IS NULL AND delivery_status=1 AND send_status IS NULL GROUP BY date_send 	ORDER BY date_send DESC")->queryAll();
        return $this->render('post-sum-day', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionDetailsAll($id)
    {
        $dataProvider = Yii::$app->db->createCommand("SELECT DATE
	( created_at ) AS date_send,
	CONCAT(firstname, ' ', lastname) AS fullname,
	send_status,
	id,
	address,
	house_no,
	soi,
	street,
	district,
	amphoe,
	province,
	zipcode,
		phone
FROM
	register 
WHERE
	register_id IS NULL 
	AND delivery_status = 1
	AND send_status IS NULL 
	AND  DATE ( created_at ) = :id")->bindValues(['id' => $id])->queryAll();
        return $this->render('details-all', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionSendPrint($id)
    {
        $dataProvider = Yii::$app->db->createCommand("SELECT DATE
	( created_at ) AS date_send,
	CONCAT(firstname, ' ', lastname) AS fullname,
	send_status,
	id,
	address,
	house_no,
	soi,
	street,
	district,
	amphoe,
	province,
	zipcode,
	phone
FROM
	register 
WHERE
	register_id IS NULL 
	AND delivery_status = 1 
	AND send_status IS NULL 
	AND  DATE ( created_at ) = :id")->bindValues(['id' => $id])->queryAll();
//
//    return $this->renderPartial('_send-print',[
//            'dataProvider'=>$dataProvider
//        ]);
        $html = $this->renderPartial('_send-print', [
            'dataProvider' => $dataProvider
        ]);
        $mpdf = new Mpdf([
            'mode' => 'UTF-8',
            'format' => 'A4',
            'orientation' => 'L',
            'margin_top' => '0',
            'margin_left' => '0',
            'margin_right' => '0',
            'margin_bottom' => '0',
        ]);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

    }

    public function actionSaveSend()
    {
        if ($data = \Yii::$app->request->post('id')) {
            foreach ($data as $model) {
                $rg = Register::findOne(['id' => $model]);
                $rg->send_status = 1;
                $rg->save();
            }
            return $this->redirect(['post-sum-day']);
        }
    }

    public function actionSearchUser()
    {

        return $this->render('search-user');
    }
    public function actionSaveData($id)
    {
        $rg=Register::findOne(['id'=>$id]);
        $rg->status = 6 ;
        $rg->save();
        return $this->redirect(['register/search-user']);
    }


    /*  =======================API */
    public function actionApiGetData()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $dataJson = Register::find()->where(['delivery_status' => 2])->orderBy('status asc')->all();
        return $dataJson;
    }
    public function actionGetDetails($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $dataJson = Register::find()->where(['register_id' => $id])->all();
        return $dataJson;
    }
    public function actionGetDataShirts($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $dataJson = Yii::$app->db->createCommand("SELECT size_shirts,COUNT (size_shirts) AS sum_size FROM register WHERE register_id=:register_id OR ID=:id GROUP BY size_shirts")->bindValues(['register_id' => $id, 'id' => $id])->queryAll();
        return $dataJson;
    }
}
