@extends('layouts.app')
@section('content')
    <section>
        <div class="col-md-6">
            <h1>Aquí es donde se crean las Lecciones</h1>    
        </div>
        <div class="col-md-12">
            <form action="{{url('lesson/create')}}" class="form-inline" method="post">
                {{ csrf_field() }}
                <input type="hidden" value="{{Auth::user()->id}}" name="user">
                <div class="col-md-4 form-group">
                    <label for="title">Título de la Lección</label><br>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Pon el texto aquí"><br><br>
                    <label for="evaluation">Quan útil ha sido la Lección del 1 al 10?</label><br>
                    <input type="number" min="1" max="10" id="evaluation" name="evaluation" class="form-control" placeholder="5">
                </div>
                <div class="col-md-6 form-group">
                    <label for="content">Contenido de la Lección</label><br>
                    <textarea rows="5" cols="40" id="content" name="content" class="form-control" placeholder="Pon el texto aquí"></textarea>
                </div>
                <div class="col-md-12 form-group">
                    <input type="submit" value="Envia">    
                </div>
                
            </form>
        </div>
        
    </section>
@stop