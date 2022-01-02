<x-app-layout>
    <div class="content">
        <div class="row row-cols-2">
            <div class="col-sm card">
                <div class="card-body">
                    <img src="{{ $user->profile_photo_url }}" alt="" class="img-fluid rounded-top">
                </div>
            </div>
            <div class="col-sm card">
                <div class="card-title">{{ $user->name }}</div>
                <div class="card-body">
                    <p>Full name: {{ $user->full_name }}</p>
                    <p>Group: <a href="#">soon</a></p>
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
                    <p>Country: {{ $user->information[0]->country }}</p>
                    <p>City: {{ $user->information[0]->city }}</p>
                    <p>Website: <a href="{{ $user->information[0]->website }}">{{ $user->information[0]->website }}</a></p>
                    <div class="text-right mt-20">
                        <!-- text-right = text-align: right, mt-20 = margin-top: 2rem (20px) -->
                        <button class="btn mr-5" data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush
</x-app-layout>
