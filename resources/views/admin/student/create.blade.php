@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="padding: 50px">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Add Students</h3>
            </div>
            <div class="col-6">
                <a style="float: right" class="btn btn-primary" href="{{ route('admin.student') }}">Back</a>
            </div>
        </div>
        <div class="card col-md-12">
            <div class="card-body h-100">
                @include('partials.alerts')
                <form action="{{ route('admin.student.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="room_no" class="form-label">Room No.</label>
                                <select class="form-control @error('room_no') is-invalid @enderror" id="room_no"
                                    name="room_no">
                                    <option value="">Select a room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->room_no }}" @selected(old('room_id') == $room->id)>
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
                                    class="form-control @error('rent') is-invalid @enderror" value="{{ old('rent') }}" placeholder="Enter the rent">
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
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Enter your name!">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cnic" class="form-label">CNIC</label>
                                <input type="cnic" name="cnic" id="cnic"
                                    class="form-control @error('cnic') is-invalid @enderror" value="{{ old('cnic') }}"
                                    placeholder="Enter your CNIC!">
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
                                    value="{{ old('guadian_name') }}" placeholder="Enter guardian name!">
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
                                    value="{{ old('guadian_cnic') }}" placeholder="Enter guardian CNIC!">
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
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Enter your email!">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
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
                                <label for="picture" class="form-label">Picture</label>
                                <input type="file" name="picture" id="picture"
                                    class="form-control @error('picture') is-invalid @enderror"
                                    value="{{ old('picture') }}" placeholder="Enter your picture!">
                                @error('picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Enter your address" name="address"
                            cols="30" rows="6">{{ old('address') }}</textarea>
                    </div>

                    <div>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
