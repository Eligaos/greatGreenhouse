@extends('app')

@section('customStyles')
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection
@section('title', ' - Lista de Associacoes')

@section('content')

<div class="col-sm-10 col-sm-offset-2 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="modal-title" >Lista de Associações</h3>
		</div>
		@if( Session::get('message'))
		<div class="col-xs-12 col-md-12 col-lg-12 alert alert-info">
			<span > {{ Session::get('message') }}</span>
		</div>
		@endif
		<div class="panel-body"> 
			<div class="table-container">
				<div class="table-container">
					@if($estufas!=0 && $sensores != 0)							
					@if(count($lista)!=0)							

					<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive">
						<thead>						 
							<tr class="success">
								<th>Nome do Sensor</th>
								<th>Parâmetro</th>
								<th>Unidade</th>
								<th>Origem (Estufa -Setor) </th>
								<th class="no-sort">Opções</th>
							</tr>	
						</thead>
						<tbody>		
							@foreach($lista as $key => $associacao)
							<tr>						
								<td>		
									<span>{{$associacao->sensor_nome}}</span>

								</td><td>		
								<span>{{$associacao->parametro}}</span>

							</td>
							<td>		
								<span>{{$associacao->unidade}}</span>

							</td>
							<td>	

							@if($associacao->setor_nome == "Nenhum")

								<span>{{$associacao->estufa_nome}} - Geral</span>
								
							@else
							<span>{{$associacao->estufa_nome}} - {{$associacao->setor_nome}}</span>
								
							@endif
								

							</td>
							<td>

								<div class="text-center">
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
		
	</div>
	<div class="panel-footer"> 
		<div class="col-sm-12 input-group">
			@if($estufas!=0 && $sensores!=0)
			<a href="/admin/associacoes/associar" role="button" name="adicionar" id="adicionarAssociacao" class="btn btn-success center-block pull-left">Adicionar Associação</a>
			@else
			<a role="button" name="adicionar" id="adicionarAssociacoes" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicione uma Estufa ou Sensores" disabled>Adicionar Associação</a>
			@endif
		</div>		
	</div>	
</div>
</div>

</div>
</div>
@endsection

@section('customScripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('js/dataTable.js')}}"></script>
@endsection