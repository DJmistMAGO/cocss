<!-----header for admin ----->
<header class="topbar" style="background-color: #800000 !important;">
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
                    <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                        href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="nav-item kailangan" style="display:none;">
                    <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                        href="javascript:void(0)">
                        <i class="icon-arrow-left-circle"></i>
                    </a>
                </li>

                <li class="nav-item dropdown kailangan2" style="padding-left:5px;">
                    <a href="" class=""><h3 class="text-light ml-3">SORSU-BC CLINIC</h3></a>
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link text-muted waves-effect waves-dark" href="#"
                        style="font-weight: 400; font-size: 18px; padding-right: 1px;"><span
                            id=""><b>{{ auth()->user()->name}}</b></span></a>
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="line-height: 0px; padding-left: 2px; padding-right: 5px;"><i
                            class="fas fa-user-circle text-white" style="font-size: 2rem"></i></a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY" style="width: 270px;">
                        <ul class="dropdown-user">
                            <li><a href="javascript:void(0)" onclick="opensettingmod();" class="settinghover"><i
                                        class="ti-settings"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form method="get" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <a href="#" target="_blank" class="settinghover"
                                        onclick="event.preventDefault();this.closest('form').submit();"><i
                                            class="fa fa-power-off"></i> Logout</a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>


<script type="text/javascript">

    function fncaddpassattribHash() { //for unseeing the password----------------------------------------------------------------
        $("#txtsetpassword").attr("type", "password");
        $("#inputaddusereye").attr("onclick", "fncaddpassattribunHash()");
        $("#addusereye").removeClass("fa-eye");
        $("#addusereye").addClass("fa-eye-slash");
    } //for unseeing the password----------------------------------------------------------------

    function fncaddpassattribunHash() { //for seeing the password----------------------------------------------------------------
        $("#txtsetpassword").attr("type", "text");
        $("#inputaddusereye").attr("onclick", "fncaddpassattribHash()");
        $("#addusereye").addClass("fa-eye");
        $("#addusereye").removeClass("fa-eye-slash");
    } //for seeing the password----------------------------------------------------------------

</script>
