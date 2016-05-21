@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Lista de Estufas')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Estufas</h2></div>
					@if( Session::get('message'))
					<div style="text-align: center">
						<span class="alert alert-info"> {{ Session::get('message') }}</span>
					</div>
					@endif
					<div class="table-container">
						@if(count($lista)!=0)							
						<table id="table" class="table table-filter table-striped table-bordered table-responsive ">
							<tr>
								<th id="tEstufa" class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Estufa</th>

								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Opções</th>
							</tr>
							<tbody>
								@foreach($lista as $key => $estufa)						
								<tr>				
									<td class="text-center">
										{{$estufa->nome}}
									</td>					
									<td>
										<div class="text-center">
											<a  toggle="tooltip" data-placement="top" title="Detalhes Estufa" role="button" name="detalhes" href="/admin/estufas/detalhes/{{$estufa->id}}">  <button type="button" class="btn btn-default btn-xs">
												<span class="glyphicon glyphicon-th-list"></span> Detalhes
											</button></a>

											<a toggle="tooltip" data-placement="top" title="Editar Estufa" role="button" name="editar" href="/admin/estufas/editar/{{$estufa->id}}">  <button type="button" class="btn btn-default btn-xs">
												<span class="glyphicon glyphicon-edit"></span> Editar
											</button></a>
											<a toggle="tooltip" data-placement="top" title="Remover Estufa" role="button" name="detalhes" href="#">  <button type="button" class="btn btn-default btn-xs">
												<span class="glyphicon glyphicon-remove"></span> Remover
											</button></a>
										</div>
									</td>
								</tr>	
								@endforeach		
							</tbody>								
						</table>	
						@else
						<div class="text-center"><span>Não existem estufas</span></div>
						@endif	
					</div>
					<div class="form-group">

						<div class="input-group-addon" >

							<a  href="/admin/estufas/adicionar" role="button" name="adicionar" class="btn btn-success center-block pull-left" toggle="tooltip" data-placement="top" title="Adicionar Estufa" >Adicionar</a>
							<div class="pull-right"> {!! $lista->links() !!}</div>
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


