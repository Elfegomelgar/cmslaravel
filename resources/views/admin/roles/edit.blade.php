@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Editar rol</h1>
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
        <div class="cardbody">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT']) !!}
                @include('admin.roles.partials.form')
                {!! Form::submit('Actualizar role', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
