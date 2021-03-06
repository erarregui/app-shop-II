@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/city.jpg') }}');">
</div>

<div class="main main-raised">
    <div class="container">
        
        <div class="section ">
            <h2 class="title">Registrar nueva categoria</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Imagen de la categoría</label>
                        <input type="file" name="image">
                    </div>
                </div>

                <div class="form-group label-floating">
                        <label class="control-label">Descripcion de la categoria</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description')}}" placeholder="">
                </div>

                <button class="btn btn-primary">Registrar categoria</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
   
            </form>

        </div>

    </div>

</div>

@include('includes.footer') 
@endsection



