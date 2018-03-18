<?php

namespace app\controllers;

class MockUpController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionManager()
    {
        return $this->render('manager');
    }
    public function actionMV()
    {
        return $this->render('manager_view');
    }
    public function actionSendOne()
{
    return $this->render('send');
}
    public function actionSendV()
    {
        return $this->render('send_view');
    }
    public function actionCheck()
    {
        return $this->render('check');
    }
    public function actionSlip()
    {
        return $this->render('slip');
    }
    public function actionTestPost()
    {
        return $this->render('test-post');
    }
}
