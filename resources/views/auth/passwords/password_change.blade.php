@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center text-danger h3">{{ __('Change Your Password') }}</div>
                <div class="card-body">
                    <form action="{{route('password.update')}}" method="POST">
                        @csrf
                        {{-- for Session success --}}
                        @if(Session()->has('success'))
                        <strong class="text-success">{{Session()->get('success')}} </strong>
                        @endif

                        {{-- for Session error --}}
                        @if(Session()->has('error'))
                        <strong class="text-danger">{{Session()->has('error')}} </strong>
                        @endif

                        <div class="form-group">
                            <label for="my-input">Current Password</label>
                            <input id="my-input" class="form-control" type="password" name="current_password"  placeholder="Enter Your Current Password" required value={{old('current_password')}}>
                        </div>
                        <div class="form-group">
                            <label for="my-input">New Password</label>
                            <input id="my-input" class="form-control   @error('password') is-invalid @enderror " type="password" name="password" placeholder="New Password" required>
                            @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="my-input">Confirm Password</label>
                            <input id="my-input" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        <button type="submit" class=" btn btn-success">Change Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
