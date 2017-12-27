@extends('layouts.app')
@section('content')
    <h1>Bienvenido al Administrador {{$user->name}}</h1>
    <ul>
    @foreach($users as $pos => $user_list)
        <li>{{$user_list->id}} -> {{$user_list->name}} -> 
        @foreach($user_list->roles as $pos => $rol)
            {{$rol->title}} 
        @endforeach<br>
        </li>
        <a href="{{ route('addrole', ['user_id' => $user_list->id]) }}"><i class="fa fa-add"></i>Añadir Roles {{$user_list->name}}</a>
    @endforeach    
    </ul>
    
@stop