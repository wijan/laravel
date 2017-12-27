@extends('layouts.app')
@section('content')
    <section>
        <div class="col-md-6">
            <h1>Aquí es donde se ven las Lecciones</h1>    
        </div>
        Esta es la lección {{$lesson->id}} y la id pasada es la {{$id}}
        <div class="col-md-10 col-md-offset-2">
            <h2 class="lessonTitle">{{$lesson->title}}</h2>
            <p>Contenido:</p>
            <p class="col-md-6 lessonContent">{{$lesson->content}}</p>
            <div class="clearfix"></div>
            <a href="{{url('/lesson/edit/'.$lesson->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Editar Lección</a>
        </div>
        <div class="clearfix"></div>
        <a class="btn btn-info" href="{{url('lesson/index')}}"><i class="fa fa-angle-left"></i> Atrás</a>
        
        
    </section>
@stop