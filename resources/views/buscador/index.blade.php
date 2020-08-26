@extends('layout.app')
@section('content')
<div class="card shadow">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Numero de resultados la búsqueda:  {{count($nombre)}}</h4>
                    @php
                      $index = 1      
                    @endphp
                    <div class="table-responsive m-t-40">
                        <table id="table" class="display nowrap table table-hover table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Ruta</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($nombre as $item)
                                <tr>
                                    <td>{{$index}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->tipo}}</td>
                                    <td><a href="{{url("{$item->ruta}")}}">{{$item->ruta}}</a></td>
                                  
                                    @php
                                      $index++;  
                                    @endphp
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

