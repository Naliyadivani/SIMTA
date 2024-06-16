<html>
    <head>
        <link href="{{public_path('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <main id="main" class="main">

            <div class="card">
                <div class="card-body" style="padding: 1rem 1.5rem;">
                    <table class="table w-100">
                        <tr>
                            <td style="border: 1px solid #000000" class="text-center">
                                <img src="{{public_path('pictures/Logo_UPER.png')}}" alt="" style="width: 7rem">
                            </td>
                            <td style="border: 1px solid #000000" class="text-center p-3 d-flex align-items-center justify-content-center flex-wrap">
                                <p style="width: 100%;margin: 0rem;font-size: 1.2rem;">Form TA-6 Berita Acara Sidang Tugas Akhir</p><br>
                                <p style="width: 100%;margin: 0rem;font-size: 1.5rem;font-weight: bold;">FAKULTAS SAINS DAN ILMU KOMPUTER</p><br>
                                <p style="width: 100%;margin: 0rem;font-size: 1.5rem;font-weight: bold;">PROGRAM STUDI ILMU KOMPUTER</p>
                            </td>
                        </tr>
                    </table>

                    <p style="width: 100%;margin: 0rem;font-size: 1.3rem;font-weight: bold;margin-bottom: 2rem;" class="text-center">REKAPITULASI NILAI SIDANG TUGAS AKHIR</p>

                    <table class="table" style="margin-bottom: 5rem;">
                        <tr style="border-color: transparent;">
                            <td>Nama Mahasiswa</td>
                            <td>:</td>
                            <td colspan="4">{{$dt['nama_mhs']}}</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{$dt['nim_mhs']}}</td>
                            <td>Tanggal Sidang</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($dt['tanggal_sidang'])->isoFormat('DD MMM YYYY')}}</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td>Judul Tugas Akhir</td>
                            <td>:</td>
                            <td colspan="4">{{$dt['judul']}}</td>
                        </tr>
                    </table>

                    <table class="table mb-0">
                        <tr style="border-color: transparent;">
                            <td colspan="6">Dengan Tim Penguji ( Ketua Dan Para Anggota )</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td>Pembimbing 1</td>
                            <td>:</td>
                            <td>{{$dt['dospem1']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospem1']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Pembimbing 2</td>
                            <td>:</td>
                            <td>{{$dt['dospem2']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospem2']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Penguji 1</td>
                            <td>:</td>
                            <td>{{$dt['dospej1']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospej1']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Penguji 2</td>
                            <td>:</td>
                            <td>{{$dt['dospej2']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospej2']}}</td>
                        </tr>

                        <tr style="border-color: transparent;">
                            <td>Penguji 3</td>
                            <td>:</td>
                            <td>{{$dt['dospej3']}}</td>
                            <td>NIP</td>
                            <td>:</td>
                            <td>{{$dt['nip_dospej3']}}</td>
                        </tr>
                        <tr style="border-color: transparent;">
                            <td colspan="6">Memberikan nilai Sebagain Berikut</td>
                        </tr>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;border: 1px solid #000000;" class="text-center">NO</th>
                                <th style="vertical-align: middle;border: 1px solid #000000;" class="text-center">JABATAN & JENIS PENILAIAN</th>
                                <th style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    NILAI <br>
                                    SKALA 100
                                </th>
                                <th style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    BOBOT <br>
                                    (%)
                                </th>
                                <th style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    NILAI DENGAN<br>
                                    PEMBOBOTAN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">1</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Pembimbing 1: NIlai Bimbingan</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem1'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_bim1']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem1'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot1']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem1'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_bim1']*$dt['bobot1']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">2</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Pembimbing 1: NIlai Sidang</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem1'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_sid1']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem1'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot2']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem1'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_sid1']*$dt['bobot2']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">3</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Pembimbing 2: NIlai Bimbingan</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem2'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_bim2']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem2'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot1']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem2'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_bim2']*$dt['bobot1']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">4</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Pembimbing 2: NIlai Sidang</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem2'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_sid2']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem2'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot2']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospem2'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpem_sid2']*$dt['bobot2']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">5</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Penguji 1</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej1'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpej_uji1']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej1'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot3']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej1'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpej_uji1']*$dt['bobot3']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">6</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Penguji 2</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej2'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpej_uji2']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej2'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot3']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej2'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpej_uji2']*$dt['bobot3']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">7</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;">Penguji 3</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej3'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpej_uji3']}}
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej3'] == '-')
                                        -
                                    @else
                                        {{$dt['bobot3']*100}}%
                                    @endif
                                </td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                    @if ($dt['dospej3'] == '-')
                                        -
                                    @else
                                        {{$dt['nkpej_uji3']*$dt['bobot3']}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-end" colspan="4">Nilai Akhir</td>
                                <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">{{$dt['nilai_akhir']}}</td>
                            </tr>
                            <tr>
                                <td colspan="5">Keterangan: Bila pembimbing hanya 1 maka bobot nilai bimbingan 50% dan bobot nilai sidang 10%</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table">
                        <tr>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem1'] == '-' || $dt['ttd_dospem1'] == null)
                                    <img src="{{public_path('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{public_path('assets/ttd/'.$dt['ttd_dospem1'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospem1']}}</span><br>
                                <span>NIP : {{$dt['nip_dospem1']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem2'] == '-' || $dt['ttd_dospem2'] == null)
                                    <img src="{{public_path('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{public_path('assets/ttd/'.$dt['ttd_dospem2'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospem2']}}</span><br>
                                <span>NIP : {{$dt['nip_dospem2']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem3'] == '-' || $dt['ttd_dospem3'] == null)
                                    <img src="{{public_path('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{public_path('assets/ttd/'.$dt['ttd_dospem3'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospej1']}}</span><br>
                                <span>NIP : {{$dt['nip_dospej1']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem4'] == '-' || $dt['ttd_dospem4'] == null)
                                    <img src="{{public_path('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{public_path('assets/ttd/'.$dt['ttd_dospem4'])}}" alt="" style="width: 5rem;"><br>
                                @endif

                                <span>Nama : {{$dt['dospej2']}}</span><br>
                                <span>NIP : {{$dt['nip_dospej2']}}</span>
                            </td>
                            <td style="vertical-align: middle;border: 1px solid #000000;" class="text-center">
                                @if ($dt['ttd_dospem5'] == '-' || $dt['ttd_dospem5'] == null)
                                    <img src="{{public_path('assets/ttd/default.png')}}" alt="" style="width: 5rem;"><br>
                                @else
                                    <img src="{{public_path('assets/ttd/'.$dt['ttd_dospem5'])}}" alt="" style="width: 5rem;"><br>
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

