@extends('layouts.app')
@section('content')
<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_test";

#Creamos la conexion con la base de datos
$connect = new mysqli ($localhost, $username, $password, $dbname);
?>
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Clientes</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('cliente.create') }}" class="btn btn-info" >Añadir cliente</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Email</th>
               <th>Sexo</th>
               <th>Ocupacion</th>
             </thead>
             <tbody>
              @if($clientes->count())
              @foreach($clientes as $cliente)
              <tr>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->sexo}}</td>
                <?php $query="Select *from ocupacion where id = '1' ";
                      $result = $connect->query($query);
                      while($row = $result->fetch_assoc()){
                  ?>
                <td><?php echo $row['nombre'];
                          
                        }?></td>
                <!--<td>{{$cliente->ocupacion_id}}</td>-->
                <td><a class="btn btn-primary btn-xs" href="{{action('ClienteController@edit', $cliente->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ClienteController@destroy', $cliente->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $clientes->links() }}
    </div>
  </div>
</section>

@endsection
