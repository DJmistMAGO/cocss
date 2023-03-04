<script type="text/javascript">
    $(function(){
        $(".fixTable").tableHeadFixer();

        $("#txtnurselistPageCount").val("1");
        $("#txtsearchnurse").keyup(function(e){
            if($('#txtsearchnurse').val() == ""){
                $("#txtnurselistPageCount").val("1");
                displaynurselist();
            } else{
                $("#txtnurselistPageCount").val("1");
                displaynurselist();
            }
        });
        displaynurselist();

        $(".contactnum").inputmask("+63 999-999-9999");
    });

    function fncaddpassattribHash(){
        $("#txtadduserpass").attr("type", "password");
        $("#inputaddusereye2").attr("onclick", "fncaddpassattribunHash()");
        $("#addusereye2").removeClass("fa-eye");
        $("#addusereye2").addClass("fa-eye-slash");
    }

    function fncaddpassattribunHash(){
        $("#txtadduserpass").attr("type", "text");
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

    function displaynurselist(){
        var srchprod = $("#txtsearchnurse").val();
        var page = $("#txtnurselistPageCount").val();
        $.ajax ({
            type: 'POST',
            url: 'nurseaccount/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=displaynurselist' ,
            success: function(data) {
                $("#tblnurselist").html(data);
                loadnurselistPagination();
            }
        })
    }

    function loadnurselistPagination() {
        var srchprod = $("#txtsearchnurse").val();
        var page = $("#txtnurselistPageCount").val();
        $.ajax({
            type: 'POST',
            url: 'nurseaccount/class.php',
            data: 'srchprod=' + srchprod + '&page=' + page + '&form=loadnurselistPagination',
            success: function(data){
                var arr = data.split("|");
                if(arr[1] != 1){
                    $("#upnurselistPageList").html(arr[0]);
                } else{
                    $("#upnurselistPageList").html("");
                }
            }
        })
    }

    function nurselistPageFunc(page, pagenums) {
        $(".pgnumnurselistPageFunc").removeClass("active");
        $("#pgnurselistPageFunc" + pagenums).addClass("active");
        $("#txtnurselistPageCount").val(page);
        displaynurselist();
    }

    function modaladdnurseacc(){
        $("#modaladdnurse").modal('show');
        $('#txtopenuseraccheader').text("Add Nurse Account");
        $(".btnuseraccSAVE").removeClass("hide");
        $(".btnuseraccUPDATE").addClass("hide");
    }

    function addnurseracc(){
        var textaddnurseFname = $("#txtaddnurseFname").val();
        var textaddnurseMname = $("#txtaddnurseMname").val();
        var textaddnurseLname = $("#txtaddnurseLname").val();
        var textaddnurseEmail = $("#txtaddnurseEmail").val();
        var textaddnurseContactNum = $("#txtaddnurseContactNum").val();
        var textaddnurseUsername = $("#txtaddnurseUsername").val();
        var textadduserpass = $("#txtadduserpass").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'nurseaccount/class.php',
                data: 'textaddnurseFname=' + textaddnurseFname + '&textaddnurseMname=' + textaddnurseMname + '&textaddnurseLname=' + textaddnurseLname + '&textaddnurseEmail=' + textaddnurseEmail + '&textaddnurseContactNum=' + encodeURIComponent(textaddnurseContactNum) + '&textaddnurseUsername=' + textaddnurseUsername + '&textadduserpass=' + textadduserpass + '&form=addnurseracc',
                success: function(data){
                    $("#modaladdnurse").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        Swal.fire(
                          'Success!',
                          'Nurse account successfully added.',
                          'success'
                        )
                        displaynurselist();
                        clearnurse();
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

    function clearnurse(){
        $(".clearinfo").css('border','');
        $(".clearinfo").val("");
    }

    function modaleditnurse(userID){
        $("#modaladdnurse").modal('show');
        $('#txtopenuseraccheader').text("Edit Nurse Account");
        $(".btnuseraccSAVE").addClass("hide");
        $(".btnuseraccUPDATE").removeClass("hide");

        $.ajax({
            type: 'POST',
            url: 'nurseaccount/class.php',
            data: 'userID=' + userID + '&form=modaleditnurse',
            success: function(data){
                var show = data.split("|");
                $('#txtnurseID').val(userID);
                $("#txtaddnurseFname").val(show[0]);
                $("#txtaddnurseMname").val(show[1]);
                $("#txtaddnurseLname").val(show[2]);
                $("#txtaddnurseEmail").val(show[5]);
                $("#txtaddnurseContactNum").val(show[6]);
                $("#txtaddnurseUsername").val(show[3]);
                $("#txtadduserpass").val(show[4]);
            }
        }); 
    }

    function editnurse(){
        var textnurseID = $("#txtnurseID").val();
        var textaddnurseFname = $("#txtaddnurseFname").val();
        var textaddnurseMname = $("#txtaddnurseMname").val();
        var textaddnurseLname = $("#txtaddnurseLname").val();
        var textaddnurseEmail = $("#txtaddnurseEmail").val();
        var textaddnurseContactNum = $("#txtaddnurseContactNum").val();
        var textaddnurseUsername = $("#txtaddnurseUsername").val();
        var textadduserpass = $("#txtadduserpass").val();

        if( reqField1( 'reqresinfo' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'nurseaccount/class.php',
                data: 'textnurseID=' + textnurseID + '&textaddnurseFname=' + textaddnurseFname + '&textaddnurseMname=' + textaddnurseMname + '&textaddnurseLname=' + textaddnurseLname + '&textaddnurseEmail=' + textaddnurseEmail + '&textaddnurseContactNum=' + encodeURIComponent(textaddnurseContactNum) + '&textaddnurseUsername=' + textaddnurseUsername + '&textadduserpass=' + textadduserpass + '&form=editnurse',
                success: function(data){
                    $("#modaladdnurse").modal('hide');
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');

                        Swal.fire(
                          'Success!',
                          'Nurse account successfully updated.',
                          'success'
                        )
                        displaynurselist();
                        clearnurse();
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

    function deletenurse(id){
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
                    url: 'nurseaccount/class.php',
                    data: 'id=' + id + '&form=deletenurse',
                    success: function(data){
                        setTimeout(function(){
                        $(".preloader").hide().css('background','');
                            Swal.fire(
                              'Success!',
                              'Nurse account successfully deleted.',
                              'success'
                            )
                            displaynurselist();
                        },1000);
                    }
                })
            }
        })
    }
</script>