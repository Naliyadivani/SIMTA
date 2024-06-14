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
                        tahun {{\Carbon\Carbon::parse($dt['tanggal_sidang'])->translatedFormat('Y')}} secara luring di R. ___________ Universitas Pertamina telah dilaksanakan Sidang Tugas Akhir mahasiswa :
                    </p>


                    <table class="table" style="margin-bottom: 5rem;">
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
                            <td>Judul Tugas Akhir</td>
                            <td>:</td>
                            <td>{{$dt['judul']}}</td>
                        </tr>
                    </table>

                    <table class="table mb-0">
                        <tr style="border-color: transparent;">
                            <td colspan="6">Dengan Tim Penguji ( Ketua Dan Para Anggota )</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Ketua</td>
                            <td>:</td>
                            <td>{{$dt['dospej1']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospej1']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Anggota 1</td>
                            <td>:</td>
                            <td>{{$dt['dospej2']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospej2']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Anggota 2</td>
                            <td>:</td>
                            <td>{{$dt['dospej3']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospej3']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Anggota 3</td>
                            <td>:</td>
                            <td>{{$dt['dospem1']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospem1']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Anggota 4</td>
                            <td>:</td>
                            <td>{{$dt['dospem2']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospem2']}}</td>
                        </tr>
                    </table>

                    <p style="width: 100%;margin: 0rem;font-size: 1rem;margin-bottom: 1rem;" class="text-start">
                        Adapun hasil Sidang Tugas Akhir-Nya adalah <span class="fw-bold">{{$dt['hasil_sidang']}}</span>.
                    </p>

                    <p style="width: 100%;margin: 0rem;font-size: 1rem;margin-bottom: 0rem;" class="text-start">
                        Berdasarkan proses Sidang Tugas Akhir, Tim Penguji bersepakat memberikan masukan dan catatan kepada mahasiswa tersebut di atas sebagai berikut :
                    </p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2" style="vertical-align: middle;border: 1px solid #000000;" class="text-start">
                                    <div class="row mb-3 w-100">
                                        <div class="col-12">
                                            - {{$dt['catatan']}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p style="width: 100%;margin: 0rem;font-size: 1rem;margin-bottom: 0rem;" class="text-center">Jakarta, {{\Carbon\Carbon::parse($dt['tanggal_sidang'])->translatedFormat('j F Y')}} <br> Tim Penguji </p>
                    <table class="table">
                        <tr>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem1'] == '-' || $dt['ttd_dospem1'] == null)
                                    <img src="{{asset('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{asset('assets/ttd/'.$dt['ttd_dospem1'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospem1']}}</span><br>
                                <span>NIP : {{$dt['nip_dospem1']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem2'] == '-' || $dt['ttd_dospem2'] == null)
                                    <img src="{{asset('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{asset('assets/ttd/'.$dt['ttd_dospem2'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospem2']}}</span><br>
                                <span>NIP : {{$dt['nip_dospem2']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem3'] == '-' || $dt['ttd_dospem3'] == null)
                                    <img src="{{asset('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{asset('assets/ttd/'.$dt['ttd_dospem3'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospej1']}}</span><br>
                                <span>NIP : {{$dt['nip_dospej1']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem4'] == '-' || $dt['ttd_dospem4'] == null)
                                    <img src="{{asset('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{asset('assets/ttd/'.$dt['ttd_dospem4'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospej2']}}</span><br>
                                <span>NIP : {{$dt['nip_dospej2']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem5'] == '-' || $dt['ttd_dospem5'] == null)
                                    <img src="{{asset('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{asset('assets/ttd/'.$dt['ttd_dospem5'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospej3']}}</span><br>
                                <span>NIP : {{$dt['nip_dospej3']}}</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </main>
    </body>
</html>

