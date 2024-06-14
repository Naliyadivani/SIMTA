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

                    <table class="table" style="margin-bottom: 1rem;">
                        <tr style="border-color: transparent;">
                            <td>NAMA MAHASISWA</td>
                            <td>:</td>
                            <td>{{$dt['nama_mhs']}}</td>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{$dt['nim_mhs']}}</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td>NAMA PEMBIMBNG</td>
                            <td>:</td>
                            <td>{{$dt['nama_dospem']}}</td>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospem']}}</td>
                        </tr>
                    </table>

                    @php
                        $no = 1;
                    @endphp
                    @foreach ($dt['data_loop'] as $key => $val)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;border: 1px solid #000000;" class="text-start">NO. {{$no++}}</th>
                                    <th style="vertical-align: middle;border: 1px solid #000000;" class="text-center">HARI/ TANGGAL : {{\Carbon\Carbon::parse($val['tanggal'])->isoFormat('dddd, DD MMM YYYY')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                        <div class="row mb-3 w-100">
                                            <div class="col-12">
                                                <p>Hal yang menjadi perhatian :</p>
                                            </div>
                                            <div class="col-12">
                                                - {{$val['catatan']}}
                                            </div>
                                        </div>
                                        <div class="row mb-3 w-100">
                                            <div class="col-12">
                                                <p>Actual Plant :</p>
                                            </div>
                                            <div class="col-12">
                                                - {{$val['plant']}}
                                            </div>
                                        </div>
                                        <div class="row mb-3 w-100">
                                            <div class="col-10"></div>
                                            <div class="col-2 text-end">
                                                @if ($dt['ttd_dospem'] == '-' || $dt['ttd_dospem'] == null)
                                                    <img src="{{asset('assets/ttd/default.png')}}" alt="" style="width: 5rem;margin-right: 1.5rem;"><br>
                                                @else
                                                    <img src="{{asset('assets/ttd/'.$dt['ttd_dospem'])}}" alt="" style="width: 5rem;margin-right: 1.5rem;"><br>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row mb-3 w-100">
                                            <div class="col-10"></div>
                                            <div class="col-2 text-end">
                                                <p>Paraf Pembimbing</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>

        </main>
    </body>
</html>

