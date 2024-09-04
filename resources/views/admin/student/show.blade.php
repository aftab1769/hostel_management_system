@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="padding: 50px">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Student Info</h3>
            </div>
            <div class="col-6">
                <a style="float: right" class="btn btn-primary" href="{{ route('admin.student') }}">Back</a>
            </div>
        </div>
        <div class="card col-md-12">
            <div class="card-body h-100">
                @include('partials.alerts')
                <div id="picture-section" class="text-center mb-4">
                    @if ($student->picture)
                        <img src="{{ asset('template/std_img/' . $student->picture) }}"
                            alt="Placeholder picture" class="img-fluid rounded-circle mb-2" width="200"
                            height="200" />
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ $student->name }}"
                            alt="Placeholder picture" class="img-fluid rounded-circle mb-2" width="200"
                            height="200" />
                    @endif
                </div>
                <form action="{{ route('admin.student.update', $student) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_no" class="form-label">Room No.</label>
                                <input type="text" class="form-control"
                                    value="{{ old('room_no') ?? $student->room_no }}">

                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rent" class="form-label">Rent</label>
                                <input type="rent" name="rent" id="rent"
                                    class="form-control @error('rent') is-invalid @enderror"
                                    value="{{ old('rent') ?? $student->rent }}" placeholder="Enter the rent">
                                @error('rent')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? $student->name }}" placeholder="Enter your name!">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cnic" class="form-label">CNIC</label>
                                <input type="cnic" name="cnic" id="cnic"
                                    class="form-control @error('cnic') is-invalid @enderror"
                                    value="{{ old('cnic') ?? $student->cnic }}" placeholder="Enter your CNIC!">
                                @error('cnic')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guadian_name" class="form-label">Guardian Name</label>
                                <input type="text" name="guadian_name" id="guadian_name"
                                    class="form-control @error('guadian_name') is-invalid @enderror"
                                    value="{{ old('guadian_name') ?? $student->guadian_name }}"
                                    placeholder="Enter guardian name!">
                                @error('guadian_name')
                                    <div class="teguadian_namext-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="guadian_cnic" class="form-label">Guardian CNIC</label>
                                <input type="guadian_cnic" name="guadian_cnic" id="guadian_cnic"
                                    class="form-control @error('guadian_cnic') is-invalid @enderror"
                                    value="{{ old('guadian_cnic') ?? $student->guadian_cnic }}" placeholder="Enter guardian CNIC!">
                                @error('guadian_cnic')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') ?? $student->email }}" placeholder="Enter your email!">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') ?? $student->phone }}"
                                    placeholder="Enter your mobile number!">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" value="{{ old('date') ?? $student->date }}">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Enter your address" name="address"
                            cols="30" rows="6">{{ old('address') ?? $student->address }}</textarea>
                    </div>
                </form>
                <div>
                    <div class="row">
                        <div class="col-md-1">
                            <form action="{{ route('admin.student.edit', $student) }}">
                                <input type="submit" class="btn btn-primary" value="Edit">
                            </form>
                        </div>
                        <div class="col-md-1">
                            <form style="float: left" action="{{ route('admin.student.destroy', $student) }}"
                                method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
