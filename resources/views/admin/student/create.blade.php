@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Student') }}
                    <a href="{{route('students.index')}} " class="btn btn-warning float-end"> All Class </a>
                </div>
                <div class="card-body">
                    {{-- form start --}}
                    <form action="{{route('stodents.store')}} " method="POST" enctype="">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                          </div>
                        @endif
                        <div class="form-group">
                            <label for="my-input">Class Name</label>
                            <input id="my-input" class="form-control  @error('class_name') is-invalid @enderror" type="text" name="class_name" value="{{ old('class_name') }}" placeholder="Enter Class Name" required>
                            @error('class_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <button class="btn btn-success mt-2" type="submit">Submit</button>
                    </form>
                    {{-- form end --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
