<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Charts\CovidChart;

class InfoController extends Controller
{
	public function index()
	{
		$response = Http::get('https://api.kawalcorona.com/indonesia');
        $responseProvinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $responseGlobal = Http::get('https://api.kawalcorona.com/');
		$responsePositifGlobal = Http::get('https://api.kawalcorona.com/positif')['value'];
		$responseSembuhGlobal = Http::get('https://api.kawalcorona.com/sembuh')['value'];
		$responseMeninggalGlobal = Http::get('https://api.kawalcorona.com/meninggal')['value'];
		$data = $response->json();
        $data2 = $responseProvinsi->json();
        $data3 = $responseGlobal->json();

        // GRAFIK 1
		$suspects = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        $labels = $suspects->flatten(1)->pluck('Provinsi');
        $dataGrafik = $suspects->flatten(1)->pluck('Kasus_Posi');

        $colors = $labels->map(function($item) {
            return $rand_color = '#'.substr(md5(mt_rand()), 0, 6);
        });

        $chart = new CovidChart;
        $chart->labels($labels);
        $chart->dataset('Kasus Positif', 'line', $dataGrafik)->backgroundColor($colors);

        // GRAFIK 2
        $suspects2 = collect(Http::get('https://api.kawalcorona.com/')->json());
        $labels2 = $suspects2->flatten(1)->pluck('Country_Region');
        $dataGrafik2 = $suspects2->flatten(1)->pluck('Confirmed');

        $colors2 = $labels2->map(function($item) {
            return $rand_color2 = '#'.substr(md5(mt_rand()), 0, 6);
        });

        $chart2 = new CovidChart;
        $chart2->labels($labels2);
        $chart2->dataset('Kasus Positif', 'line', $dataGrafik2)->backgroundColor($colors2);
        
        return view('index', [
			'data' => $data,
            'dataProvinsi' => $data2,
            'dataGlobal' => $data3,
			'dataPositif' => $responsePositifGlobal,
			'dataSembuh' => $responseSembuhGlobal,
			'dataMeninggal' => $responseMeninggalGlobal,
            'chart' => $chart,
            'chart2' => $chart2,
			'title' => "Dashboard"
		]);
	}

    public function chart()
    {
        $suspects = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
        $labels = $suspects->flatten(1)->pluck('Provinsi');
        $data = $suspects->flatten(1)->pluck('Kasus_Posi');

        $colors = $labels->map(function($item) {
            return $rand_color = '#'.substr(md5(mt_rand()), 0, 6);
        });

        $chart = new CovidChart;
        $chart->labels($labels);
        $chart->dataset('Kasus Positif', 'line', $data)->backgroundColor($colors);

        return view('grafik', [
            'chart' => $chart,
            // 'title' => "Chart"
        ]);
    }
}
