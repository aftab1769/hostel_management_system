@session('success')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
</div>
@endsession

@session('failure')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('failure') }}
</div>
@endsession