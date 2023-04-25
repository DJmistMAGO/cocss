<div class="">

    @forelse ($announcements as $announce)
    @include('livewire.announce.view')
    <a type="button" class="col-md-12 p-0" data-toggle="modal" data-target="#view"
            wire:click="view({{ $announce->id }})">
            <div class="row" style="border-bottom: solid 1px; margin:5px 0px; padding: 10px 0px; ">
                <div class="subject p-0 col-md-8 d-flex align-items-center">
                    <h6 class="mb-0 text-dark text-wrap">{{ $announce->subject }}</h6>
                </div>
                <div class="schedule p-0 col-md-4 d-flex justify-content-center flex-column">
                    <p class="date mb-0 text-right font-weight-bolder text-dark">{{ $announce->date->format('F d, Y') }}
                    </p>
                    <p class="time mb-0 text-right">{{ date('h:i A', strtotime($announce->time)) }}</p>
                </div>
            </div>
        </a>

    @empty
        <div class="row">
            <div class="col-md-12">
                <h6 class="text-center">No Announcement</h6>
            </div>
        </div>
    @endforelse
</div>
