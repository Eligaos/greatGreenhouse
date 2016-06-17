@extends('app')

@section('customStyles')
<link href="{{asset('css/home/home.css')}}" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">

@endsection
@section('title', ' - Home')
@section('content')
<section id="estufas">
	<!-- item -->
	@foreach($estufas as $key => $estufa)
	<div id="estufa-container" class="col-xs-12 col-sm-11 col-md-10 col-lg-6 text-center ">
		<div class="panel panel-success">
			<div class="panel-heading">
				<i class="fa fa-leaf"></i>
				<h3><a class="btn btn-md btn-block btn-success" href="/admin/estufas/detalhes/{{$estufa->id}}">{{$estufa->nome}}</a></h3>
			</div>
			<div id="monitor{{$estufa->id}}" class="monitor">
			</div>
			<div id="culturas-container" class="modal-footer">  
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
	@endforeach
	<!-- /item -->
</section>
@endsection

@section('customScripts')
<script>		
	var estufas = <?php echo json_encode($estufas)?>;
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/pt.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script src="{{asset('js/home/home.js')}}"></script>
@endsection
