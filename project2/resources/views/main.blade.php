@extends('layouts.mainlayout')

@section('isi')


<script>
    fetch("http://127.0.0.1:8080/api/v1/pekerjaan").then((data) => {
        //console.log(data);
        return data.json();
    }).then((objectData) => {
        console.log(objectData.data[0].nama);
        let tableData = "";
        objectData.data.map((values) => {
            tableData += `<tr>
                            <td>${values.nama}</td>
                            <td>${values.Jumlah_L}</td>
                            <td>${values.Jumlah_P}</td>
                        </tr>`;
        });
        document.getElementById("table_body").innerHTML = tableData;
    })
</script>

<div class=" container mt-5 " style="min-height: 800px; width:1500px" >
    <div class="row g-0">
        <div class="d-flex col-6 col-md-4 " style="max-height: 800px">
            <a href="/pekerjaan">
                <img src="/images/pekerjaan.png" style="overflow:hidden;" class="img-fluid image" alt="...">
            </a>
        </div>
        <div class="col-6 col-md-4 ">
            <a href="/hubungan">
                <img src="/images/hubungan.png"  class="img-fluid " alt="...">
            </a>
        </div>
        <div class="col-6 col-md-4 ">
            <a href="/umur">
                <img src="/images/umur.png"  style="display:block" class="img-fluid" alt="...">
            </a>
        </div>
    </div>
    <div class="text-center mt-5">
        <h1>Open SID</h1>
        <p class="mt-2">
            OpenSID  adalah Sistem Informasi Desa (SID) yang sengaja dibuat supaya terbuka dan dapat dikembangkan bersama-sama oleh komunitas peduli SID.

            SID diharapkan dapat membantu desa dalam beberapa hal berikut:

            kantor desa lebih efisien dan efektif
            pemerintah desa lebih transparan dan akuntabel
            layanan publik lebih baik
            warga mendapat akses lebih baik pada informasi desa
            OpenSID adalah aplikasi open source (sumber terbuka), yang:

            bebas diperoleh, tanpa pendaftaran atau hambatan apapun
            rutin disempurnakan, dan
            dikembangkan bersama-sama oleh komunitas peduli SID, di mana pengguna berperan langsung mengarahkan pengembangannya.
            OpenSID diharapkan dapat turut membantu agar ke semua 74ribu+ desa di Indonesia dapat menerapkan sistem informasi untuk memajukan desanya.

            OpenSID ada 2 versi rilis :

            Rilis Umum (GRATIS)
            Rilis Fitur Premium (Langganan)
        </p>
    </div>
</div>

@endsection