<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('header.php'); ?>
    <style type="text/css">
        .auth {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            background-color: #325170;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .auth-container {
            width: 450px;
            min-height: 330px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%) translateX(-50%);
            transform: translateY(-50%) translateX(-50%);
        }

        .card {
            background-color: #fff;
            -webkit-box-shadow: 1px 1px 5px rgb(126 142 159);
            box-shadow: 1px 1px 5px rgb(126 142 159);
            margin-bottom: 10px;
            border-radius: 0;
            border: none;
        }

        .auth-container .auth-header {
            text-align: center;
            border-bottom: 1px solid #000000;
        }
    </style>
</head>

<body>
    <div class="preloader">
      <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>

    <div class="auth">
        <div class="auth-container">
            <h2 class="text-white">Admin Login</h2>
            <div class="card">
                <header class="auth-header">
                    <a href="javascript:void(0)" class="text-center db" style="padding-top: 15px;padding-bottom: 15px;"><img src="assets/images/cocsslogo11.png" alt="Home"width ="45%" height="auto" />
                    </a>  
                </header>
                <div class="card-body cardbodylogin" style="padding: 1.25rem 1.8rem;">
                    <div class="form-horizontal form-material">
                        <div class="form-group mt-3 row" style="margin-bottom: 5px;">
                            <div class="col-md-12">
                                <p class="text-center" style="margin-bottom: 5px; font-weight: 400; font-size: 1rem">SIGN IN TO YOUR ACCOUNT</p>
                            </div>
                        </div>

                        <label class="mt-3" for="username" style="margin-bottom: 0px; font-weight: 500">Username</label>
                        <div class="form-group row">
                            <span class="text-danger"></span>
                            <div class="col-md-11" style="flex: 0 0 98.2%; max-width: 98.2%;">
                                <input type="email" class="form-control underlined" name="txtusername" id="txtusername" placeholder="Enter your username" required style="height: 40px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" style="margin-bottom: 0px; font-weight: 500">Password</label>
                            <span class="text-danger"></span>
                            <div class="row">
                                <div class="col-md-11" style="padding-right: 0px; flex: 0 0 95%; max-width: 95%;">
                                    <input type="password" class="form-control underlined" name="txtpassword" id="txtpassword" placeholder="Enter your password" required style="height: 40px;">
                                </div>
                                <div class="col-md-1" style="padding-left: 0px;padding-right: 0px; flex: 1%; max-width: 1%;">
                                    <i class="fa fa-eye-slash" style="margin-left: -23px; cursor: pointer; font-size: 1.1rem; margin-top: .7rem" id="logineye" onclick="fncloginpassattribunHash()"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-md btn-block text-uppercase waves-effect waves-light" onclick="loginuser();" style="padding: 10px 10px; font-weight: 500">LogIn</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('jscripts.php'); ?>

<script type="text/javascript">

    function loginuser(){
        var txtusername = $("#txtusername").val();
        var txtpassword = $("#txtpassword").val();
        $(".preloader").show().css('background','rgba(255,255,255,0.5)');
        $.ajax({
            type: 'POST',
            url: 'adminclass.php',
            data: 'txtusername='+txtusername+
            '&txtpassword='+txtpassword+
            '&form=loginuser',
            success: function(data){
                setTimeout(function(){
                    $(".preloader").hide().css('background','');
                    if(data == 1){
                        window.location = 'index.php';
                    } else if(data == 3){
                        Swal.fire(
                          'USER INACTIVE',
                          'Your account is currently inactive, Please contact your admin.',
                          'warning'
                        )
                    } else{
                        Swal.fire(
                          'USER NOT FOUND',
                          'You have entered invalid username or password.',
                          'warning'
                        )
                    }
                },1000);
            }
        })
    }

    function fncloginpassattribHash(){
        $("#txtpassword").attr("type", "password");
        $("#logineye").attr("onclick", "fncloginpassattribunHash()");
        $("#logineye").removeClass("fa-eye");
        $("#logineye").addClass("fa-eye-slash");
    }

    function fncloginpassattribunHash(){
        $("#txtpassword").attr("type", "text");
        $("#logineye").attr("onclick", "fncloginpassattribHash()");
        $("#logineye").addClass("fa-eye");
        $("#logineye").removeClass("fa-eye-slash");
    }


</script>