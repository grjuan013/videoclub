@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col">
        <img src="{{$pelicula['poster']}}" style="height:400px;float:right;" />
    </div>
    <div class="col-sm-8">

        <br><h1>{{$pelicula->title}}</h1>
        <h4>Año: {{$pelicula->year}}</h4>
        <h4>Director: {{$pelicula->director}}</h4>
        <br>
        <h5><strong>Resumen: </strong>{{$pelicula->synopsis}}</h5>
        <br>
        <h5><strong>Estado:</strong>
            @if ($pelicula->rented)
            Película actualmente alquilada
            @else
            Película disponible
            @endif
        </h5>
        <br>
        <div class="d-grid gap-2 d-md-block">
            @if ($pelicula->rented)
            <form action="/catalog/return/{{$pelicula->id}}"
                method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="display:inline">
                    Devolver película
                </button>
            </form>
            @else
            <form action="/catalog/rent/{{$pelicula->id}}"
                method="POST" style="display:inline">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="display:inline">
                    Alquilar película
                </button>
            </form>
            @endif
            <form action="/catalog/delete/{{$pelicula->id}}"
                method="POST" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button onclick="return confirm('¿Está seguro?')" type="submit" class="btn btn-danger" style="display:inline">
                    Borrar película
                </button>
            </form>
            <a href="{{ url('/catalog/edit/' . $pelicula->id ) }}" class="btn btn-warning" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Editar película</a>
            <a href="{{ url('/catalog' ) }}" class="btn btn-light" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver al listado</a>
        </div>
    </div>
</div>
@stop
