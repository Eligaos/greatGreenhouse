@extends('app')

@section('customStyles')

@endsection
@section('title', ' - Detalhes da Cultura')


@section('content')
<div class="container">
	<div class="col-lg-10 col-xs-12 col-sm-10 col-md-11  col-lg-offset-2 col-sm-offset-3 col-md-offset-2">
		<div class="content">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="modal-title">Detalhes Cultura</h2>
				</div>
				<div class="panel-body">				
					<div class="form-group">
						<h3 class="modal-title border-bottom margin-bottom">Dados da Cultura</h3>
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
						<h3 class="modal-title border-bottom margin-bottom">Duração</h3>
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
						
						

						<h3 class="modal-title border-bottom margin-bottom">Dimensões</h3>

						<p>
							<label >Espaço na Linha: </label>									
							@if($lista[0]->espaco_na_linha != 0)
							<span>{{$lista[0]->espaco_na_linha}}</span>
							@else
							<span>Não Tem</span>
							@endif
						</p>
						<p>
							<label >Espaço entre Linhas: </label>									
							@if($lista[0]->espaco_entre_linhas != 0)	
							<span>{{$lista[0]->espaco_entre_linhas}}</span>
							@else
							<span>Não Tem</span>
							@endif
						</p>

						<h3 class="modal-title border-bottom margin-bottom">Localização</h3>

						
						<p>
							<label>Estufa: </label>
							<span>{{$lista[2]->nome}}</span>
						</p>
						<p>
							<label >Setor: </label>									
							<span>{{$lista[1]->nome}}</span>
						</p>
						
						<h3 class="modal-title border-bottom margin-bottom">Espécie</h3>


						<p>
							<label for="nome">Espécie: </label>
							@if($lista[3] != null)	
							<span>{{$lista[3]->nome}}</span>
							@else
							<span>Não Tem</span>
							@endif
						</p>

					</div>
					<div class="form-group">
						<div class="input-group-addon">
							<a href="/admin/culturas" role="button" name="cancelar"class="btn btn-default pull-right">Voltar</a>
							<a class="btn btn-success pull-right" toggle="tooltip" data-placement="top" title="Editar Cultura"  role="button" name="editar" href="/admin/culturas/editar/{{$lista[0]->id}}">Editar</a>
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
