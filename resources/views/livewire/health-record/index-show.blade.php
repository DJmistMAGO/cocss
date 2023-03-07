<div class="container-fluid containerfluidneed" style="padding: 20px 20px;">
    <style type="text/css">
        .Iclass {
            font-size: 1.3rem;
            cursor: pointer;
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

        .pagination li:first-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination li:last-child {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }

        ul.pagination li:hover {
            background-color: #3a4651;
            color: white !important;
        }

        .pagination .active {
            background-color: #3a4651;
            color: white !important;
        }

        .table thead th,
        .table th {
            background-color: #33343f !important;
        }

        .BCardShadow:hover {
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.20);
        }

        .webkitlala2 {
            overflow: hidden;
            height: 41px;
            /*line-height: 17px;*/
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            -o-text-overflow: ellipsis;
            text-overflow: ellipsis;
        }

        .swal2-icon {
            margin-bottom: 10px !important;
        }
    </style>

    <div class="row">
        @include('livewire.book-appointment.create-modal')
        @include('livewire.book-appointment.edit-modal')
        @include('livewire.book-appointment.view-modal')
        <div class="col-12">
            <div class="card" style="margin-bottom: 0px;">
                <div class="card-body" style="padding-top: 1rem; padding-bottom: .9rem;">
                    <div class="row page-titles" style="padding-bottom: 0px;">
                        <div class="col-md-6 align-self-center">
                            <h3 class="text-themecolor mb-0 mt-0" style="font-weight: 500" data-toggle="modal" data-target="#create">Health Record</h3>
                        </div>
                        {{-- <div class="col-md-6 d-flex justify-content-end">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                                    Book an Appointment
                                </button>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid"
        style="padding: 15px 15px; background-color: white; min-height: 540px; margin-top: 15px;">
        <div class="row" style="margin-bottom: .5rem;">
            <div class="col-md-8" style="margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-6 colsearchorders">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text searchinputorder"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control searchinputorder" id="txtsearchappointment"
                                placeholder="Search . . .">
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-left: 0px;">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr class="hrpayment" style="margin-top: 0px;">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-3" style="overflow: auto;">

                    <table data-height="350" class="table table-bordered fixTable table-hover"
                        style="margin-bottom: 0px;">
                        <thead class="bg-success text-white">
                            <tr>
                                <th style="width: 5%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Date </th>
                                <th style="width: 20%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Time </th>
                                <th style="width: 10%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Reason </th>
                                <th style="width: 10%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                        Status </th>
                                <th style="width: 10%; white-space: nowrap; background-color: rgb(51, 52, 63); position: relative; top: 0px;">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblappointmentlist">
                            <tr style="cursor:pointer;">
                            <td style="white-space: nowrap;">test</td>
                            <td style="white-space: nowrap;">test</td>
                            <td style="white-space: nowrap;">test</td>
                            <td style="white-space: nowrap;">test</td>
                            <td style="white-space: nowrap;">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#view">View</button>
                            {{-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button> --}}
                        </td>
            </tr>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $(function() {
        $(".fixTable").tableHeadFixer();

        $("#txtappointmentlistPageCount").val("1");
        $("#txtsearchappointment").keyup(function(e) {
            if ($('#txtsearchappointment').val() == "") {
                $("#txtappointmentlistPageCount").val("1");
                displayappointmentlist();
            } else {
                $("#txtappointmentlistPageCount").val("1");
                displayappointmentlist();
            }
        });
        displayappointmentlist();
    });


    function displayappointmentlist() {
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtappointmentlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'forapproval/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displayappointmentlist',
            success: function(data) {
                $("#tblappointmentlist").html(data);
                loadappointmentlistPagination();
            }
        })
    }

    function loadappointmentlistPagination() {
        var srchprod = $("#txtsearchappointment").val();
        var page = $("#txtappointmentlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'forapproval/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadappointmentlistPagination',
            success: function(data) {
                var arr = data.split("|");
                if (arr[1] != 1) {
                    $("#upappointmentlistPageList").html(arr[0]);
                } else {
                    $("#upappointmentlistPageList").html("");
                }
            }
        })
    }

    function appointmentlistPageFunc(page, pagenums) {
        $(".pgnumappointmentlistPageFunc").removeClass("active");
        $("#pgappointmentlistPageFunc" + pagenums).addClass("active");
        $("#txtappointmentlistPageCount").val(page);
        displayappointmentlist();
    }

    function approveappointment(ID) {
        $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'forapproval/class.php',
            data: 'ID=' + ID + '&form=approveappointment',
            success: function(data) {
                setTimeout(function() {
                    $(".preloader").hide().css('background', '');
                    Swal.fire(
                        'Approved!',
                        'Appointment successfully approved.',
                        'success'
                    )
                    displayappointmentlist();
                }, 1500);
            }
        })
    }

    function disapproveappointment(ID) {
        $(".preloader").show().css('background', 'rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'forapproval/class.php',
            data: 'ID=' + ID + '&form=disapproveappointment',
            success: function(data) {
                setTimeout(function() {
                    $(".preloader").hide().css('background', '');
                    Swal.fire(
                        'Disapproved!',
                        'Appointment successfully disapproved.',
                        'success'
                    )
                    displayappointmentlist();
                }, 1500);
            }
        })
    }

    function opencheckupdetmodal(date, time) {
        $("#mdlcheckupdet").modal('show');
        $("#txtcheckupdate").text(date);
        $("#txtcheckuptime").text(time);
    }

    function openhealthmeddetmodal(healthissue, recommendation) {
        $("#mdlhealthmeddet").modal('show');
        $("#txtviewhealthissue").text(healthissue);
        $("#txtviewrecommendation").text(recommendation);
    }
</script>
