@extends('layout/main')

@section('judul', 'COVID-19 di Dunia | Pantau Corona')

@section('content')

	<div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- TABLE STRIPED -->
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Kasus COVID-19 Global</h3>
              <p class="panel-subtitle">Sumber data : Kementerian Kesehatan & JHU.</p>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Negara</th>
                    <th>Positif</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $data as $dataCovid )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dataCovid['attributes']['Country_Region'] }}</td>
                    <td>{{ $dataCovid['attributes']['Confirmed'] }}</td>
                    <td>{{ $dataCovid['attributes']['Recovered'] }}</td>
                    <td>{{ $dataCovid['attributes']['Deaths'] }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <!-- END TABLE STRIPED -->
        </div>
      </div>
    </div>

@endsection