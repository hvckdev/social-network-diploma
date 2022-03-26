<div class="card">
    <div class="card-title">{{ $name }}</div>
    <div class="card-body">
        <table class="table table-hover table-borderless">
            <thead>
            <tr>
                {{ $head }}
            </tr>
            </thead>
            <tbody>
            {{ $body }}
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $links ?? '' }}
</div>
