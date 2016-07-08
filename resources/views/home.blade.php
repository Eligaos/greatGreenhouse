@extends('app')

@section('customStyles')
<link href="{{asset('css/home/home.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('title', ' - Home')
@section('content')
@if(count($estufas)!=0)
@foreach($estufas as $key => $estufa)
<div id="estufa-container" class="col-xs-12 col-sm-10 col-md-10 col-lg-6 text-center col-md-offset-1 col-sm-offset-2 col-lg-offset-0">
	<div class="panel panel-success">
		<div class="panel-heading">
			<i class="fa fa-leaf"></i>
			<h3><a class="btn btn-md btn-block btn-success" href="/admin/estufas/detalhes/{{$estufa->id}}">{{$estufa->nome}}</a></h3>
			<meta name="_token" content="{{ csrf_token() }}"/>

		</div>
		<div class="panel-body">

			<div>
				@if(count($ocorrencias)!=0)
				@foreach($estufasID as $key => $id)
				@if($estufa->id == $id)
				<table id="dataTable" class="table table-filter table-striped table-bordered table-responsive ">
					<thead>
						<tr class="success">
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Sensor (Param.)</th>
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Data</th>
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Valor</th>
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Alarme</th>
							<th class="col-xs-6 col-sm-5 col-md-2 text-center">Visto</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ocorrencias as $key => $ocorrencia)
						@if($estufa->id == $ocorrencia->estufa_id)	
						<tr>
							<td name = "alarmeId" class="text-center">{{$ocorrencia->nome}} ({{$ocorrencia->parametro}})
							</td>					
							<td class="text-center">{{$ocorrencia->data}} 
							</td>
							<td class="text-center">{{$ocorrencia->leitura_valor}} {{$ocorrencia->unidade}}
							</td>
							<td class="text-center"><a href="/admin/alarmes/detalhes/{{$ocorrencia->alarme_id}}">Ver Detalhes</a>
							</td>
							<td>
								<span class="button-checkbox">
									<button type="button" value="{{$ocorrencia->alarme_id}}-{{$ocorrencia->leitura_id}}" class="btn" data-color="primary">Visto</button>
									<input id="checked" type="checkbox" class="hidden" />
								</span>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
				@endif				
				@endforeach				
				@endif
			</div>
			<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div id="monitor{{$estufa->id}}" class="monitor">	
				</div>

			</div>
		</div>
		<div class="panel-footer">

			<div id="culturas-container" >  
				<ul>
					@foreach($culturas as $key => $cultura)
					@if($cultura->estufa_id == $estufa->id)
					<li class=""><i class="glyphicon glyphicon-tree-deciduous"></i> <a href="/admin/culturas/detalhes/{{$cultura->cultura_id}}">{{$cultura->cultura_nome}}</a> </li>
					@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endforeach
@else
<div class="text-center margin-bottom col-sm-12 ">
	<img class="img-responsive margin-bottom" src="{{asset('img/greatgreenhouse_logo.png')}}">
	<h3>A Exploração escolhida ainda não tem nenhuma Estufa!</h3>	
		<a  href="/admin/estufas/adicionar" role="button" name="adicionar" class="btn btn-success" toggle="tooltip" data-placement="top" title="Adicione a primeira Estufa a esta Exploração">Adicionar nova Estufa</a>
</div>
@endif
<!-- /item -->
@endsection

@section('customScripts')
<script>		
	var estufas = <?php echo json_encode($estufas)?>;
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/pt.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/no-data-to-display.js"></script>

<script src="{{asset('js/home/home.js')}}"></script>
<script src="{{asset('js/home/checkBox.js')}}"></script>
@endsection