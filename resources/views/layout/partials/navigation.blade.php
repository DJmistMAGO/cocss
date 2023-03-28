<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto" id="kt_brand">
        <a href="{{-- route('admin-dashboard') --}}" class="brand-logo text-center">
            <h2 class="text-white text-center">SSU-BC CLINIC</h2>
        </a>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{ !request()->routeIs('dashboard')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('dashboard') }}" class="menu-link">
                        <i class="menu-icon flaticon2-shelter"></i>
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                @role('user')
                <li class="menu-item {{ !request()->routeIs('bookAppointment.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('bookAppointment.index') }}" class="menu-link">
                        <i class="menu-icon far fa-calendar-alt"></i>
                        <span class="menu-text text-nowrap">Book Appointment</span>
                    </a>
                </li>
                @endrole

                @role('user')
                <li class="menu-item {{ !request()->routeIs('healthRecord.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('healthRecord.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-book-medical"></i>
                        <span class="menu-text text-nowrap">Health Record</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('approval.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('approval.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-clipboard-list"></i>
                        <span class="menu-text text-nowrap">Approval</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('appointment.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('appointment.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-first-aid"></i>
                        <span class="menu-text text-nowrap">Appointment</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('appointhistory.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('appointhistory.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-book-medical"></i>
                        <span class="menu-text text-nowrap">Appointment History</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('med.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('med.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-capsules"></i>
                        <span class="menu-text text-nowrap">Medicine Inventory</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('announcement.index')?:'menu-item-active' }} "
                    aria-haspopup="true">
                    <a href="{{ route('announcement.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-bullhorn"></i>
                        <span class="menu-text text-nowrap">Announcement</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('forecasting.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('forecasting.index') }}" class="menu-link">
                        <i class="menu-icon fas fa-chart-bar"></i>
                        <span class="menu-text text-nowrap">Forecasting</span>
                    </a>
                </li>
                @endrole

                @role('admin')
                <li class="menu-item {{ !request()->routeIs('users.index')?:'menu-item-active' }}"
                    aria-haspopup="true">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <i class="menu-icon far fa-user"></i>
                        <span class="menu-text text-nowrap">User's List</span>
                    </a>
                </li>
                @endrole
            </ul>
        </div>
    </div>
</div>
