<div class="content">
    <div class="card">
        <x-alert />
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
</div>

<div class="d-flex justify-content-center">
    {{ $links ?? '' }}
</div>
