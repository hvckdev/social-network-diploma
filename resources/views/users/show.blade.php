<x-app-layout>
    <div class="content">
        <div class="row row-cols-2">
            <div class="col-sm card">
                <p class="float-right text-muted">{{ $user->information->visited_at->diffForHumans() }}</p>
                <div class="card-title">{{ $user->name }}</div>
                <div class="card-body">
                    <p>
                        <img src="{{ $user->profile_photo_url }}" alt=""
                             class="w-lg-quarter shadow-sm rounded img-fluid">
                    </p>
                </div>
                @can('update', $user)
                    <div class="card-footer">
                        <button class="btn w-full">Edit</button>
                    </div>
                @endcan
            </div>
            <div class="col-sm card">
                <div class="card-title">Information</div>
                <div class="card-body">
                    <p>
                        <span class="small text-muted">Full name</span><br>
                        {{ $user->full_name }}
                    </p>
                    <p>
                        <span class="small text-muted">Group</span><br>
                        <a href="#">soon</a></p>
                    <div class="text-center mt-20">
                        <button class="btn btn-sm" onclick="halfmoon.toggleModal('modal-6')">Show full</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <div class="modal" id="modal-6" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Full information</h5>
                    <p>
                        <span class="small text-muted">Birthday</span><br>
                        {{ $user->information->show_birthday }}
                    </p>
                    <p>
                        <span class="small text-muted">Country</span><br>
                        {{ $user->information->show_contry }}
                    </p>
                    <p>
                        <span class="small text-muted">City</span><br>
                        {{ $user->information->show_city ? $user->information->city : 'Hidden' }}
                    </p>
                    <p>
                        <span class="small text-muted">Website</span><br>
                        <a href="{{ $user->information->show_website ?? '#' }}">
                            {{ $user->information->website ?? 'Empty :(' }}
                        </a>
                    </p>
                    <div class="text-right mt-20">
                        <!-- text-right = text-align: right, mt-20 = margin-top: 2rem (20px) -->
                        <button class="btn mr-5" data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush
</x-app-layout>
