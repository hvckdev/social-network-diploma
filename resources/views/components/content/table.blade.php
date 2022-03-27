<div class="card">
    <div class="card-title">{{ $name }}</div>
    <div class="card-body">
        <div class="table-responsive">
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
