@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="row mb-4 mt-3">
            <div class="col-md-6">
                <h3>Menu</h3>
            </div>
            <div class="col-md-6">
                <a href="{{ route('admin.menu.create') }}" class="btn btn-primary" style="float: right">Add Menu</a>
            </div>
        </div>
        <div class="card">
            @include('partials.alerts')
            @if (count($menus) !== 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Days</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menu->day }}</td>
                                <td>{{ $menu->breakfast }}</td>
                                <td>{{ $menu->lunch }}</td>
                                <td>{{ $menu->dinner }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="{{ route('admin.menu.edit', $menu) }}" class="btn btn-warning mr-3"><i class="mdi mdi-pencil"> </i></a>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="{{ route('admin.menu.destroy', $menu) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"><i class="mdi mdi-delete"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-success">No Record Found!</div>
            @endif
        </div>
    </div>
@endsection
