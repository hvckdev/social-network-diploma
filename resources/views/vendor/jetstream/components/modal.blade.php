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
<div
    x-data="{
        show: @entangle($attributes->wire('model')).defer,
    }"
    x-init="() => {
        let el = document.getElementById('modal-id-{{ $id }}')

        $watch('show', value => {
                el.classList.toggle('show')
            }
        });
}
        el.addEventListener('classList.remove', function (event) {
          show = false
        })
    }"
    wire:ignore.self
    tabindex="-1"
    id="modal-id-{{ $id }}"
    aria-labelledby="modal-id-{{ $id }}"
    x-ref="modal-id-{{ $id }}"
    role="dialog"
>
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
