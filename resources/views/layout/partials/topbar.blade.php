<!-----header for admin ----->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header" style="padding-bottom: 1px">
            <a class="navbar-brand" href="javascript:void(0)">
                <b>

                </b>
                <span style="">

                </span>
            </a>
        </div>

        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0 ">
                <!-- This is  -->
                <li class="nav-item kailangan" style="display:none;">
                    <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="nav-item kailangan" style="display:none;">
                    <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-arrow-left-circle"></i>
                    </a>
                </li>

                <li class="nav-item dropdown kailangan2" style="padding-left:5px;">
                    <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/cocsslogo22.png" alt="homepage" class="dark-logo imagetopbar" style="width: 120px;"/>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i> <img src="assets/images/ladclothinglogo.jpg" alt="homepage" class="dark-logo" style="width: 100px;"/></a>
                </li> -->
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link text-muted waves-effect waves-dark" href="#" style="font-weight: 400; font-size: 18px; padding-right: 1px;"><span id=""><b>firstname</b></span></a>
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="line-height: 0px; padding-left: 2px; padding-right: 5px;"><i class="fas fa-user-circle text-white" style="font-size: 2rem"></i></a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY" style="width: 270px;">
                        <ul class="dropdown-user">
                            <li><a href="javascript:void(0)" onclick="opensettingmod();" class="settinghover"><i class="ti-settings"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php" class="settinghover"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div id="modalupdateprofileset" class="modal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md"style="max-width: 400px;">
        <div class="modal-content">

            <div class="modal-header" style="background: linear-gradient(to right, #1f87c0 0%, #1f87c0 100%);">
                <h4 style="color: #ffffff !important; font-weight: 400; font-size: 18px; margin-bottom: 0rem">Account Settings</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="cleardata();">×</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="txtsetemail" style="margin-bottom: 0px;">Username</label>
                        <input type="text" class="form-control reqdistitem5" name="txtsetemail" id="txtsetemail" style="height: 40px;">
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="txtsetpassword" style="margin-bottom: 0px;">Password</label>
                        <div class="input-group">
                            <input type="Password" class="form-control reqdistitem5" id="txtsetpassword">
                            <div class="input-group-prepend" style="cursor: pointer;" onclick="fncaddpassattribunHash();" id="inputaddusereye">
                                <span class="input-group-text"><i class="fas fa-eye-slash" id="addusereye"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="padding: 10px 15px;">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn float-right btn-dark" onclick="updateuser2();">Update</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        fncdisplayuserinfo();
    })

    function logoutuser(){
        Swal.fire({
          title: 'Are you sure?',
          text: 'You want to logout your account?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = "logout.php";
          }
        });
    }

    function fncdisplayuserinfo(){
        $.ajax({
            type: 'POST',
            url: 'adminclass.php',
            data: 'form=fncdisplayuserinfo',
            success: function(data){
                var show = data.split('|');
                $('#txtusernametop').text(show[0]);
                $('#txtusernamelogout').text(show[0]);
                $('#txtemailaddlogout').text(show[1]);

                $('#imgusertop').attr('src', show[2]);
                $('#imguserlogout').attr('src', show[2]);
            }
        })
    }
// displaying the change username and pass for admin---------------------------------------------------------------------
    function opensettingmod(){
        $("#modalupdateprofileset").modal('show');

        $.ajax({
            type: 'POST',
            url: 'adminclass.php',
            data: 'form=opensettingmod',
            success: function(data){
                var arr = JSON.parse(data);
                $("#txtsetemail").val(arr[0]);
                $("#txtsetpassword").val(arr[1]);
            }
        });
    }// displaying the change username and pass for admin---------------------------------------------------------------------

// design for confirming update on user---------------------------------------------------------------------
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
    }//for confirming update on user---------------------------------------------------------------------

    function fncaddpassattribHash(){//for unseeing the password----------------------------------------------------------------
        $("#txtsetpassword").attr("type", "password");
        $("#inputaddusereye").attr("onclick", "fncaddpassattribunHash()");
        $("#addusereye").removeClass("fa-eye");
        $("#addusereye").addClass("fa-eye-slash");
    }//for unseeing the password----------------------------------------------------------------

    function fncaddpassattribunHash(){//for seeing the password----------------------------------------------------------------
        $("#txtsetpassword").attr("type", "text");
        $("#inputaddusereye").attr("onclick", "fncaddpassattribHash()");
        $("#addusereye").addClass("fa-eye");
        $("#addusereye").removeClass("fa-eye-slash");
    }//for seeing the password----------------------------------------------------------------

        //for confirming update on user---------------------------------------------------------------------
    function updateuser2(){
        var textsetemail = $("#txtsetemail").val();
        var textsetpassword = $("#txtsetpassword").val();
        if( reqField1( 'reqdistitem5' ) == 1 ){
            $(".preloader").show().css('background','rgba(255,255,255,0.5)');
            $.ajax({
                type: 'POST',
                url: 'adminclass.php',
                data: 'textsetemail=' + textsetemail + '&textsetpassword=' + textsetpassword + '&form=updateuser2',
                success: function(data){
                    setTimeout(function(){
                        $(".preloader").hide().css('background','');
                        $("#modalupdateprofileset").modal('hide');
                        Swal.fire(
                          'Success!',
                          'Successfully Updated Account.',
                          'success'
                        )
                    },1000);
                    setTimeout(function(){
                        window.location.reload();
                    },3000);
                }
            })
        } else{
            alert('Please review your entries. Ensure all required fields are filled out');
        }
    }//for confirming update on user---------------------------------------------------------------------
</script>
