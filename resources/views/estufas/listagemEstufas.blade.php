@extends('app')

@section('customStyles')
<link href="{{asset('css/listagemEstufas.css')}}" rel="stylesheet">
@endsection
@section('title', ' - Lista de Estufas')

@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-10  col-sm-offset-2 col-md-offset-2">
			<section class="content">
				<div >
					<div class="panel panel-default">
						<div class="panel-heading"><h2>Lista de Estufas</h2></div>
						@if( Session::get('message'))
						<div style="text-align: center">
							<span class="alert alert-info"> {{ Session::get('message') }}</span>
						</div>
						@endif
						@if(count($lista)!=0)
						<div class="table-container">
							<table class="table table-filter table-striped table-bordered table-responsive">
								<tr>
									<th>Nome da Estufa</th>
									<th>Opções</th>

								</tr>
								<tbody>
									@foreach($lista as $key => $estufa)
									<tr>									
										<td>
											<div>
												<span>{{$estufa->nome}}</span>
											</div>
										</td>
										<td>
											<div class="">
												<a class="btn btn-sm  btn-default" href="/admin/estufas/detalhes/{{$estufa->id}}">Ver Detalhes</a>
												<a class="btn btn-sm  btn-default" href="#">Eliminar</a>
											</div>
										</td>
									</tr>													@endforeach
								</tbody>
							</table>	
						</div>
						@else
						<div style="text-align: center" >Não existem estufas nesta exploração</div>
						@endif
					</form> 

					<div class="form-group">
						<div class="input-group-addon">
							<a href="/admin/estufas/adicionar" role="button" name="adicionar" id="adicionar estufa" class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Adicionar Estufa">Adicionar</a>
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


