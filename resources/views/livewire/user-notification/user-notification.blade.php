<div class="dropdown">
    <!--begin::Toggle-->
    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px" aria-expanded="false">
        <div class="btn btn-icon btn-dropdown btn-lg mr-3 pr-2  pulse-primary text-white" style="background-color: #8b0000">
            <span class="svg-icon svg-icon-xl mr-0 svg-icon-light">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <path
                            d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z"
                            fill="#000000" />
                        <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4"
                            rx="2" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span> {{ $countApprove }}
            <span class="pulse-ring"></span>
        </div>
    </div>
    <!--end::Toggle-->
    <!--begin::Dropdown-->
    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg" style="">
        <form>
            <!--begin::Header-->
            <div class="d-flex flex-column pt-8 bgi-size-cover bgi-no-repeat rounded-top"
                style="background-image: url(assets/media/misc/bg-1.jpg)">
                <!--begin::Title-->
                <h4 class="d-flex flex-center rounded-top">
                    <span class="text-white">User Notifications</span>
                </h4>
                <!--end::Title-->
                <!--begin::Tabs-->
                <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                    role="tablist">
                    {{-- <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab"
                            href="#topbar_notifications_notifications">Approval {{ $countBook }}</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab"
                            href="#topbar_notifications_events">Appointment {{ $countApprove }}</a>
                    </li>
                </ul>
                <!--end::Tabs-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="tab-content">

                <!--begin::Tabpane-->
                <div class="tab-pane active show " id="topbar_notifications_events" role="tabpanel">
                    <!--begin::Nav-->
                    <div class="navi navi-hover scroll my-4 ps" data-scroll="true" data-height="300"
                        data-mobile-height="200" style="height: 300px; overflow: hidden;">
                        @forelse ($appointment as $app)
                                <!--begin::Item-->
                                <a href="{{ route('bookAppointment.index') }}" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-user flaticon2-line- text-success"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">Your appointment has been approved on
                                                {{ $app->appointment_date->format('F d, Y') }} at
                                                {{ $app->appointment_time->format('h:i a') }}</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->

                        @empty
                            <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                <br>No new notifications.
                            </div>
                        @endforelse

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
            </div>
            <!--end::Content-->
        </form>
    </div>
    <!--end::Dropdown-->
</div>
