<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtpatientlistPageCount").val("1");
        $("#txtsearchpatient").keyup(function(e){
            if($('#txtsearchpatient').val() == ""){
                $("#txtpatientlistPageCount").val("1");
                displaypatientlist();
            } else{
                $("#txtpatientlistPageCount").val("1");
                displaypatientlist();
            }
        });
        displaypatientlist();

        $(".contactnum").inputmask("+63 999-999-9999");
    });

    function fncaddpassattribHash(){
        $("#txtaddpatientpass").attr("type", "password");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribunHash()");
        $("#addusereye2").removeClass("fa-eye");
        $("#addusereye2").addClass("fa-eye-slash");
    }

    function fncaddpassattribunHash(){
        $("#txtaddpatientpass").attr("type", "text");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribHash()");
        $("#addusereye2").addClass("fa-eye");
        $("#addusereye2").removeClass("fa-eye-slash");
    }

    function reqField1 ( classN ){
        var isValid = 1;
        $('.'+classN).each(function(){
            if( $(this).val() == '' ){
                $(this).css('border','1px #a94442 solid');
                $(this).addClass('lala');
                isValid = 0;
            } else {
                $(this).css('border','');
                $(this).removeClass('lala');
            }
        });

        return isValid;
    }

    function displaypatientlist(){
        var srchprod = $("#txtsearchpatient").val();
        var page = $("#txtpatientlistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'patientaccount/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displaypatientlist' ,
            success: function(data) {
                $("#tblpatientlist").html(data);
                loadpatientlistPagination();
            }
        })
    }

    function loadpatientlistPagination() {
        var srchprod = $("#txtsearchpatient").val();
        var page = $("#txtpatientlistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'patientaccount/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadpatientlistPagination',
            success: function(data){
                var arr = data.split("|");
                if(arr[1] != 1){
                    $("#uppatientlistPageList").html(arr[0]);
                } else{
                    $("#uppatientlistPageList").html("");
                }
            }
        })
    }

    function patientlistPageFunc(page, pagenums) {
        $(".pgnumpatientlistPageFunc").removeClass("active");
        $("#pgpatientlistPageFunc" + pagenums).addClass("active");
        $("#txtpatientlistPageCount").val(page);
        displaypatientlist();
    }

    function modaladdpatient(){
        $("#modaladdpatient").modal('show');
        $('#txtopenuseraccheader').text("Add Patient Account");
        $(".btnuseraccSAVE").removeClass("hide");
        $(".btnuseraccUPDATE").addClass("hide");
    }

    function addpatientacc(){
        var textaddpatientFname = $("#txtaddpatientFname").val();
        var textaddpatientMname = $("#txtaddpatientMname").val();
        var textaddpatientLname = $("#txtaddpatientLname").val();
        var textaddpatientEmail = $("#txtaddpatientEmail").val();
        var textaddpatientContactNum = $("#txtaddpatientContactNum").val();
        var textaddpatientUsername = $("#txtaddpatientUsername").val();
        var textaddpatientpass = $("#txtaddpatientpass").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'patientaccount/class.php',
                data: 'textaddpatientFname=' + textaddpatientFname + '&textaddpatientMname=' + textaddpatientMname + '&textaddpatientLname=' + textaddpatientLname + '&textaddpatientEmail=' + textaddpatientEmail + '&textaddpatientContactNum=' + encodeURIComponent(textaddpatientContactNum) + '&textaddpatientUsername=' + textaddpatientUsername + '&textaddpatientpass=' + textaddpatientpass + '&form=addpatientacc',
                success: function(data){
                    $("#modaladdpatient").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        Swal.fire(
                          'Success!',
                          'Patient account successfully added.',
                          'success'
                        )
                        displaypatientlist();
                        clearpatient();
                    },2000);
                }
            });    
        } else{
            Swal.fire(
              'ALERT',
              'Please review your entries. Ensure all required fields are filled out',
              'warning'
            )
        }
    }

    function clearpatient(){
        $(".clearinfo").css('border','');
        $(".clearinfo").val("");
    }

    function modaleditpatient(userID){
        $("#modaladdpatient").modal('show');
        $('#txtopenuseraccheader').text("Edit Patient Account");
        $(".btnuseraccSAVE").addClass("hide");
        $(".btnuseraccUPDATE").removeClass("hide");

        $.ajax({
            type: 'POST',
            url: 'patientaccount/class.php',
            data: 'userID=' + userID + '&form=modaleditpatient',
            success: function(data){
                var show = data.split("|");
                $('#txtpatientID').val(userID);
                $("#txtaddpatientFname").val(show[0]);
                $("#txtaddpatientMname").val(show[1]);
                $("#txtaddpatientLname").val(show[2]);
                $("#txtaddpatientEmail").val(show[5]);
                $("#txtaddpatientContactNum").val(show[6]);
                $("#txtaddpatientUsername").val(show[3]);
                $("#txtaddpatientpass").val(show[4]);
            }
        }); 
    }

    function editpatient(){
        var textpatientID = $("#txtpatientID").val();
        var textaddpatientFname = $("#txtaddpatientFname").val();
        var textaddpatientMname = $("#txtaddpatientMname").val();
        var textaddpatientLname = $("#txtaddpatientLname").val();
        var textaddpatientEmail = $("#txtaddpatientEmail").val();
        var textaddpatientContactNum = $("#txtaddpatientContactNum").val();
        var textaddpatientUsername = $("#txtaddpatientUsername").val();
        var textaddpatientpass = $("#txtaddpatientpass").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'patientaccount/class.php',
                data: 'textpatientID=' + textpatientID + '&textaddpatientFname=' + textaddpatientFname + '&textaddpatientMname=' + textaddpatientMname + '&textaddpatientLname=' + textaddpatientLname + '&textaddpatientEmail=' + textaddpatientEmail + '&textaddpatientContactNum=' + encodeURIComponent(textaddpatientContactNum) + '&textaddpatientUsername=' + textaddpatientUsername + '&textaddpatientpass=' + textaddpatientpass + '&form=editpatient',
                success: function(data){
                    $("#modaladdpatient").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        Swal.fire(
                          'Success!',
                          'Patient account successfully updated.',
                          'success'
                        )
                        displaypatientlist();
                        clearpatient();
                    },2000);
                }
            });    
        } else{
            Swal.fire(
              'ALERT',
              'Please review your entries. Ensure all required fields are filled out',
              'warning'
            )
        }
    }

    function deletepatient(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.value) {
                $(".preloader").show().css('background','rgba(255,255,255,0.5)');
                $.ajax({
                    type: 'POST',
                    url: 'patientaccount/class.php',
                    data: 'id=' + id + '&form=deletepatient',
                    success: function(data){
                        setTimeout(function(){
                        $(".preloader").hide().css('background','');
                            Swal.fire(
                              'Success!',
                              'Patient account successfully deleted.',
                              'success'
                            )
                            displaypatientlist();
                        },1000);
                    }
                })
            }
        })
    }
</script>