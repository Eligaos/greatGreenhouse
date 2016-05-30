@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Lista de Associacoes')

@section('content')
<div class="container">
	<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-1 col-md-offset-2 ">
		<section class="content">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Lista de Associacoes</h2></div>
				<div class="table-container">
					<tbody>
						@if( Session::get('message'))
						<div class="text-center">
							<span class="alert alert-info"> {{ Session::get('message') }}</span>
						</div>
						@endif
						<div class="table-container">
							@if($estufas!=0 && $sensores != 0)							
							@if(count($lista)!=0)							

							<table class="table table-filter table-striped table-bordered table-responsive">							 
								<tr>
									<th>Parametro</th>
									<th>Unidade</th>
									<th>Origem</th>
									<th>Opções</th>
								</tr>	
								<tbody>		
									@foreach($lista as $key => $associacao)
									<tr>						
										<td>		
											<span>{{$associacao->parametro}}</span>

										</td>
										<td>		
											<span>{{$associacao->unidade}}</span>

										</td>
										<td>		
											<span>{{$associacao->estufa_nome}}</span>

										</td>
										<td>

											<div class="text-center">
												<a  toggle="tooltip" data-placement="top" title="Detalhes Associação" role="button" name="detalhes" href="/admin/associacoes/detalhes/{{$associacao->associacoes_id}}">  <button type="button" class="btn btn-default btn-xs">
													<span class="glyphicon glyphicon-th-list"></span> Detalhes
												</button></a>

												<a toggle="tooltip" data-placement="top" title="Editar Associação" role="button" name="editar" href="/admin/associacoes/editar/{{$associacao->associacoes_id}}">  <button type="button" class="btn btn-default btn-xs">
													<span class="glyphicon glyphicon-edit"></span> Editar
												</button></a>
												<a toggle="tooltip" data-placement="top" title="Remover Associação" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
													<span class="glyphicon glyphicon-remove"></span> Remover
												</button></a>
											</div>

										</td>
									</tr>								
									@endforeach
								</tbody>
							</table>	
							@else
							<div class="text-center" >
								<h4> Não existem associações</h4>
							</div>
							@endif	
							@else
							<div class="text-center" >
								<h4> Não existem estufas nesta exploração ou sensores adicionados</h4>
							</div>
							@endif									
						</div>
					</form> 
					<div class="form-group">
						<div class="input-group-addon">
							@if($estufas!=0 && $sensores!=0)
							<a href="/admin/associacoes/associar" role="button" name="adicionar" id="adicionarAssociacao" class="btn btn-success center-block pull-left">Adicionar Associação</a>
							@else
							<a role="button" name="adicionar" id="adicionarAssociacoes" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicione uma Estufa ou Sensores" disabled>Adicionar Associação</a>
							@endif
						</div>		
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