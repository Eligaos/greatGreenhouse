@extends('app')

@section('customStyles')

@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
			<section class="content">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Tipos de Leituras</h2></div>
					@if( Session::get('message'))
					<div class="text-center">
						<span class="alert alert-info"> {{ Session::get('message') }}</span>
					</div>
					@endif
					@if(count($lista)!=0)						
					<div class="table-container">
						<table class="table table-filter table-striped table-bordered table-responsive">	
							<tr class="success">
								<th>Parâmetro</th>
								<th>Unidade</th>
							</tr>	
							<tbody>		
								@foreach($lista as $key => $tipoLeitura)
								<tr>									
									<td>		
										<span>{{$tipoLeitura->parametro}}</span>
									</td>
									<td>
										<span>{{$tipoLeitura->unidade}}</span>
									</td>
								</tr>											
								@endforeach
							</tbody>
						</table>									
					</div>
					@else
					<div class="text-center" >
						<h4> Não existem Tipos de Leitura adicionados</h4>
					</div>
					@endif
					<div class="form-group">
						<div class="input-group-addon">
							<a href="/admin/tipos-leituras/adicionar" role="button" class="btn btn-success center-block pull-left">Adicionar novo Tipo de Leitura</a>
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