<style>
    .ta-size{
        font-size: 20px;
        font-weight: bold;
    }
</style>
<div class="register-create">
<div class="container" id="search-user">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">ตรวจสอบการรับสินค้า</h3>
        </div>
        <div class="panel-body">
            <div class="form-group row">
                <div class=" col-md-4">
                    <input type="text" class="form-control input-lg"  ref='search' v-model="search"
                           placeholder="ค้นหารหัสผู้สมัคร หรือ เบอร์โทร ">
                    <table class="table table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th width="60%">ชื่อ-นามสกุล</th>
                            <th width="10%"><i class="glyphicon glyphicon-upload"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(model,index) in filterShow" @click="View(model.id)" :class="check(model)">
                            <td>{{index+1}}</td>
                            <td>{{model.firstname}} {{model.lastname}}</td>
                            <td>
                                <i  v-if="model.status ==0" class="glyphicon glyphicon-thumbs-down text-danger" @click="View(model.id)"></i>
                                <i  v-if="model.status ==6" class="glyphicon glyphicon-thumbs-up " @click="View(model.id)"></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default" v-for="(model,index) in viewData">
                        <div class="panel-heading">
                            <h3 class="panel-title ">
                                คุณ{{model.firstname}} {{model.lastname}}
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="text-right"  v-if="model.status ==0">
                                <button class="btn btn-danger " @click="SaveData(model)"><i class="glyphicon glyphicon-ok"></i> บันทึกรับของ</button>
                            </div>
                            <div class="text-right"  v-if="model.status ==6">
                                <button class="btn btn-success" disabled><i class="glyphicon glyphicon-ok"></i> มารับสินค้าแล้ว</button>
                            </div>
                            <div class="row" >
                                <div class="col-md-8">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th width="30%">ชื่อ - นามสกุล</th>
                                            <td>{{model.firstname}} {{model.lastname}}</td>
                                        </tr>
                                        <tr>
                                            <th>ที่อยู่</th>
                                            <td>
                                                {{model.address}} ม.{{model.house_no}}
                                                ถ.{{model.street}} <br>ต.{{model.district}} อ.{{model.amphoe}} จ.{{model.province}} {{model.zipcode}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>เบอร์ติดค่อ</th>
                                            <td>
                                                {{model.phone}}
                                            </td>
                                        </tr>
                                        </thead>
                                    </table>
                                    <hr>
                                    <h4> ข้อมูลรายละเอียดการสมัคร</h4>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr class="active">
                                            <th>รายการประเภท</th>
                                            <th>ระยะ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td >{{model.type_register}}</td>
                                            <td>{{model.type_run}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="" v-if="DetailsRegister.length > 0">
                                    <label> รายละเอียดข้อมูลสมาชิก</label>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr class="active">
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>รายการประเภท</th>
                                            <th>ระยะ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="details in DetailsRegister">
                                            <td>{{details.firstname}} {{details.lastname}}</td>
                                            <td>{{details.type_register}}</td>
                                            <td>{{details.type_run}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr class="warning">
                                            <th>ขนาดเสื้อ</th>
                                            <th style="text-align: right;">จำนวน</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="Shirts in DataShirts">
                                            <td class="ta-size">{{Shirts.size_shirts}}</td>
                                            <td class="ta-size text-right">{{Shirts.sum_size}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
