@extends('plantillas.bases.base1')
@section('content')
    <section>
        <h1>Me aburro, pero he conseguido entender como funciona el routes</h1>
        
        {{Form::open(array('url'=>URL::to('/home/processform'),'id'=>'cosesApreses'))}}
        <div class="input-text">
            <label>Introduce qué es lo que has aprendido</label>
            <input type="text" name="learned" required>
        </div>
        {{Form::close()}}
    </section>
@stop