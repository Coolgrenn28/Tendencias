{{-- ALERTAS DEL SISTEMA --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle"></i> Error:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if(session('successMsg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-check-circle"></i> Éxito:</strong>
        {{ session('successMsg') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if(session('errorMsg'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-times-circle"></i> Error:</strong>
        {{ session('errorMsg') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif