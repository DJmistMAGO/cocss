<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li id="maindashboard">
                    <a href="index.php?url=dashboard"><i class="fas fa-home"></i>
                        <span class="hide-menu">&nbsp;&nbsp;Dashboard</span>
                    </a>
                </li>

                <li id="mainnurses">
                    <a href="index.php?url=nurseaccount"><i class="fas fa-user-md"></i>
                        <span class="hide-menu">&nbsp;&nbsp;Nurses</span>
                    </a>
                </li>

                <li id="mainpatients">
                    <a href="index.php?url=patientaccount"><i class="fas fa-user"></i>
                        <span class="hide-menu">&nbsp;&nbsp;Patients</span>
                    </a>
                </li>

                <li id="mainappointmenthis">
                    <a href="index.php?url=appointmenthistory"><i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu">&nbsp;&nbsp;Appointment History</span>
                    </a>
                </li>

                <li id="mainnursesession">
                    <a href="index.php?url=nursesession"><i class="fas fa-list"></i>
                        <span class="hide-menu">&nbsp;&nbsp;Nurse Session Logs</span>
                    </a>
                </li>

                <li id="mainusersession">
                    <a href="index.php?url=patientsession"><i class="fas fa-list"></i>
                        <span class="hide-menu">&nbsp;&nbsp;Patient Session Logs</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
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