<?php
    if(empty($_SESSION['userID'])){
        header("location:../index.php");   
    }
?>
<div id="modaladdpatient" class="modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md"style="max-width: 370px;">
        <div class="modal-content">

            <div class="modal-header" style="background: linear-gradient(to right, #1f87c0 0%, #1f87c0 100%);">
                <h4 style="color: #ffffff !important; font-weight: 400; font-size: 18px; margin-bottom: 0rem" id="txtopenuseraccheader"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="clearpatient()">×</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <input type="hidden" class="form-control clearinfo" id="txtpatientID">

                    <div class="col-md-12 mb-2">
                        <span>Firstname</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtaddpatientFname">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Middlename</span>
                        <input type="text" class="form-control clearinfo " id="txtaddpatientMname">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Lastname</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtaddpatientLname">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Email</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtaddpatientEmail">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Contact Number</span>
                        <input type="text" class="form-control clearinfo reqresinfo contactnum" id="txtaddpatientContactNum">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Username</span>
                        <input type="text" class="form-control clearinfo reqresinfo" id="txtaddpatientUsername">
                    </div>

                    <div class="col-md-12 mb-2">
                        <span>Password</span>
                        <div class="input-group">
                            <input type="Password" class="form-control clearinfo reqresinfo" id="txtaddpatientpass">
                            <div class="input-group-prepend" id="inputaddusereye2" style="cursor: pointer;" onclick="fncaddpassattribunHash();">
                                <span class="input-group-text"><i class="fas fa-eye-slash" id="addusereye2"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="padding: 10px 15px;">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn float-right btn-dark btnuseraccSAVE" onclick="addpatientacc();" style="width: 80px;">Save</button>
                        <button class="btn float-right btn-dark btnuseraccUPDATE hide" onclick="editpatient();" style="width: 80px;">Update</button>
                    </div> 
                </div>
            </div>

        </div>
    </div>
</div>