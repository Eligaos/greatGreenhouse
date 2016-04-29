@extends('app')

@section('customStyles')
<link href="{{asset('css/addExploracao.css')}}" rel="stylesheet">

@endsection
@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8  col-sm-offset-3 col-md-offset-3">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title" id="myModalLabel">Editar Estufa</h3>
					</div>
					<div class="panel-body">				
						<div class="form-group">
							<fieldset> 
								<legend>Dados da Estufa</legend>
								<div class="col-xs-12 col-md-12">
									<label for="nome">Nome da Estufa:</label>
									<span>{{$lista[0]->nome}}</span>
									<br/>
									<label for="nome">Descrição</label>									
									<span>{{$lista[0]->descricao}}</span>
									<br/>
								</div>	
							</fieldset>
						</div>								
						<div class="form-group">
							<fieldset> 
								<legend>Setores</legend> 
								@if(count($lista[1])==0)
								<p class="summary">Esta estufa não tem Setores</p>
								@else	
								<div class="table-container">
									<table class="table table-filter table-striped table-bordered table-responsive">
										<thead>
											<tr >
												<th class="text-center">
													Setor
												</th>
												<th class="text-center">
													Descrição
												</th>
												<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
												</th>
											</tr>
										</thead>											
										@foreach($lista[1] as $key => $setor)											
										<tbody>
											<tr>									
												<td>
													<div class="media">
														<div class="media-body">
															<p class="summary">{{$setor->nome}}</p>
														</div>
													</div>
												</td>		
												<td>
													<div class="media">
														<div class="media-body">
															<p class="summary">{{$setor->descricao}}</p>
														</div>
													</div>
												</td>										
											</tr>	
										</tbody>
										@endforeach										
									</table>	
								</div>									
								@endif
							</fieldset>
						</div>
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/estufas/listar" role="button" name="cancelar"class="btn btn-default pull-right">Voltar</a>
								<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Estufa"  role="button" name="editar" href="/admin/estufas/editar/{{$lista[0]->id}}">Editar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('customScripts')

<script src="{{asset('js/addSetor.js')}}"></script>
@endsection
