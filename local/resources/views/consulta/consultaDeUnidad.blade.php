@extends('plantilla.plantilla')
<link rel="stylesheet" href="<?php echo URL::asset('css/consulta.css') ?>" type="text/css">
@section('content')
<h1 id="tema">BIENES DE LA UNIDAD DE: {!!$nombre!!}</h1>
{!! Form::open(array('url' => 'consultaDeUnidad', 'method'=>'post')) !!}
<select name= "ubicacionSeleccionada" id="combobox">
	<option selected="selected" value="default">--Seleccione una Ubicación--</option>
	@foreach($ubicaciones as $ubicacion)
	<option value="{!!$ubicacion->ubicacion_pk!!}">{!!$ubicacion->ubicacion !!}</option>
	@endforeach
</select>
{!! Form::submit('Filtrar', ['class' => 'btnFiltrar']) !!}
{!! Form::close() !!}
<section id="consultas">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<th class="encabezado">ID</th>
				<th class="encabezado">IDENTIFICACIÓN</th>
				<th class="encabezado">BIEN PRINCIPAL</th>
				<th class="encabezado">DESCRIPCIÓN</th>
				<th class="encabezado">MARCA</th>
				<th class="encbezado">MODELO</th>
				<th class="encabezado">SERIE</th>
				<th class="encabezado">UBICACIÓN</th>
				<th class="encabezado">UNIDAD</th>
				<th class="encabezado">VALOR</th>
				<th class="encabezado">ESTADO</th>
			</thead>
			<tbody>
				@foreach($bien as $bienes)
				<tr class="text-center">
					<td> {{ $bienes->bien_pk }} </td>
					<td> {{ $bienes->identificacion_fk }} </td>
					<td> {{ $bienes->bien_principal_fk  }}  </td>
					<td> {{ $bienes->descripcion_equipo  }}  </td>
					<td> {{ $bienes->nombre_marca }} </td>
					<td> {{ $bienes->modelo  }}  </td>
					<td> {{ $bienes->serie  }}  </td>
					<td> {{ $bienes->ubicacion  }}  </td>
					<td> {{ $bienes->nombre_unidad  }}  </td>
					<td> {{ $bienes->valor_adquisicion  }}  </td>
					<td> {{ $bienes->estado_fk  }}  </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! $bien->render() !!}
	</div>
</section>
@endsection