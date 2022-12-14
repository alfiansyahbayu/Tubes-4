<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UmurController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = DB::table('tweb_penduduk_umur')
            ->select('tweb_penduduk_umur.nama')
            ->selectSub(
                'SELECT COUNT(umur_id) FROM
                 ( SELECT sex ,CASE 
            WHEN Umur>=0 AND Umur<=1 THEN 6
            WHEN Umur>=2 AND Umur<=4 THEN 9
            WHEN Umur>=5 AND Umur<=9 THEN 12
            WHEN Umur>=10 AND Umur<=14 THEN 13
            WHEN Umur>=15 AND Umur<=19 THEN 14
            WHEN Umur>=20 AND Umur<=24 THEN 15
            WHEN Umur>=25 AND Umur<=29 THEN 16
            WHEN Umur>=30 AND Umur<=34 THEN 17
            WHEN Umur>=35 AND Umur<=39 THEN 18
            WHEN Umur>=40 AND Umur<=44 THEN 19
            WHEN Umur>=45 AND Umur<=49 THEN 20
            WHEN Umur>=50 AND Umur<=54 THEN 21
            WHEN Umur>=54 AND Umur<=59 THEN 22
            WHEN Umur>=60 AND Umur<=64 THEN 23
            WHEN Umur>=65 AND Umur<=69 THEN 24
            WHEN Umur>=70 AND Umur<=74 THEN 25
            WHEN Umur>=75 THEN 15
            END AS umur_id FROM (SELECT id,nama,sex,tanggallahir,(YEAR(CURRENT_DATE())-YEAR(tanggallahir))Umur from tweb_penduduk )t) AS tabel_umur
            WHERE tabel_umur.umur_id=tweb_penduduk_umur.id AND tabel_umur.sex=1',
                'Jumlah_L'
            )
            ->selectSub(
                'SELECT COUNT(umur_id) FROM
                 ( SELECT sex ,CASE 
            WHEN Umur>=0 AND Umur<=1 THEN 6
            WHEN Umur>=2 AND Umur<=4 THEN 9
            WHEN Umur>=5 AND Umur<=9 THEN 12
            WHEN Umur>=10 AND Umur<=14 THEN 13
            WHEN Umur>=15 AND Umur<=19 THEN 14
            WHEN Umur>=20 AND Umur<=24 THEN 15
            WHEN Umur>=25 AND Umur<=29 THEN 16
            WHEN Umur>=30 AND Umur<=34 THEN 17
            WHEN Umur>=35 AND Umur<=39 THEN 18
            WHEN Umur>=40 AND Umur<=44 THEN 19
            WHEN Umur>=45 AND Umur<=49 THEN 20
            WHEN Umur>=50 AND Umur<=54 THEN 21
            WHEN Umur>=54 AND Umur<=59 THEN 22
            WHEN Umur>=60 AND Umur<=64 THEN 23
            WHEN Umur>=65 AND Umur<=69 THEN 24
            WHEN Umur>=70 AND Umur<=74 THEN 25
            WHEN Umur>=75 THEN 15
            END AS umur_id FROM (SELECT id,nama,sex,tanggallahir,(YEAR(CURRENT_DATE())-YEAR(tanggallahir))Umur from tweb_penduduk )t) AS tabel_umur
            WHERE tabel_umur.umur_id=tweb_penduduk_umur.id AND tabel_umur.sex=2',
                'Jumlah_P'
            )
            ->joinSub('SELECT sex ,CASE 
       WHEN Umur>=0 AND Umur<=1 THEN 6
       WHEN Umur>=2 AND Umur<=4 THEN 9
       WHEN Umur>=5 AND Umur<=9 THEN 12
       WHEN Umur>=10 AND Umur<=14 THEN 13
       WHEN Umur>=15 AND Umur<=19 THEN 14
       WHEN Umur>=20 AND Umur<=24 THEN 15
       WHEN Umur>=25 AND Umur<=29 THEN 16
       WHEN Umur>=30 AND Umur<=34 THEN 17
       WHEN Umur>=35 AND Umur<=39 THEN 18
       WHEN Umur>=40 AND Umur<=44 THEN 19
       WHEN Umur>=45 AND Umur<=49 THEN 20
       WHEN Umur>=50 AND Umur<=54 THEN 21
       WHEN Umur>=54 AND Umur<=59 THEN 22
       WHEN Umur>=60 AND Umur<=64 THEN 23
       WHEN Umur>=65 AND Umur<=69 THEN 24
       WHEN Umur>=70 AND Umur<=74 THEN 25
       WHEN Umur>=75 THEN 15
       END AS umur_id FROM (SELECT id,nama,sex,tanggallahir,(YEAR(CURRENT_DATE())-YEAR(tanggallahir))Umur from tweb_penduduk )t', 'tabel_umur', 'tweb_penduduk_umur.id', '=', 'tabel_umur.umur_id')
            ->groupBy('tweb_penduduk_umur.nama')
            ->get();


        return response()->json([
            'status' => true,
            'data' => $pekerjaan
        ]);
    }
}
