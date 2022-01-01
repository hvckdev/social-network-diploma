@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
    </div>
    <div class="modal-body">
        {{ $content }}
    </div>
    <div class="modal-footer">
        {{ $footer }}
    </div>
</x-jet-modal>
