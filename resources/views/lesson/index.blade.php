@extends('layouts.app')
@section('content')
    <section>
        <h1>Y esta es la vista de todas las Lecciones {{$user->name}}!</h1>
        @if($user->isRole('Root'))
        <h2>Esta es la lista de los roles del usuario {{$user->name}}:</h2>
        <ul>
            @foreach($user->roles as $role)
            <li>
                Rol: {{$role->title}}
            </li>
            @endforeach
        </ul>
        @endif
    </section>
        @foreach($lessons as $pos => $lesson)
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{url('/lesson/'.$lesson->id)}}"><strong class="title-panel">{{$pos + 1}}- {{$lesson->title}}</strong></a>
                    @if($lesson->user)
                    <span class="user-panel">Aportada por: {{$lesson->user->name}}</span>
                    @endif
                </div>
                <div class="panel-body">
                    <p>{{$lesson->content}}</p>
                    <h3>Puntuación: 
                    @for($i=0; $i<$lesson->evaluation; $i++)
                        <icon class="glyphicon glyphicon-star-empty"></icon>
                    @endfor
                    <span class="score">{{$lesson->evaluation}}</span>
                    </h3>
                    @if($lesson->user_id == $user->id)
                    <a href="{{ url('/lesson/edit/$lesson->id')}}" class="edit-lesson"><icon class="fa fa-pencil-square-o"></icon>Editar Lección</a>
                    @endif
                </div>
            </div>
        </div>
        @if($pos%2 == 1)
            <div class="clearfix"></div>
        @endif
        @endforeach()
    
@stop