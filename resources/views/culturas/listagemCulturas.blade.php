@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Lista de Culturas')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10 col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Lista de Culturas</h2></div>
					@if( Session::get('message'))
					<div style="text-align: center">
						<span class="alert alert-info"> {{ Session::get('message') }}</span>
					</div>
					@endif
					<div class="table-container">
						@if(count($estufas)!=0)							
						<table id="table" class="table table-filter table-striped table-bordered table-responsive ">
							<tr>
								<th id="tEstufa" class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Estufa</th>
								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome da Cultura</th>
								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Nome do Setor</th>
								<th class="col-xs-6 col-sm-5 col-md-2 text-center">Opções</th>
							</tr>
							<tbody>
								@foreach($lista as $key => $cultura)	
								<tr>				
									<td id="tdN" class="text-center">
										<p id="pN">{{$cultura->estufa_nome}}</p>
									</td>					
									<td>
										<div class="text-center">
											{{$cultura->cultura_nome}}
										</td>
										<td>
											<div class="media">
												<div class="media-body">
													<p class="summary">{{$cultura->setor_nome}}</p>
												</div>
											</div>
										</td>	
										<td>
											<div  style="text-align: center">
												<a class="btn btn-sm  btn-default" href="/admin/culturas/detalhes/{{$cultura->cultura_id}}" toggle="tooltip" data-placement="top" title="Ver Detalhes da Cultura">Ver Detalhes</a>
												<a class="btn btn-sm  btn-default" toggle="tooltip" data-placement="top" title="Editar Cultura"  role="button" name="editar" href="/admin/culturas/editar/{{$cultura->cultura_id}}">Editar</a>
												<a class="btn btn-sm  btn-default" data-placement="top" title="Eliminar Cultura" href="#">Eliminar</a>
											</div>
										</td>
									</tr>	
									@endforeach		
								</tbody>								
							</table>	
							@else
							<div style="text-align: center" >Não existem estufas nesta exploração</div>
							@endif	
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
			</div>	
		</div>
	</section>
</div>
</div>
</div>
@endsection

@section('customScripts')
<script src="{{asset('js/culturas/listagemCultura.js')}}"></script>
@endsection


