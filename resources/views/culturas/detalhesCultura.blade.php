@extends('app')

@section('customStyles')
<link href="{{asset('css/addExploracao.css')}}" rel="stylesheet">

@endsection
@section('title', ' - Detalhes da Cultura')


@section('content')
<div class="container">
	<div class="row centered-form">
		<div class="col-xs-12 col-sm-9 col-md-8 col-sm-offset-3 col-md-offset-3">
			<div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title" id="myModalLabel">Detalhes Cultura</h3>
					</div>
					<div class="panel-body">				
						<div class="form-group">
							<fieldset> 
								<legend>Dados da Cultura</legend>
								<div class="col-xs-12 col-md-12">
									<label for="nome">Nome da Cultura: </label>
									<span>{{$lista[0]->nome}}</span>
									<br/>
									<label for="desc">Tipo Cultura: </label>
									@if($lista[0]->tipo_cultura != "")									
									<span>{{$lista[0]->tipo_cultura}}</span>
									@else
									<span>Não Tem</span>
									@endif
									<br/>
									<label for="desc">Tipo Cultivo: </label>	
									@if($lista[0]->tipo_cultivo != "")		
									<span>{{$lista[0]->tipo_cultivo}}</span>
									@else
									<span>Não Tem</span>
									@endif
									<br/>
								</div>	
							</fieldset>
						</div>								
						<div class="form-group">
							<fieldset> 
								<div class="col-xs-12 col-md-12">
									<legend>Duração</legend> 
									<label for="nome">Data Inicial do Ciclo: </label>
									<span>{{$lista[0]->data_inicio_ciclo}}</span>
									<br/>
									<label for="desc">Data de Fim do Ciclo: </label>									
									<span>{{$lista[0]->data_prevista_fim_ciclo}}</span>
									<br/>
									<label for="desc">Duração do Ciclo: </label>									
									<span>{{$lista[0]->duracao_ciclo}}</span>
									<br/>
								</div>
							</fieldset>
						</div>

						<div class="form-group">
							<fieldset> 
								<div class="col-xs-12 col-md-12">
									<legend>Dimensões</legend> 
									<label for="nome">Espaço na Linha: </label>									
									@if($lista[0]->espaco_na_linha != 0)
									<span>{{$lista[0]->espaco_na_linha}}</span>
									@else
									<span>Não Tem</span>
									@endif
									<br/>
									<label for="desc">Espaço entre Linhas: </label>									
									@if($lista[0]->espaco_entre_linhas != 0)	
									<span>{{$lista[0]->espaco_entre_linhas}}</span>
									@else
									<span>Não Tem</span>
									@endif
									<br/>
								</div>
							</fieldset>
						</div>
						<div class="form-group">
							<fieldset> 
								<div class="col-xs-12 col-md-12">
									<legend>Localização</legend> 
									<label for="nome">Estufa: </label>
									<span>{{$lista[2]->nome}}</span>
									<br/>
									<label for="desc">Setor: </label>									
									<span>{{$lista[1]->nome}}</span>
									<br/>
								</div>								
							</fieldset>
						</div>
						<div class="form-group">
							<fieldset> 
								<div class="col-xs-12 col-md-12">
									<legend>Espécie</legend> 
									<label for="nome">Espécie: </label>
									<span>{{$lista[0]->especie}}</span>
								</div>
							</fieldset>
						</div>
						<div class="form-group">
							<div class="input-group-addon">
								<a href="/admin/culturas/listar" role="button" name="cancelar"class="btn btn-default pull-right">Voltar</a>
								<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Estufa"  role="button" name="editar" href="/admin/culturas/editar/{{$lista[0]->id}}">Editar</a>
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
