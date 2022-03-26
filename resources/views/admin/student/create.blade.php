@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Student') }}
                    <a href="{{route('students.index')}} " class="btn btn-warning float-end"> All Students </a>
                </div>
                <div class="card-body">
                    {{-- form start --}}
                    <form action="{{route('students.store')}} " method="POST" enctype="">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                          </div>
                        @endif
                        <div class="form-group">
                            <label for="my-input">Class Name</label>
                            <select class="form-control @error('roll') is-invalid @enderror"  value="{{ old('class_name') }}" name="class_id" id="" required>
                                @foreach ($classes as $item)
                                <option value="{{$item->id}} ">{{$item->class_name}} </option>
                                @endforeach
                            </select>

                            @error('class_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="my-input">Roll</label>
                            <input  type="text" id="my-input" class="form-control @error('roll') is-invalid @enderror" value="{{ old('class_name') }}" name="roll" placeholder="Enter Student Roll" required>

                            @error('roll')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="my-input">Name <span class="text-danger">*</span></label>
                            <input  type="tel" id="my-input" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Enter Student Name" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="my-input">Phone</label>
                            <input  type="text" id="my-input" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="Enter Student Phone" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="my-input">Email</label>
                            <input  type="email" id="my-input" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Enter Student Email" required>
                            @error('email')
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
