@extends('adminlte::page')

@section('title', 'Admin Panel')

@section('content_header')
    <h1>Crear un post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}
                {!! Form::hidden("user_id", auth()->user()->id) !!}
                <div class="form-group">
                    {!! Form::label("name", "Nombre") !!}
                    {!! Form::text("name", null, ['class'=> 'form-control', 'placeholder' => 'Ingrese el nombre del Post']) !!}
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label("slug", "Slug") !!}
                    {!! Form::text("slug", null, ['class'=> 'form-control', 'placeholder' => 'Ingrese el slug del post', 'readonly']) !!}
                    @error('slug')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label("category_id", "Categoria") !!}
                    {!! Form::select("category_id", $categories, null, ['class' => 'form-control']) !!}
                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox("tags[]", $tag->id, false) !!}
                            {{$tag->name}}
                        </label>
                    @endforeach
                    @error('tags')
                        <br>
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>
                    <label>
                        {!! Form::radio("status", 1, true) !!}
                        Borrador
                        {!! Form::radio("status", 2) !!}
                        Publicado
                    </label>
                    @error('status')
                        <br>
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            <img id="picture" src="https://cdn.pixabay.com/photo/2021/01/21/09/11/river-5936684_960_720.jpg" alt="">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label("file", "Imagen que se mostrara en el Post") !!}
                            {!! Form::file("file", ['class'=>'form-control-file', 'accept' => 'image/*']) !!}
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex quo nostrum, tempore explicabo laborum dolorem esse tempora</p>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label("extract", "Extracto", ) !!}
                    {!! Form::textarea("extract", null, ["class"=>"form-control"]) !!}
                    @error('extract')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label("body", "Cuerpo del post", ) !!}
                    {!! Form::textarea("body", null, ["class"=>"form-control"]) !!}
                    @error('body')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                {!! Form::submit("Crear Post", ["class" => "btn btn-primary"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;

        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection