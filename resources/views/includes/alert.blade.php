@if($alert_success = session('alert_success'))
    <div class="mt-3 container">
        <div class="alert alert-success mb-0 py-2 text-center rounded-0" role="alert">
            {{ $alert_success }}
        </div>
    </div>
@endif

@if($alert_danger = session('alert_danger'))
    <div class="mt-3 container">
        <div class="alert alert-danger mb-0 py-2 text-center rounded-0" role="alert">
            {{ $alert_danger }}
        </div>
    </div>
@endif

@if($alert_warning = session('alert_warning'))
    <div class="mt-3 container">
        <div class="alert alert-warning mb-0 py-2 text-center rounded-0" role="alert">
            {{ $alert_warning }}
        </div>
    </div>
@endif
