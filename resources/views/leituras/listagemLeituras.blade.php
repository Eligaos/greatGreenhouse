@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Lista de Leituras')

@section('content')
<div class="container">
	<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
		<section class="content">
			<div class="panel panel-default">
				<div class="panel-heading"><h1>Lista de Leituras</h1></div>
				<form class="form-signin" method="POST" action="/admin/home">
					<div class="table-container">
						<tbody>
							<form class="form-signin">
								<div class="table-container">
									<table class="table table-filter table-striped table-bordered table-responsive">							 <tr class="success">
										<th>Data</th>
										<th>Valor</th>
										<th>Unidade</th>
										<th>Tipo</th>
										<th>Sensor</th>
										<th>Estufa</th>
										<th>Setor</th>
										<th>Automático?</th>
									</tr>	
									<tbody>		
										@foreach($lista as $key => $leitura)
										<tr>										<td>

											{{$leitura->data}}

										</td>
										<td>		
											{{$leitura->valor}}

										</td>
										<td>		
											{{$leitura->unidade}}

										</td>
										<td>		
											{{$leitura->parametro}}

										</td>
										<td>		
											{{$leitura->sensor_nome}}

										</td>	
										<td>		
											{{$leitura->estufa_nome}}

										</td>
										<td>		
											{{$leitura->setor_nome}}

										</td>
										<td>
											@if($leitura->manual == 0)
											Sim
											@else
											Manual
											@endif
										</td>


									</tr>													
									@endforeach
								</tbody>
							</table>									
						</div>
					</form> 
					<div class="form-group">

						<div class="input-group-addon" >

							<a  href="/admin/leituras/adicionarRegistoManual" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Registar Leitura Manual" >Registar Leitura Manual</a>

							<div class="pull-right"> {!! $lista->links() !!}</div>
						</div>
					</div>		
				</div>
			</div>
		</section>
	</div>
</div>
</div>
</div>
@endsection

@section('customScripts')

@endsection