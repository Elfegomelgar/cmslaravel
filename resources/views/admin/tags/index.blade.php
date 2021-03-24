@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <a href="{{ route('admin.tags.create', ) }}" class="btn btn-secondary btn-sm float-right">Nueva etiqueta</a>

    <h1>Mostrar listado de etiqueta</h1>
@stop

@section('content')
    @if(session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td scope="row">{{$tag->id}}</td>
                            <td scope="row">{{$tag->name}}</td>
                            <td scope="row" width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag)}}">Editar</a>
                            </td>
                            <td scope="row" width="10px">
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


