@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Class') }}
                    <a href="{{route('class.create')}}" class="btn btn-warning float-end">+Add New </a>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-danger bg-danger text-light">{{Session::get('success')}}</div>
                    @endif
                    <table class="table table-responsive table-striped text-center">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Class Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $key=> $class)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$class->class_name}}</td>
                                <td>
                                    <a href="{{route('class.edit',$class->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('class.delete',$class->id)}} " class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $classes->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
