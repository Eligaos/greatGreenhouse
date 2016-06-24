@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Detalhes da Estufa')


@section('content')

<div class="col-sm-10 col-md-10 col-sm-offset-2 col-md-offset-1 centered-form">


	<div class="panel panel-default">

		<div class="panel-heading">
			<h3 class="modal-title">Detalhes Estufa</h3>
		</div>
		@if( Session::get('message'))
		<div class="text-center">
			<span class="alert alert-info"> {{ Session::get('message') }}</span>
		</div>
		@endif
		<div class="panel-body">				
			<div class="form-group">
				<h3 class="modal-title border-bottom margin-bottom">Dados da Estufa</h3>
				<div class="col-xs-12 col-md-12">
					<p>
						<label for="nome">Nome da Estufa: </label>
						<span>{{$lista[0]->nome}}</span>

					</p>
					<label for="desc">Descrição: </label>									
					<span>{{$lista[0]->descricao}}</span>
					<br/>
				</div>	
			</div>								
			<div class="form-group">
				<h3 class="modal-title border-bottom margin-bottom">Setores</h3>
				@if(count($lista[1])==1 && $lista[1][0]->nome == "Nenhum")
				<p class="summary">Esta estufa não tem Setores</p>
				@else	
				<div class="table-container">
					<table class="table table-filter table-striped table-bordered table-responsive">
						<thead>
							<tr class="success">
								<th class="text-center">
									Setor
								</th>
								<th class="text-center">
									Descrição
								</th>
							</tr>
						</thead>											
						@foreach($lista[1] as $key => $setor)											
						<tbody>
							<tr>
								@if($setor->nome != "Nenhum")									
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
								@endif										
							</tr>	
						</tbody>
						@endforeach										
					</table>	
				</div>									
				@endif
			</div>
			<div class="form-group">
				<div class="input-group-addon">
					<a href="/admin/estufas" role="button" name="cancelar"class="btnL btn btn-default pull-right">Voltar</a>
					<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Estufa"  role="button" name="editar" href="/admin/estufas/editar/{{$lista[0]->id}}">Editar</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
@endsection
@section('customScripts')
<script src="{{asset('js/estufas/addSetor.js')}}"></script>
@endsection
