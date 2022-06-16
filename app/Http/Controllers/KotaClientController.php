<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class KotaClientController extends Controller
{
    public function index()
    {
        $curl = curl_init();
        curl_setopt_array($curl,[
            CURLOPT_PORT => "8000",
            CURLOPT_URL => "http://localhost:8000/api/kota/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER =>[
            "accept: */*",
            "Content-type: application/json",
            "Postman-Token:
            340cbc02-867b-4db9-85d5-2b6d6d64b090"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data=json_decode($response);
        }

        echo "<table
        border=\"1\"><tr><td>ID</td><td>KOTA</td>
        <td>PROPINSI</td></tr>";
        foreach($data as $d)
        {
            echo "<tr><td>$d->id</td>
            <td>$d->nama_kota</td>
            <td>$d->propinsi</td></tr>";
        }
        echo "</table>";
    }
}