@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="padding: 50px">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Students</h3>
            </div>
            <div class="col-6">
                <a style="float: right" class="btn btn-primary" href="{{ route('admin.student.create') }}">Add Student</a>
            </div>
        </div>
        <div class="card">
            @include('partials.alerts')
            @if (count($students) !== 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Picture</th>
                            <th>Name</th>
                            <th>CNIC</th>
                            <th>Room No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if (empty($student->picture))
                                        <img src="https://ui-avatars.com/api/?name={{ $student->name }}"
                                            class="img-xs rounded-circle" alt="{{ $student->name }}" />
                                    @else
                                        <img src="{{ asset('template/std_img/' . $student->picture) }}"
                                            class="img-xs rounded-circle" alt="{{ $student->name }}" />
                                    @endif
                                </td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->cnic }}</td>
                                <td>{{ $student->room_no }}</td>
                                <td>
                                    <a href="{{ route('admin.student.show', $student) }}" class="btn btn-secondary">Show</a>
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
