@extends('layout/main')

@section('judul', 'Grafik COVID-19 di Indonesia | Pantau Corona')

@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<!-- GRAFIK -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Grafik Kasus COVID-19 di Indonesia</h3>
						<p class="panel-subtitle">Sumber data : Kementerian Kesehatan & JHU.</p>
					</div>
					<div class="panel-body">
						{!! $chart->container() !!}

						<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

						{!! $chart->script() !!}
					</div>
				</div>
				<!-- END GRAFIK -->
			</div>	
		</div>
	</div>

@endsection