@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('All Students') }}
                    <a href="{{route('students.create')}}" class="btn btn-warning float-end">+Add New </a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-danger bg-danger text-light">{{Session::get('success')}}</div>
                    @endif
                    <table class="table table-responsive table-striped text-center">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Roll</td>
                                <td>Name</td>
                                <td>Class Name</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key=> $student)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$student->roll}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->class_name}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->email}}</td>
                                <td>
                                    <a href="{{route('students.show',$student->id)}}" class="btn btn-success">Show</a>
                                    <a href="{{route('students.edit',$student->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('students.destroy',$student->id)}}" method="POST">
                                    @csrf
                                    @if(Session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session()->get('success')}}
                                    </div>
                                    @endif
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
