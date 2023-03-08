<aside class="left-sidebar" style="width: 247px !important;">
    <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <a href="{{route('dashboard')}}"><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Dashboard</span>
                        </a>
                    </li>
                    @role('user')
                    <li>
                        <a href="{{route('bookAppointment.index')}}"><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Book Appointment</span>
                        </a>
                    </li>
                    @endrole
                    @role('user')
                    <li>
                        <a href="{{route('healthRecord.index')}}"><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Health Records</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href="{{route('approval.index')}}"><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;For Approval</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href="{{route('appointment.index')}}"><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Appointment</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href=""><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Apppointment History</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href=""><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Medicine Inventory</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href=""><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Forcasting</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href=""><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Student List</span>
                        </a>
                    </li>
                    @endrole
                    @role('admin')
                    <li>
                        <a href=""><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Forcasting</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <!-- End Bottom points-->
    </aside>

    <style type="text/css">
    .user-profile .profile-img{
        width: 100px !important;
        margin: 0 auto !important;
        border-radius: 0px !important;
    }
    </style>

    <script type="text/javascript">
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
    </script>
