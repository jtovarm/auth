@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nuevo cliente</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						<form method="POST" action="{{ route('cliente.update',$cliente->id) }}"  role="form">
							{{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="{{$cliente->nombre}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="email" name="email" id="emailcliente" class="form-control input-sm" value="{{$cliente->email}}">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<!--<input type="text" name="sexo" id="sexo" class="form-control input-sm" value="{{$cliente->sexo}}">-->
										<select class="form-control input-sm" name="sexo">
											<option value="Masculino">Masculino</option>
											<option value="Femenino">Femenino</option>
										</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<!--<input type="text" name="ocupacion_id" id="ocupacion_id" class="form-control input-sm" value="{{$cliente->ocupacion_id}}">-->
										<select class="form-control input-sm" name="ocupacion_id">
											<option value="1">Interno</option>
											<option value="2">Externo</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Actualizar" class="btn btn-success btn-block">
									<a href="{{ route('cliente.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
