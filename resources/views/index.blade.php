@extends('layout/main')

@section('judul', 'Dashboard | Pantau Corona')

@section('content')

	<div class="container-fluid">
		<!-- OVERVIEW -->
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Data Kasus COVID-19 di Indonesia</h3>
				<p class="panel-subtitle">Sumber data : Kementerian Kesehatan & JHU (kawalcorona.com).</p>
			</div>
			<div class="panel-body">
				@foreach( $data as $datas)
				<div class="row">
					<div class="col-md-4">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">{{ $datas['positif'] }}</span>
								<span class="title">Positif</span>
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">{{ $datas['sembuh'] }}</span>
								<span class="title">Sembuh</span>
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">{{ $datas['meninggal'] }}</span>
								<span class="title">Meninggal</span>
							</p>
						</div>
					</div>
				</div>
				@endforeach
				<div class="row">
					<div class="col-md-12">
						{!! $chart->container() !!}

						<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

						{!! $chart->script() !!}
					</div>
				</div>
			</div>
		</div>
		<!-- END OVERVIEW -->

		<!-- TABLE STRIPED -->
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Kasus COVID-19 Tiap Provinsi Di Indonesia</h3>
              <p class="panel-subtitle sembunyikan">Sumber data : Kementerian Kesehatan & JHU.</p>
              <p class="panel-subtitle hidden-ket">Keterangan : <strong>P</strong> = Positif, <strong>S</strong> = Sembuh, <strong>M</strong> = Meninggal.</p>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="column-primary" data-header="Provinsi"><span>Provinsi</span></th>
                    <th class="column-primary" data-header="P"><span>Positif</span></th>
                    <th class="column-primary" data-header="S"><span>Sembuh</span></th>
                    <th class="column-primary" data-header="M"><span>Meninggal</span></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $dataProvinsi as $dataCovid )
                  <tr>
                    <td class="sembunyikan">{{ $loop->iteration }}</td>
                    <td>{{ $dataCovid['attributes']['Provinsi'] }}</td>
                    <td>{{ $dataCovid['attributes']['Kasus_Posi'] }}</td>
                    <td>{{ $dataCovid['attributes']['Kasus_Semb'] }}</td>
                    <td>{{ $dataCovid['attributes']['Kasus_Meni'] }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="panel-footer hidden-footer1">
            	<h5>Sumber data : Kementerian Kesehatan & JHU.</h5>
            </div>
          </div>
          <!-- END TABLE STRIPED -->

		<!-- OVERVIEW -->
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Data Kasus COVID-19 Global</h3>
				<p class="panel-subtitle">Sumber data : Kementerian Kesehatan & JHU.</p>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">{{ $dataPositif }}</span>
								<span class="title">Total Positif</span>
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">{{ $dataSembuh }}</span>
								<span class="title">Total Sembuh</span>
							</p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">{{ $dataMeninggal }}</span>
								<span class="title">Total Meninggal</span>
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! $chart2->container() !!}

						<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

						{!! $chart2->script() !!}
					</div>
				</div>
			</div>
		</div>
		<!-- END OVERVIEW -->

		<!-- TABLE STRIPED -->
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Kasus COVID-19 Global</h3>
              <p class="panel-subtitle sembunyikan">Sumber data : Kementerian Kesehatan & JHU.</p>
              <p class="panel-subtitle hidden-ket">Keterangan : <strong>P</strong> = Positif, <strong>S</strong> = Sembuh, <strong>M</strong> = Meninggal.</p>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
              	<thead>
                  <tr>
                    <th>#</th>
                    <th class="column-primary negara" data-header="Negara"><span>Negara</span></th>
                    <th class="column-primary" data-header="Status"><span>Positif</span></th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $dataGlobal as $dataCovid )
                  <tr>
                    <td class="sembunyikan">{{ $loop->iteration }}</td>
                    <th scope="row">{{ $dataCovid['attributes']['Country_Region'] }}</th>
                    <td class="global" data-header="P">{{ $dataCovid['attributes']['Confirmed'] }}</td>
                    <td class="global" data-header="S">{{ $dataCovid['attributes']['Recovered'] }}</td>
                    <td class="global" data-header="M">{{ $dataCovid['attributes']['Deaths'] }}</td>
                  </tr>
                  @endforeach
                </tbody>

                <!-- <thead>
                  <tr>
                    <th>#</th>
                    <th class="column-primary" data-header="Negara"><span>Negara</span></th>
                    <th class="column-primary" data-header="P"><span>Positif</span></th>
                    <th class="column-primary" data-header="S"><span>Sembuh</span></th>
                    <th class="column-primary" data-header="M"><span>Meninggal</span></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $dataGlobal as $dataCovid )
                  <tr>
                    <td class="sembunyikan">{{ $loop->iteration }}</td>
                    <td>{{ $dataCovid['attributes']['Country_Region'] }}</td>
                    <td>{{ $dataCovid['attributes']['Confirmed'] }}</td>
                    <td>{{ $dataCovid['attributes']['Recovered'] }}</td>
                    <td>{{ $dataCovid['attributes']['Deaths'] }}</td>
                  </tr>
                  @endforeach
                </tbody> -->
              </table>
            </div>
            <div class="panel-footer hidden-footer1">
            	<h5>Sumber data : Kementerian Kesehatan & JHU.</h5>
            </div>
          </div>
          <!-- END TABLE STRIPED -->
	</div>

@endsection