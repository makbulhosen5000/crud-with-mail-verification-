@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __(' Students Details') }}
                    <a href="{{route('students.index')}}" class="btn btn-warning float-end">All Students </a>
                </div>
                <div class="card-body">
                    <ul class="list">
                        <li>Roll: {{$showStudent->roll}} </li>
                        <li>Name: {{$showStudent->name}} </li>
                        <li>Class Name:{{$showStudent->class_id}} </li>
                        <li>Phone: {{$showStudent->phone}} </li>
                        <li>Email: {{$showStudent->email}} </li>
                    </ul>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
