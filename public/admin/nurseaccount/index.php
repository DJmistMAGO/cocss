<style type="text/css">
    .Iclass{
        font-size:1.3rem;
        cursor:pointer;
        font-weight: 500;
    }

    ul.pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.pagination li {
        cursor: pointer;
        display: inline;
        color: #3a4651 !important;
        font-weight: 600;
        padding: 4px 8px;
        border: 1px solid #CCC;
    }

    .pagination li:first-child{
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }

    .pagination li:last-child{
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    ul.pagination li:hover{
        background-color: #3a4651;
        color: white !important;
    }

    .pagination .active{
        background-color: #3a4651;
        color: white !important;
    }

    .table thead th, .table th {
        background-color: #33343f !important;
    }

    .BCardShadow:hover
    {
        box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.20);
    }

    .webkitlala2
    {
        overflow: hidden;
        height: 41px;
        /*line-height: 17px;*/
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        -o-text-overflow: ellipsis;
        text-overflow: ellipsis;
    }
</style>
<?php
    if(empty($_SESSION['userID'])){
        header("location:../index.php");   
    }
?>

<div class="row">
    <div class="col-12">
        <div class="card" style="margin-bottom: 0px;">
            <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                <div class="row page-titles" style="padding-bottom: 0px;">
                    <div class="col-md-6 align-self-center">
                        <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500">NURSE ACCOUNT</h3>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <ol class="breadcrumb bredneed float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><span style="font-weight: 400;color: #33343f;">Home</span></a></li>
                            <li class="breadcrumb-item"><span style="font-weight: 400">Nurse Account</span></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
    <div class="row" style="margin-bottom: .5rem;">
        <div class="col-md-8 coldashboardbox3" style="margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control searchinputorder" id="txtsearchnurse" placeholder="Search Nurse . . .">
                    </div>
                </div>    
                <div class="col-md-3" style="padding-left: 0px;">        
                    
                </div>
            </div>
        </div>

        <div class="col-md-4 coldashboardbox4">
            <button class="btn float-right btn-primary btnCpayment buttonpayment" onclick="modaladdnurseacc();"><i class="fas fa-plus"></i> Nurse</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <hr class="hrpayment" style="margin-top: 0px;">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <table data-height="350" class="table table-bordered fixTable" style="margin-bottom: 0px;">
                    <thead class="bg-success text-white">
                        <tr>
                            <th style="width: 8%;white-space: nowrap;"> Nurse ID </th>
                            <th style="width: 15%;white-space: nowrap;"> Nurse Name </th>
                            <th style="width: 10%;white-space: nowrap;"> Username </th>
                            <th style="width: 10%;white-space: nowrap;"> Email </th>
                            <th style="width: 7%;white-space: nowrap;"> Phone </th>
                            <th style="width: 7%;white-space: nowrap; text-align: center;"> Option </th>
                        </tr>
                    </thead>
                    <tbody id="tblnurselist"></tbody>
                </table>
            </div>

            <input id="txtnurselistPageCount" type="hidden">
            <ul id="upnurselistPageList" class="pagination float-right"></ul>
        </div>
    </div>
</div>

<?php 
    include("nurseaccount/modal.php"); 
    include("nurseaccount/script.php"); 
?>