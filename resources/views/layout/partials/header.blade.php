<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div></div>
        <div class="topbar">
            <div class="dropdown mr-6">

                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false">
                    <div class="btn btn-primary font-weight-bold">
                        <span class="svg-icon svg-icon-xl mr-0 svg-icon-light">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <path
                                        d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                                        fill="#000000" />
                                    <rect fill="#000000" opacity="0.3" x="10" y="16" width="4"
                                        height="4" rx="2" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> 10
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg"
                    style="">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex flex-column pt-5 bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url(assets/media/misc/bg-1.jpg)">
                            <!--begin::Tabs-->
                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link show active" data-toggle="tab"
                                        href="#topbar_notifications_notifications">Approval</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab"
                                        href="#topbar_notifications_events">Appointment</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
                                </li> --}}
                            </ul>
                            <!--end::Tabs-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="tab-content">
                            <!--begin::Tabpane-->
                            <div class="tab-pane show  active" id="topbar_notifications_notifications" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4 ps" data-scroll="true" data-height="300"
                                    data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="
                                                flaticon2-bell-1 text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">User sent approval</div>
                                                <div class="text-muted">23 hrs ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                            <!--begin::Tabpane-->
                            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="navi navi-hover scroll my-4 ps" data-scroll="true" data-height="300"
                                    data-mobile-height="200" style="height: 300px; overflow: hidden;">
                                    <!--begin::Item-->
                                    <a href="#" class="navi-item">
                                        <div class="navi-link">
                                            <div class="navi-icon mr-2">
                                                <i class="
                                                flaticon2-bell-1 text-success"></i>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">New report has been received</div>
                                                <div class="text-muted">23 hrs ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <!--end::Item-->
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                            <!--begin::Tabpane-->
                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                <!--begin::Nav-->
                                <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                    <br>No new notifications.
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Tabpane-->
                        </div>
                        <!--end::Content-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    {{-- <h4 class="">Welcome Admin!</h4> --}}
                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">

                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span
                            class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ auth()->user()->name }}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            <span
                                class="symbol-label font-size-h5 font-weight-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </span>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <a href="{{ route('user.view', auth()->user()->id) }}">
                        <div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url('{{ asset('assets/media/bg/bg-1.jpg') }}')">
                            <div class="d-flex align-items-center mr-2">
                                <div class="symbol bg-white-o-15 mr-3">
                                    <span
                                        class="symbol-label text-success font-weight-bold font-size-h4">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                </div>
                                <div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{ auth()->user()->name }}
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="navi navi-spacer-x-0 pt-5">
                        <div class="navi-footer px-8 py-5">
                            <form method="get" action="{{ route('auth.logout') }}">
                                @csrf
                                <a href="#" target="_blank" class="btn btn-light-danger font-weight-bold"
                                    onclick="event.preventDefault();this.closest('form').submit();">Sign Out</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
