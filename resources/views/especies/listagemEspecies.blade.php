@extends('app')

@section('customStyles')
<link href="{{asset('css/associacoesTiposLeitura/adicionarAssociacao.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

@endsection
@section('title', ' - Lista de Espécies')

@section('content')
<div class="container">

	<div class="col-lg-12 col-xs-12 col-sm-10 col-md-11  col-lg-offset-1 col-sm-offset-3 col-md-offset-2">
		<section class="content">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>Lista de Espécies</h2></div>
				@if( Session::get('message'))
				<div style="text-align: center">
					<span class="alert alert-info"> {{ Session::get('message') }}</span>
				</div>
				@endif
				<div class="table-container">
					@if(count($especies)!=0)							
					<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive ">
					<thead>
						<tr class="success"> 
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome Comum</th>
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Espécie</th>
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Cultivar</th>
							<th class="no-sort col-xs-6 col-sm-5 col-md-4 text-center">Opções</th>
						</tr>
						</thead>
						<tbody>
							@foreach($especies as $key => $especie)						
							<tr>				
								<td class="text-center">
									{{$especie->nome_comum}}
								</td>					
								<td class="text-center">
									@if($especie->especie != "")	
									{{$especie->especie}}
									@else
									Não Definido
									@endif
								</td>
								<td class="text-center">
									@if($especie->cultivar != "")	
									{{$especie->cultivar}}
									@else
									Não Definido
									@endif
								</td>	
								<td>
									<div class="text-center">
										<a  toggle="tooltip" data-placement="top" title="Detalhes Espécie" role="button" name="detalhes" href="/admin/especies/detalhes/{{$especie->id}}">  <button type="button" class="btn btn-default btn-xs">
											<span class="glyphicon glyphicon-th-list"></span> Detalhes
										</button></a>

										<a toggle="tooltip" data-placement="top" title="Editar Espécie" role="button" name="editar" href="/admin/especies/editar/{{$especie->id}}">  <button type="button" class="btn btn-default btn-xs">
											<span class="glyphicon glyphicon-edit"></span> Editar
										</button></a>
										<a toggle="tooltip" data-placement="top" title="Remover Espécie" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
											<span class="glyphicon glyphicon-remove"></span> Remover
										</button></a>
									</div>
								</td>
							</tr>	
							@endforeach		
						</tbody>								
					</table>	

					@else
					<div class="text-center"><h4>Não existem espécies</h4></div>
					@endif	
				</div>
				<div class="form-group">

					<div class="input-group-addon" >

						<a  href="/admin/especies/adicionar" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar Espécie" >Adicionar</a>

						<div class="pull-right"> {!! $especies->links() !!}</div>
						

					</div>
				</div>	
			</div>
		</section>
		
	</div>	

</div>
@endsection

@section('customScripts')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('js/dataTable.js')}}"></script>
@endsection


