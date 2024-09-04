@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="padding: 50px">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Edit Student</h3>
            </div>
            <div class="col-6">
                <a style="float: right" class="btn btn-primary" href="{{ route('admin.student.show', $student) }}">Back</a>
            </div>
        </div>
        <div class="card col-md-12">
            <div class="card-body h-100">
                @include('partials.alerts')
                <div class="text-center">
                    <div id="picture-section">
                        @if ($student->picture)
                            <img src="{{ asset('template/std_img/' . $student->picture) }}" alt="Placeholder picture"
                                class="img-fluid rounded-circle mb-2" width="200" height="200" />
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ $student->name }}" alt="Placeholder picture"
                                class="img-fluid rounded-circle mb-2" width="200" height="200" />
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="{{ route('admin.student.picture', $student) }}" method="POST"
                                class="row g-3 mb-5" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="col-8">
                                    <input type="file" id="picture" name="picture"
                                        class="form-control @error('picture') is-invalid @enderror">
                                    @error('picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-2 p-2">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.student.update', $student) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_no" class="form-label">Room No.</label>
                                <select class="form-control @error('room_no') is-invalid @enderror" id="room_no"
                                    name="room_no">
                                    <option value="">Select a room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->room_no }}" @selected(old('room_no') == $room->room_no)>
                                            {{ $room->room_no }}</option>
                                    @endforeach
                                </select>

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
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date') ?? $student->date }}">
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
                    <div>
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
