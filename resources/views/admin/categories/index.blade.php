@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    @can('admin.categories.create')
        <a href="{{route('admin.categories.create')}}" class="btn btn-secondary btn-sm float-right">Agregar categoria</a>
    @endcan
    <h1>Lista de categorias</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success" role="alert">
    <strong>{{session('info')}}</strong>
</div>
@endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td scope="row">{{$category->id}}</td>
                        <td scope="row">{{$category->name}}</td>
                        <td scope="row" width="10px" >
                            @can('admin.categories.edit')
                                <a href="{{route('admin.categories.edit', $category)}}" class="btn btn-primary btn-sm">Editar</a>
                            @endcan
                        </td>
                        <td scope="row" width="10px">
                            @can('admin.categories.destroy')
                                <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
