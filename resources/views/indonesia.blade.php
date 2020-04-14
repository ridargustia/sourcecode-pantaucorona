 @extends('layout/main')

 @section('judul', 'COVID-19 di Indonesia | Pantau Corona')

 @section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- TABLE STRIPED -->
          <div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Data Kasus COVID-19 Tiap Provinsi Di Indonesia</h3>
              <p class="panel-subtitle">Sumber data : Kementerian Kesehatan & JHU.</p>
            </div>
            <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Provinsi</th>
                    <th>Positif</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $data as $dataCovid )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dataCovid['attributes']['Provinsi'] }}</td>
                    <td>{{ $dataCovid['attributes']['Kasus_Posi'] }}</td>
                    <td>{{ $dataCovid['attributes']['Kasus_Semb'] }}</td>
                    <td>{{ $dataCovid['attributes']['Kasus_Meni'] }}</td>
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
