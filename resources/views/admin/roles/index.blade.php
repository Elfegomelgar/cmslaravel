@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-secondary btn-sm float-right">Nuevo Role</a>
    <h1>Lista de roles</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session('info')}}</strong>
        </div>

        <script>
        $(".alert").alert();
        </script>
    @endIf
    <div class="card">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td scope="row">{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-primary">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop


