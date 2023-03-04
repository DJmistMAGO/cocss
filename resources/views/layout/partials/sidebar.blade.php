<aside class="left-sidebar">
    <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li id="maindashboard">
                        <a href="index.php?url=dashboard"><i class="fas fa-home"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Dashboard</span>
                        </a>
                    </li>

                    <li id="mainappointmenthis">
                        <a href="index.php?url=forapproval"><i class="fas fa-clipboard-check"></i>
                            <span class="hide-menu">&nbsp;&nbsp;For Approval</span>
                        </a>
                    </li>

                    <li id="mainappointmenthis">
                        <a href="index.php?url=appointment"><i class="far fa-calendar-alt"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Appointment</span>
                        </a>
                    </li>

                    <li id="mainappointmenthis">
                        <a href="index.php?url=appointmenthistory"><i class="fas fa-clipboard-list"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Appointment History</span>
                        </a>
                    </li>

                    <li id="mainpatients">
                        <a href="index.php?url=patientaccount"><i class="fas fa-user"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Patients</span>
                        </a>
                    </li>

                    <li id="mainusersession">
                        <a href="index.php?url=patientsession"><i class="fas fa-list"></i>
                            <span class="hide-menu">&nbsp;&nbsp;Patient Session Logs</span>
                        </a>
                    </li>
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
