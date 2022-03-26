@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Student') }}
                    <a href="{{route('students.index')}} " class="btn btn-warning float-end"> All Student </a>
                </div>
                <div class="card-body">
                    {{-- form start --}}
                    <form action="{{route('students.update',$student->id)}} " method="POST" enctype="">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                          </div>
                        @endif
                        <div class="form-group">
                            <label for="my-input">Student Roll</label>
                            <input id="my-input" class="form-control" type="text"  name="roll" value="{{ $student->roll }}">
                            @error('roll')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>
                        <div class="form-group">
                            <label for="my-input">Class Name</label>
                            <select class="form-control"  name="class_id" id="">
                                @foreach ($classes as $item)
                                <option value="{{$item->id}}" @if($item->id == $student->class_id) selected @endif >{{$item->class_name}} </option>
                                @endforeach
                            </select>
                            @error('class_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label for="my-input">Student Name</label>
                        <input id="my-input" class="form-control" type="text"  name="name" value="{{ $student->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label for="my-input">Student Phone</label>
                        <input id="my-input" class="form-control" type="text"  name="phone"  value="{{ $student->phone }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                    <div class="form-group">
                        <label for="my-input">Student Email</label>
                        <input id="my-input" class="form-control" type="text"  name="email" value="{{ $student->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
                    </div>
                        <button class="btn btn-success mt-2" type="submit">Update</button>
                    </form>
                    {{-- form end --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
