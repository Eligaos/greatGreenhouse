@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Lista de Espécies')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h2>Lista de Espécies</h2></div>
						@if( Session::get('message'))
						<div style="text-align: center">
							<span class="alert alert-info"> {{ Session::get('message') }}</span>
						</div>
						@endif
						<div class="table-container">
							@if(count($especies)!=0)							
							<table id="table" class="table table-filter table-striped table-bordered table-responsive ">
								<tr>
									<th id="tEstufa" style="text-align: center" class="col-xs-6 col-sm-5 col-md-2">Nome Comum</th>
									<th style="text-align: center" class="col-xs-6 col-sm-5 col-md-2">Nome da Espécie</th>
									<th style="text-align: center" class="col-xs-6 col-sm-5 col-md-2">Cultivar</th>
									<th style="text-align: center" class="col-xs-6 col-sm-5 col-md-2">Opções</th>
								</tr>
								<tbody>
									@foreach($especies as $key => $especie)						
									<tr>				
										<td class="text-center">
											{{$especie->nome_comum}}
										</td>					
										<td class="text-center">
											{{$especie->especie}}
										</td>
										<td class="text-center">
											{{$especie->cultivar}}
										</td>	
										<td>
											<div style="text-align: center">

									


								        	<a  toggle="tooltip" data-placement="top" title="Detalhes Espécie" role="button" name="detalhes" href="/admin/especies/detalhes/{{$especie->id}}">  <button type="button" class="btn btn-default btn-xs">
									          <span class="glyphicon glyphicon-th-list"></span> Detalhes
									        </button></a>
									        
								        	<a toggle="tooltip" data-placement="top" title="Editar Espécie" role="button" name="editar" href="/admin/especies/editar/{{$especie->id}}">  <button type="button" class="btn btn-default btn-xs">
									          <span class="glyphicon glyphicon-edit"></span> Editar
									        </button></a>
								        	<a toggle="tooltip" data-placement="top" title="Detalhes Espécie" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
									          <span class="glyphicon glyphicon-remove"></span> Remover
									        </button></a>

								  
											
											</div>
										</td>
									</tr>	
									@endforeach		
								</tbody>								
							</table>	

							@else
							<div style="text-align: center" >Não existem espécies</div>
							@endif	
						</div>

					</form> 


					<div class="form-group">
					
						<div class="input-group-addon" >
										
							<a  href="/admin/especies/adicionar" role="button" name="adicionar" id="adicionar cultura" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar Espécie" >Adicionar</a>
	
						<div class="pull-right"> {!! $especies->links() !!}</div>
							
												
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


