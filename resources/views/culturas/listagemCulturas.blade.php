@extends('app')

@section('customStyles')
<link href="{{asset('css/listagemEstufas.css')}}" rel="stylesheet">
@endsection
@section('title', ' - Lista de Culturas')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h2>Lista de Culturas</h2></div>
						@if( Session::get('message'))
						<div style="text-align: center">
							<span class="alert alert-info"> {{ Session::get('message') }}</span>
						</div>
						@endif
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered table-responsive">
								<tr>
									<th>Nome da Cultura</th>
									<th>Nome do Setor</th>
									<th>Nome da Estufa</th>
								</tr>
								<tbody>
									@foreach($lista as $key => $cultura)									
									<tr>									
										<td>
											<div class="media">
												<div class="media-body">
													<p class="summary">{{$cultura->nome}}</p>
												</div>
											</div>
										</td>
										<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="/admin/culturas/detalhes/{{$cultura->id}}">Ver Detalhes</a>
												<a class="btn btn-sm  btn-default" href="#">Eliminar</a>
											</div>
										</td>
									</tr>	
									@endforeach									
								</tbody>
							</table>	
						</div>
					</form> 
					<div class="form-group">
						<div class="input-group-addon">
							@if(count($estufas)!=0)
							<a href="/admin/culturas/adicionar" role="button" name="adicionar" id="adicionar cultura" class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Adicionar Cultura">Adicionar</a>
							@else
							<a role="button" name="adicionar" id="adicionar cultura" class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Adicione uma Estufa primeiro" disabled>Adicionar</a>
							@endif
						</div>
					</div>	
				</div>
			</section>
		</div>
	</div>
</div>
@endsection

@section('customScripts')

@endsection


