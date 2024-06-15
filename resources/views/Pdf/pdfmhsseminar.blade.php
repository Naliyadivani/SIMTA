<html>
    <head>
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <main id="main" class="main">

            <div class="card">
                <div class="card-body" style="padding: 1rem 1.5rem;">
                    <table class="table w-100">
                        <tr>
                            <td style="border: 1px solid #000000" class="text-center">
                                <img src="{{asset('pictures/Logo_UPER.png')}}" alt="" style="width: 7rem">
                            </td>
                            <td style="border: 1px solid #000000" class="text-center p-3 d-flex align-items-center justify-content-center flex-wrap">
                                <p style="width: 100%;margin: 0rem;font-size: 1.2rem;">Form TA-6 Berita Acara Sidang Tugas Akhir</p><br>
                                <p style="width: 100%;margin: 0rem;font-size: 1.5rem;font-weight: bold;">FAKULTAS SAINS DAN ILMU KOMPUTER</p><br>
                                <p style="width: 100%;margin: 0rem;font-size: 1.5rem;font-weight: bold;">PROGRAM STUDI ILMU KOMPUTER</p>
                            </td>
                        </tr>
                    </table>

                    {{-- <td>Tanggal Sidang</td>
                    <td>:</td>
                    <td>{{\Carbon\Carbon::parse($dt['tanggal_sidang'])->isoFormat('DD MMM YYYY')}}</td> --}}

                    <p style="width: 100%;margin: 0rem;font-size: 1.3rem;font-weight: bold;margin-bottom: 1rem;" class="text-center">NOMOR :_______________________________________</p><br>
                    <p style="width: 100%;margin: 0rem;font-size: 1rem;margin-bottom: 2rem;" class="text-start">
                        Pada hari ini {{\Carbon\Carbon::parse($dt['tanggal_sidang'])->translatedFormat('l')}}
                        tanggal {{\Carbon\Carbon::parse($dt['tanggal_sidang'])->translatedFormat('j')}}
                        bulan {{\Carbon\Carbon::parse($dt['tanggal_sidang'])->translatedFormat('F')}}
                        tahun {{\Carbon\Carbon::parse($dt['tanggal_sidang'])->translatedFormat('Y')}} telah dilaksanakan Seminar Kemajuan Tugas Akhir mahasiswa :
                    </p>


                    <table class="table" style="margin-bottom: 2rem;">
                        <tr style="border-color: transparent;">
                            <td>Nama Mahasiswa</td>
                            <td>:</td>
                            <td>{{$dt['nama_mhs']}}</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{$dt['nim_mhs']}}</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td>Team Tugas Akhir</td>
                            <td>:</td>
                            <td>{{$dt['judul']}}</td>
                        </tr>
                    </table>

                    <p style="width: 100%;margin: 0rem;font-size: 1rem;margin-bottom: 1rem;" class="text-start">
                        Adapun hasil Seminar Kemajuan Tugas Akhir adalah <span class="fw-bold">Diterima</span>.
                    </p>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Catatan Dosen Pembimbing 1 :
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_catatan_1']))
                                                {{$dt['data']['dt_dospem_catatan_1']}}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Tanda Tangan
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_ttd_1']))
                                                <img src="{{asset('assets/ttd/'.$dt['data']['dt_dospem_ttd_1'])}}" alt="" style="width: 5rem;"><br>
                                                <span>Nama : {{$dt['data']['dt_dospem_name_1']}}</span><br>
                                                <span>NIP : {{$dt['data']['dt_dospem_nip_1']}}</span>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Catatan Dosen Pembimbing 2 :
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_catatan_2']))
                                                {{$dt['data']['dt_dospem_catatan_2']}}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Tanda Tangan
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_ttd_2']))
                                                <img src="{{asset('assets/ttd/'.$dt['data']['dt_dospem_ttd_2'])}}" alt="" style="width: 5rem;"><br>
                                                <span>Nama : {{$dt['data']['dt_dospem_name_2']}}</span><br>
                                                <span>NIP : {{$dt['data']['dt_dospem_nip_2']}}</span>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Catatan Dosen Penguji 1 :
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_catatan_3']))
                                                {{$dt['data']['dt_dospem_catatan_3']}}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Tanda Tangan
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_ttd_3']))
                                                <img src="{{asset('assets/ttd/'.$dt['data']['dt_dospem_ttd_3'])}}" alt="" style="width: 5rem;"><br>
                                                <span>Nama : {{$dt['data']['dt_dospem_name_3']}}</span><br>
                                                <span>NIP : {{$dt['data']['dt_dospem_nip_3']}}</span>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Catatan Dosen Penguji 2 :
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_catatan_4']))
                                                {{$dt['data']['dt_dospem_catatan_4']}}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Tanda Tangan
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_ttd_4']))
                                                <img src="{{asset('assets/ttd/'.$dt['data']['dt_dospem_ttd_4'])}}" alt="" style="width: 5rem;"><br>
                                                <span>Nama : {{$dt['data']['dt_dospem_name_4']}}</span><br>
                                                <span>NIP : {{$dt['data']['dt_dospem_nip_4']}}</span>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Catatan Dosen Penguji 3 :
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_catatan_5']))
                                                {{$dt['data']['dt_dospem_catatan_5']}}
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            Tanda Tangan
                                        </div>
                                        <div class="col-12">
                                            @if (isset($dt['data']['dt_dospem_ttd_5']))
                                                <img src="{{asset('assets/ttd/'.$dt['data']['dt_dospem_ttd_5'])}}" alt="" style="width: 5rem;"><br>
                                                <span>Nama : {{$dt['data']['dt_dospem_name_5']}}</span><br>
                                                <span>NIP : {{$dt['data']['dt_dospem_nip_5']}}</span>
                                            @else
                                                -
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>

