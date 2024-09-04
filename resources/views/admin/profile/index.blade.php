@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="card col-md-8 mx-auto">
                    <div class="card-header">
                        <h4 class="card-title mt-3 mb-0 text-center" style="opacity: 0.8">Profile Picture</h4>
                    </div>
                    @include('partials.alerts')
                    <div class="card-body text-center mb-2">
                        @if (Auth::user()->picture)
                            <img src="{{ asset('template/photos/' . $user->picture) }}" class="img-fluid rounded-circle mb-2" width="158" height="158" />
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Placeholder picture"
                                class="img-fluid rounded-circle mb-2" width="158" height="158" />
                        @endif

                        <div>
                            <form action="{{ route('admin.profile.picture') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("PATCH")
                                <div class="mb-3">
                                    <input type="file" name="picture" id="picture"
                                        class="form-control @error('picture') is-invalid @enderror">
                                    @error('picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="submit" value="Update Picture" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card col-md-12 mt-3 p-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body h-100">
                        <form action="{{ route('admin.profile.details') }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}"
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
                                            class="form-control @error('cnic') is-invalid @enderror" value="{{ Auth::user()->cnic }}"
                                            placeholder="Enter your CNIC!">
                                        @error('cnic')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <input type="submit" value="Update Details" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                    <div class="card-header">
                        <h5 class="card-title mb-0">Password</h5>
                    </div>
                    <div class="card-body h-100">
                        <form action="{{ route('admin.profile.password') }}" method="post">
                            @csrf
                            @method("PATCH")
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Enter your password!">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Confirm your password!">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            placeholder="Enter your current password!">
                                        @error('current_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5">
                                <input type="submit" value="Update Password" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
