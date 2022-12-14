<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class PekerjaanController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = DB::table('tweb_penduduk_pekerjaan')
            ->select('tweb_penduduk_pekerjaan.nama')
            ->selectSub('SELECT COUNT(tweb_penduduk.id) AS Jumlah_L FROM tweb_penduduk WHERE  tweb_penduduk.pekerjaan_id=tweb_penduduk_pekerjaan.id AND tweb_penduduk.sex=1', 'Jumlah_L')
            ->selectSub('SELECT COUNT(tweb_penduduk.id) AS Jumlah_P  FROM tweb_penduduk WHERE tweb_penduduk.pekerjaan_id=tweb_penduduk_pekerjaan.id AND tweb_penduduk.sex=2', 'Jumlah_P')
            ->join('tweb_penduduk', 'tweb_penduduk_pekerjaan.id', '=', 'tweb_penduduk.pekerjaan_id')
            ->groupBy('tweb_penduduk_pekerjaan.nama')
            ->get();


        return response()->json([
            'status' => true,
            'data' => $pekerjaan
        ]);
    }
}
