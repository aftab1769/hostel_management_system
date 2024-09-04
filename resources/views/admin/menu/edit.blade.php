@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper" style="padding: 50px">
        <div class="row mb-3">
            <div class="col-6">
                <h3>Edit Menu</h3>
            </div>
            <div class="col-6">
                <a style="float: right" class="btn btn-primary" href="{{ route('admin.menu') }}">Back</a>
            </div>
        </div>
        <div class="card col-md-12">
            <div class="card-body h-100">
                @include('partials.alerts')
                <form action="{{ route('admin.menu.edit', $menu) }}" method="post">
                    @method("PATCH")
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="day" class="form-label">Day</label>
                                <input type="text" name="day" id="day"
                                    class="form-control @error('day') is-invalid @enderror" value="{{ old('day') ?? $menu->day }}"
                                    placeholder="Enter your day!">
                                @error('day')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="breakfast" class="form-label">Breakfast</label>
                                <input type="breakfast" name="breakfast" id="breakfast"
                                    class="form-control @error('breakfast') is-invalid @enderror" value="{{ old('breakfast') ?? $menu->breakfast }}"
                                    placeholder="Enter your breakfast!">
                                @error('breakfast')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lunch" class="form-label">Lunch</label>
                                <input type="text" name="lunch" id="lunch"
                                    class="form-control @error('lunch') is-invalid @enderror"
                                    value="{{ old('lunch') ?? $menu->lunch }}" placeholder="Enter guardian name!">
                                @error('lunch')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dinner" class="form-label">Dinner</label>
                                <input type="dinner" name="dinner" id="dinner"
                                    class="form-control @error('dinner') is-invalid @enderror"
                                    value="{{ old('dinner') ?? $menu->dinner }}" placeholder="Enter guardian CNIC!">
                                @error('dinner')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
