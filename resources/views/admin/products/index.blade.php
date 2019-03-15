@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
      
        <div class="section text-center">
            <h2 class="title">Listado de productos</h2>

            @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>

            @endif

            <div class="team">
                <div class="row">
                    <a href="{{ url('/admin/products/create')}}" class="btn btn-primary btn-round">Nuevo producto</a>
                   <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripcion</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category ? $product->category->name : 'General' }}</td>
                                <td class="text-right">&euro; {{ $product->price }}</td>
                                <td class="td-actions text-right">
                                    <form method="post" action="{{ url('/admin/products/'.$product->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                         <a href="#" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                         <a href="{{ url('/admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imagenes del Producto" class="btn btn-warning btn-simple btn-xs">
                                            <i class="fa fa-image"></i>
                                        </a>   
                                        <button type="submit" id="12" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                    <!-- <a href="#" class="btn-danger">Eliminar</a> -->
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>

        </div>


        
    </div>

</div>
<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body" id="Titulo">
        {{ session('notification') }}
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-primary btn-info btn-round" data-dismiss="modal">ACEPTAR</button>
        <button type="button" id="btn1" class="btn btn-info btn-simple">Save</button>
      </div>
    </div>
  </div>
</div>
@section('script')
<script src="{{ asset('js/script.js')}}"></script>
@endsection
@include('includes.footer') 
@endsection



