<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "register".
 *
 * @property int $id
 * @property int $register_id
 * @property string $firstname
 * @property string $lastname
 * @property int $sex
 * @property string $birthday
 * @property string $id_card
 * @property int $phone
 * @property string $email
 * @property string $club
 * @property int $status
 * @property int $delivery_status
 * @property int $send_status
 * @property int $type_group
 * @property string $emergency_name
 * @property string $emergency_phone
 * @property string $type_register
 * @property string $type_run
 * @property string $size_shirts
 * @property string $slip
 * @property string $house_no
 * @property string $address
 * @property string $soi
 * @property string $street
 * @property string $district
 * @property string $amphoe
 * @property string $province
 * @property string $zipcode
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Register extends \yii\db\ActiveRecord
{
    public $price_send = 56;

    public static function tableName()
    {
        return 'register';
    }

    public function behaviors()
    {
        return [
            BlameableBehavior::className(),
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
//
    public function rules()
    {
        return [

            [['birthday', 'created_at', 'updated_at','sex', 'phone', 'status', 'delivery_status', 'send_status', 'type_group', 'created_by', 'updated_by','firstname', 'lastname', 'id_card', 'email', 'club', 'emergency_name', 'emergency_phone', 'type_register', 'type_run', 'size_shirts', 'slip', 'house_no', 'address', 'soi', 'street', 'district', 'amphoe', 'province', 'zipcode','register_id','price_send'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fullName' => 'ชื่อ - นามสกุล',
            'sex' => 'เพศ',
            'birthday' => 'Birthday',
            'id_card' => 'Id Card',
            'phone' => 'Phone',
            'email' => 'Email',
            'club' => 'Club',
            'status' => 'Status',
            'delivery_status' => 'Delivery Status',
            'send_status' => 'Send Status',
            'type_group' => 'Type Group',
            'emergency_name' => 'Emergency Name',
            'emergency_phone' => 'Emergency Phone',
            'type_register' => 'ประเภทสมัคร',
            'type_run' => 'ระยะ',
            'size_shirts' => 'ขนาดเสื้อ',
            'slip' => 'Slip',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }


    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAge()
    {
        $year = date('Y') + 543;
        $SubBirthday = substr($this->birthday, 0, 4);
        if (!empty($SubBirthday)) {
            return $year - $SubBirthday;
        } else {
            return 0;
        }

    }

    public static function itemsAlias($key)
    {
        $items = [
            'sex' => [
                1 => 'ชาย',
                2 => 'หญิง'
            ],
            'status' => [
                0 => 'ยังไม่ชำระ',
                1 => '<i class="glyphicon glyphicon-ok text-success"></i> ชำระแล้ว ',
            ],
            'delivery_status'=>[
                1=>' ส่งไปรษณีย์ ',
                2=>' มารับเอง '
            ],
            'type_register' => [
                1 => 'นักเรียน (200 บาท)',
                2 => 'ประชาชน (400 บาท)',
                3 => 'VIP (1,000 บาท)',
                4 => 'แฟนซี (400 บาท)',
            ],
            'type_regis_price' => [
                'นักเรียน' => 200,
                'บุคคลทั่วไป' => 400,
                'ประชาชน' => 400,
                'vip' => 1000,
                'แฟนซี' => 400,
            ],
            'type_run' => [
                3 => '3 Km.',
                5 => '5 Km.',
                10 => '10 Km.',
            ],
            'size_shirts' => [
                'SS' => 'SS (34")',
                'S' => 'S (36")',
                'M' => 'M (38")',
                'L' => 'L (40")',
                'XL' => 'XL (42")',
                '2XL' => '2XL (44")',
                '3XL' => '3XL (46")',
            ],

        ];
        return ArrayHelper::getValue($items, $key, []);
    }

    public function getItemSex()
    {
        return self::itemsAlias('sex');
    }

    public function getItemDelivery()
    {
        return self::itemsAlias('delivery_status');
    }



    public function getItemSizeShirts()
    {
        return self::itemsAlias('size_shirts');
    }

    public function getItemRun()
    {
        return self::itemsAlias('type_run');
    }
    public function getItemStatus()
    {
        return self::itemsAlias('status');
    }
    public function getItemPrice()
    {
        return self::itemsAlias('status');
    }

    public function getTypeStatusName()
    {
        return ArrayHelper::getValue($this->getItemStatus(), $this->status);
    }

    public function getTypeRunName()
    {
        return ArrayHelper::getValue($this->getItemRun(), $this->type_run);
    }
    public function getDeliveryName()
    {
        return ArrayHelper::getValue($this->getItemDelivery(), $this->delivery_status);
    }
    public function getTypeRunNameKey($key)
    {
        return ArrayHelper::getValue($this->getItemRun(), $key);
    }
    public function getPrice()
    {
        return self::itemsAlias('type_regis_price');
    }
    public function getPriceRegister($data)
    {
        return ArrayHelper::getValue($this->getPrice(), $data);
    }

    public function getTypeShirtsName()
    {
        return ArrayHelper::getValue($this->getItemSizeShirts(), $this->size_shirts);
    }

    // รวมราคา
    public function getCalAllSend($status,$totalAll)
    {
        if ($status == 1) {
            return $totalAll+$this->price_send;
        } else {
            return $totalAll;
        }
    }
}
