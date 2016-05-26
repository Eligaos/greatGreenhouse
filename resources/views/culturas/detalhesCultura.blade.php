@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Detalhes da Cultura')


@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8 col-sm-offset-3 col-md-offset-3">
			<div class="content">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="modal-title" id="myModalLabel">Detalhes Cultura</h3>
					</div>
					<div class="panel-body">				
						<div class="form-group">
							<h4 class="border-bottom">Dados da Cultura</h4>
							<p>
								<label>Nome da Cultura: </label>
								<span >{{$lista[0]->nome}}</span>
							</p>
							<p>
								<label>Tipo Cultura: </label>
								@if($lista[0]->tipo_cultura != "")						
								<span>{{$lista[0]->tipo_cultura}}</span>
								@else
								<span>Não Tem</span>
								@endif
							</p>
							
							<p>
								<label>Tipo Cultivo: </label>	
								@if($lista[0]->tipo_cultivo != "")		
								<span>{{$lista[0]->tipo_cultivo}}</span>
								@else
								<span>Não Tem</span>
								@endif

							</p>
							<h4 class="border-bottom">Duração</h4> 


							<p>		
								<label>Data Inicial do Ciclo: </label>
								<span>{{$lista[0]->data_inicio_ciclo}}</span>
							</p>
							<p>
								<label >Data de Fim do Ciclo: </label>						
								<span>{{$lista[0]->data_prevista_fim_ciclo}}</span>
							</p>
							<p>
								<label for="desc">Duração do Ciclo: </label>				
								<span>{{$lista[0]->duracao_ciclo}}</span>
							</p>
							
							<h4 class="border-bottom">Dimensões</h4> 

							<label >Espaço na Linha: </label>									
							@if($lista[0]->espaco_na_linha != 0)
							<span>{{$lista[0]->espaco_na_linha}}</span>
							@else
							<span>Não Tem</span>
							@endif
							<br/>
							<label >Espaço entre Linhas: </label>									
							@if($lista[0]->espaco_entre_linhas != 0)	
							<span>{{$lista[0]->espaco_entre_linhas}}</span>
							@else
							<span>Não Tem</span>
							@endif
							<h4 class="border-bottom">Localização</h4> 

							
							<p>
								<label>Estufa: </label>
								<span>{{$lista[2]->nome}}</span>
							</p>
							<p>
								<label >Setor: </label>									
								<span>{{$lista[1]->nome}}</span>
							</p>
							<h4 class="border-bottom">Espécie</h4>
							<p>
								<label for="nome">Espécie: </label>
								<span>{{$lista[0]->especie}}</span>
							</p>

						</div>
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/culturas/listar" role="button" name="cancelar"class="btn btn-default pull-right">Voltar</a>
								<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Cultura"  role="button" name="editar" href="/admin/culturas/editar/{{$lista[0]->id}}">Editar</a>
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
@endsection
