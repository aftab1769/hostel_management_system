@extends('layout.main')

@section('title', 'Dashboard')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
@section('content')
    <div class="content-wrapper" style="padding: 50px">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Rooms</h3>
            </div>
            <div class="col-6">
                <button style="float: right" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal" onclick="clearAddModal()">
                    Add Room
                </button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="alert"></div>
                <div id="response"></div>
                <div class="table-responsive">
                    {{-- <table class="table">
                        <thead>
                            <tr>
                                <th>Room No</th>
                                <th>Room Seater</th>
                                <th>Room Status</th>
                                <th>Rules and Regulations</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>3 Seater</td>
                                <td>Avaliable</td>
                                <td>No smoking in room</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal"><i class="mdi mdi-pencil"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"><i class="mdi mdi-delete"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}
                    
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals')

    <script>
        const ID = @json(Auth::id());
        const showAllRoute = @json(route('api.admin.rooms', Auth::id()));
        const addRoute = @json(route('api.admin.room.create'));
        const showSingleRoute = @json(route('api.admin.room.show', ':id'));
        const updateRoute = @json(route('api.admin.room.update', ':id'));
        const destroyRoute = @json(route('api.admin.room.destroy', ':id'));

    </script>

    <script src="{{ asset('template/jscustom/custom.js') }}"></script>

@endsection
