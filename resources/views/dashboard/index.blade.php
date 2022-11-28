@extends('layout')

@section('content')
<div class="wrapper bg-white">
@if (Session::get('notAllowed'))
            <div class="alert alert-danger w-75">
                {{Session::get('notAllowed')}}</div>
                @endif
                
 @if (Session::get('successAdd'))
        <div class="alert alert-success">
             {{Session::get('successAdd')}}</div>
        @endif

 @if (Session::get('successUpdate'))
        <div class="alert alert-success">
             {{Session::get('successUpdate')}}
            </div>
        @endif

    <div class="d-flex align-items-start justify-content-between">
        <div class="d-flex flex-column">
            <div class="h5">My Todo's</div>
            <p class="text-muted text-justify">
                Here's a list of activities you have to do
            </p>
            <br>
            <span>
                <a href="{{route('todo.create')}}" class="text-success">Create</a> 
                 <p href="{{route('todo.complated')}}">Complated</p>
            </span>
        </div>
        <div class="info btn ml-md-4 ml-0">
            <span class="fas fa-info" title="Info"></span>
        </div>
    </div>
    <div class="work border-bottom pt-3">
        <div class="d-flex align-items-center py-2 mt-1">
            <div>
                <span class="text-muted fas fa-comment btn"></span>
            </div>
            <div class="text-muted">2 todos</div>
            <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
        </div>

        </div>
        <div id="comments" class="mt-1">
        @foreach ($todos as $todo)
        <div class="comment d-flex align-items-start justify-content-between">
            <div class="mr-2">
                <label class="option">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="d-flex flex-column w-75">
                <a href="/todo/edit/{{ $todo['id'] }}" class="text-justify text-dark">
                    {{$todo['titel'] }}
                </a>
                <p class="text-muted">{{ $todo['status'] ? 'Complated' : 'On-Progress' }} <span class="date"> {{\Carbon\Carbon::parse($todo['date'])->format('j F, Y')}}</span></p>
            </div>
            <div class="ml-auto">
            <i class="fa-solid fa-trash"></i>
                <span class="fas fa-arrow-right btn"></span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection