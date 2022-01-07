@props(['id', 'maxWidth'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $maxWidth = [
        'sm' => ' modal-sm',
        'md' => '',
        'lg' => ' modal-lg',
        'xl' => ' modal-xl',
    ][$maxWidth ?? 'md'];
@endphp
<!-- Modal -->
@push('modals')
<div class="modal"
    x-data="{
        show: @entangle($attributes->wire('model')).defer,
    }"
    x-init="() => {
        let el = document.querySelector('#modal-id-{{ $id }}')

        $watch('show', value => {
            if (value) {
            console.log('modal opened')
                halfmoon.toggleModal('#modal-id-{{ $id }}')
            } else {
                halfmoon.toggleModal('#modal-id-{{ $id }}')
            }
        });

        el.addEventListener('toggleModal', function (event) {
            console.log('modal opened')
          show = false
        })
    }"
    wire:ignore.self
    tabindex="-1"
    id="modal-id-{{ $id }}"
    x-ref="modal-id-{{ $id }}"
    role="dialog">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $slot }}
        </div>
    </div>
</div>
@endpush
