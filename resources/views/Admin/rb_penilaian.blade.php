@extends('main')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{$title}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row align-items-top">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>List Kelola Dosen</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA MAHASISWA</th>
                                        <th>PEMBIMBING 1</th>
                                        <th>PEMBIMBING 2</th>
                                        <th>PENGUJI 1</th>
                                        <th>PENGUJI 2</th>
                                        <th>PENGUJI 3</th>
                                        <th>NILAI AKHIR</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($arr as $key => $val)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$val['name_mhs']}}</td>
                                            <td>
                                                Nilai Bimbingan : {{($val['nib1'])}} <br>
                                                Nilai Sidang : {{($val['nij1'])}} <br>
                                            </td>
                                            <td>
                                                Nilai Bimbingan : {{($val['nib2'])}} <br>
                                                Nilai Sidang : {{($val['nij2'])}} <br>
                                            </td>
                                            <td>
                                                Nilai Sidang : {{($val['nipj1'])}}
                                            </td>
                                            <td>
                                                Nilai Sidang : {{($val['nipj2'])}}
                                            </td>
                                            <td>
                                                Nilai Sidang : {{($val['nipj3'])}}
                                            </td>
                                            <td class="text-center">{{$val['nilai_akhir']}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-success btn-sm" data-name="" data-item="{{$val['id']}}">
                                                    <i class="bi bi-cloud-download"></i>Unduh PDF
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- JS Datatable --}}
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- End JS Datatable --}}

{{-- Select2 --}}
<script>
    $(".select-2-add").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_add")
    });

    $(".select-2-edit").select2({
        allowClear: false,
        width: '100%',
        dropdownParent: $("#modal_edit")
    });
</script>
{{-- End Select2 --}}


@stop
