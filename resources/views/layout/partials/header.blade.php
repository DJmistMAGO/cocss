<div id="kt_header" class="header header-fixed">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div></div>
        <div class="topbar">
            @role('admin')
            @livewire('notification.notification')
            @endrole
            @role('user')
            @livewire('user-notification.user-notification')
            @endrole
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    {{-- <h4 class="">Welcome Admin!</h4> --}}
                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">

                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span
                            class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ auth()->user()->name }}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            @if(auth()->user()->profile_picture == null)
                            <img src="uploads/default.jpg" alt="">
                            @elseif(auth()->user()->profile_picture != null)
                            <img src="{{ asset('uploads/'.auth()->user()->profile_picture) }}" alt="">
                            @endif
                        </span>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <a href="{{ route('user.view', auth()->user()->id) }}">
                        <div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top"
                            style="background-image: url('{{ asset('assets/media/bg/bg-1.jpg') }}')">
                            <div class="d-flex align-items-center mr-2">
                                <div class="symbol bg-white-o-15 mr-3">
                                    @if(auth()->user()->profile_picture == null)
                            <img src="uploads/default.jpg" alt="">
                            @elseif(auth()->user()->profile_picture != null)
                            <img src="{{ asset('uploads/'.auth()->user()->profile_picture) }}" alt="">
                            @endif
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
