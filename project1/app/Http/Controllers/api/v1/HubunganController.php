<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HubunganController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = DB::table('tweb_penduduk_hubungan')
            ->select('tweb_penduduk_hubungan.nama')
            ->selectSub('SELECT COUNT(tweb_penduduk.id) AS Jumlah_L FROM tweb_penduduk WHERE  tweb_penduduk.kk_level=tweb_penduduk_hubungan.id AND tweb_penduduk.sex=1', 'Jumlah_L')
            ->selectSub('SELECT COUNT(tweb_penduduk.id) AS Jumlah_P  FROM tweb_penduduk WHERE tweb_penduduk.kk_level=tweb_penduduk_hubungan.id AND tweb_penduduk.sex=2', 'Jumlah_P')
            ->join('tweb_penduduk', 'tweb_penduduk_hubungan.id', '=', 'tweb_penduduk.kk_level')
            ->groupBy('tweb_penduduk_hubungan.nama')
            ->get();


        return response()->json([
            'status' => true,
            'data' => $pekerjaan
        ]);
    }
}
