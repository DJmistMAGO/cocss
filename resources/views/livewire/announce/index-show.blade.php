<div style="overflow-y: scroll; height: 359px;">
    @forelse ($announcements as $announce)
    <div class="card-body pt-0 pb-2">
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-1 bg-light-danger rounded p-5">

            <!--begin::Title-->
            <div class="d-flex flex-column flex-grow-1 mr-2">
                <p class="font-weight-bolder h6 text-dark text-hover-primary font-size-lg mb-1">{{ $announce->subject }}</p>
                <span class="text-dark ">{{ $announce->date->format('F d, Y') }} | {{ date('h:i A', strtotime($announce->time)) }}</span>
                <span class="text-dark ">What: {{ $announce->what }}</span>
                <span class="text-dark ">Where: {{ $announce->where }}</span>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Item-->
    </div>
            {{-- <div class="row" style="border-bottom: solid 1px; margin:5px 0px; padding: 10px 0px; ">
                <div class="col-mf-12">
                    <h6 class="text-dark"><b>{{ $announce->subject }}</b></h6>
                    <p class="mb-1 text-dark">{{ $announce->date->format('F d, Y') }} | {{ date('h:i A', strtotime($announce->time)) }}</p>
                    <p class="mb-0 text-dark"><b>What</b> {{ $announce->what }}</p>
                    <p class="mb-0 text-dark"><b>Where:</b> {{ $announce->where }}</p>
                </div>
            </div> --}}
    @empty
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center">No Announcement</h6>
            </div>
        </div>
    @endforelse
</div>



