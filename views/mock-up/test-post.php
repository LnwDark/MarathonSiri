<div id="app">
    <div class="row">
        <div class="col-md-6">
            <button class="btn btn-success" @click="send1()">@</button>
          <pre>
       {{array1}}
   </pre>
        </div>
        <div class="col-md-6">
            <button class="btn btn-success" @click="send2">@@</button>
            <button class="btn btn-danger" @click="send3">post</button>
            <pre>{{array2}}</pre>
        </div>
    </div>
</div>
<?php
$Url=\yii\helpers\Url::to(['register/post-register']);
$js = <<<JS
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    array1:{"data": [
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "vip",
        "distance": 10,
        "size": "M",
        "shipmethod": "posts",
        "firstname": "คนเดียว 1",
        "lastname": "เพื่อพี่น้อง",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
  ]
},
   array2:{"data": [
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "vip",
        "distance": 10,
        "size": "M",
        "shipmethod": "posts",
        "firstname": "อิเลียส",
        "lastname": "มูธา-เซ็บตาอุย",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "ประชาชน",
        "distance": 5,
        "size": "L",
        "shipmethod": "post",
        "firstname": "แม็กซ์",
        "lastname": "จอห์นสโตน",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
        {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "ประชาชน",
        "distance": 5,
        "size": "XL",
        "shipmethod": "post",
        "firstname": "คีแรน",
        "lastname": "โอฮาร่า",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    }

  ]},
     array3:{"data": [
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "vip",
        "distance": 5,
        "size": "M",
        "shipmethod": "posts",
        "firstname": "อิเลียสs",
        "lastname": "มูธา-เซ็บตาอุย",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0884694806",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "ประชาชน",
        "distance": 5,
        "size": "L",
        "shipmethod": "post",
        "firstname": "แม็กซ์",
        "lastname": "จอห์นสโตน",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "ประชาชน",
        "distance": 5,
        "size": "XL",
        "shipmethod": "post",
        "firstname": "คีแรน",
        "lastname": "โอฮาร่า",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "ประชาชน",
        "distance": 5,
        "size": "L",
        "shipmethod": "post",
        "firstname": "แม็กซ์",
        "lastname": "จอห์นสโตน",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0884694806",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    },
    {
      "info": {
        "age": 31,
        "dob": "1982-04-04",
        "type": "ประชาชน",
        "distance": 5,
        "size": "XL",
        "shipmethod": "post",
        "firstname": "คีแรน",
        "lastname": "โอฮาร่า",
        "gender": "male",
        "email": "pondzz@gmail.com",
        "mobile": "0855198189",
        "emer_person": "tactic",
        "emer_contact": "0830099599"
      },
      "address": {
        "moo": "11",
        "address": "10/99",
        "subDistrict": "สะเดา",
        "district": "สำนักขาม",
        "province": "สงขลา",
        "zipcode": 90320,
        "soi": "แบริ่ง 58",
        "street": "สุขุมวิท"
      }
    }

  ]},
  },
  methods:{
      send1:function(){
       return jQuery.post('$Url',{data:JSON.stringify(this.array1)},function(data){
              console.log(data)
          });
      },
      send2:function(){
          return jQuery.post('$Url',{data:JSON.stringify(this.array2)},function(data){
              console.log(data)
          });
      },
       send3:function(){
          return jQuery.post('$Url',{data:JSON.stringify(this.array3)},function(data){
              console.log(data)
          });
      }
  }
})
JS;
$this->registerJS($js);
?>