<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('template/custom.css') }}">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth bg">
                    <div class="card col-lg-4 mx-auto  bg-black">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Register</h3>
                            @include('partials.alerts')
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group" style="margin: 25px 0px">
                                    <label>Name</label>
                                    <input class="form-control p_input @error('cnic') is-invalid @enderror"
                                        type="text" name="name" placeholder="Enter your name"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin: 25px 0px">
                                    <label>CNIC</label>
                                    <input class="form-control p_input @error('cnic') is-invalid @enderror"
                                        type="text" name="cnic" placeholder="Enter your CNIC"
                                        value="{{ old('cnic') }}" />
                                    @error('cnic')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 30px">
                                    <label>Password</label>
                                    <input class="form-control p_input @error('password') is-invalid @enderror"
                                        type="password" name="password" placeholder="Enter your password" />
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group" style="margin-bottom: 30px">
                                    <label class="form-label" for="password" for="password_confirmation"> Confirm
                                        Password</label>
                                    <input class="form-control p_input  @error('password') is-invalid @enderror"
                                        id="password_confirmation" type="password" name="password_confirmation"
                                        placeholder="Set confirm password" />
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary btn-block enter-btn"
                                        style="padding: 12px" value="Register">
                                </div>
                                <p class="sign-up text-center">Already have an Account? <a
                                        href="{{ route('login') }}">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
