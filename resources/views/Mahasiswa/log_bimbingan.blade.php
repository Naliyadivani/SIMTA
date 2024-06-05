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
                            <span>List Log Bimbingan</span>
                            <button type="button" class="btn btn-success" data-name="add">LOG BIMBINGAN</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA DOSEN</th>
                                        <th>POSISI DOSEN</th>
                                        <th>TANGGAL BIMBINGAN</th>
                                        <th>CATATAN BIMBINGAN</th>
                                        <th>ACTION PLANT</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td rowspan="4">1</td>
                                        <td>h</td>
                                        <td>j</td>
                                        <td rowspan="4">k</td>
                                        <td rowspan="4">d</td>
                                        <td rowspan="4">e</td>
                                        <td rowspan="4">q</td>
                                    </tr>
                                    <tr>
                                        <td style="display:none;">1</td>
                                        <td>h</td>
                                        <td>j</td>
                                        <td style="display:none;">k</td>
                                        <td style="display:none;">d</td>
                                        <td style="display:none;">e</td>
                                        <td style="display:none;">q</td>
                                    </tr>
                                    <tr>
                                        <td style="display:none;">1</td>
                                        <td>h</td>
                                        <td>j</td>
                                        <td style="display:none;">k</td>
                                        <td style="display:none;">d</td>
                                        <td style="display:none;">e</td>
                                        <td style="display:none;">q</td>
                                    </tr>
                                    <tr>
                                        <td style="display:none;">1</td>
                                        <td>h</td>
                                        <td>j</td>
                                        <td style="display:none;">k</td>
                                        <td style="display:none;">d</td>
                                        <td style="display:none;">e</td>
                                        <td style="display:none;">q</td>
                                    </tr>
                                    {{-- @php
                                        $no = 1;
                                    @endphp
                                    @foreach($arr as $key => $val)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$val['name_mhs']}}</td>
                                            <td>{{$val['name_dospem1']}}</td>
                                            <td>{{$val['name_dospem2']}}</td>
                                            <td>{{$val['name_dospej1']}}</td>
                                            <td>{{$val['name_dospej2']}}</td>
                                            <td>{{$val['name_dospej3']}}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-info" data-name="edit" data-item="{{$val['id']}}">
                                                    <i class='bx bx-edit me-0'></i>
                                                </button>

                                                <button type="button" class="btn btn-outline-danger" data-name="delete" data-item="{{$val['id']}}">
                                                    <i class='bx bxs-trash me-0'></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- Modal Add --}}
<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD Bimbingan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card-style">
                            <div class="mb-3">
                                <label for="" class="form-label">TEMA</label>
                                <textarea name="" id="" cols="30"class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">TANGGAL</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="tanggal">
                            </div>

                            <hr style="margin-bottom: 0.5rem;margin-top: 0.5rem;">

                            <h6>Dosen Pembimbing 1 : </h6>

                            <div class="mb-3">
                                <label for="" class="form-label">CATATAN</label>
                                <textarea name="" id="" cols="30"class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">ACTION PLANT</label>
                                <textarea name="" id="" cols="30"class="form-control"></textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-name="save_add">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal ADD --}}

{{-- JS ADD Data --}}
<script>
    $(document).on("click", "[data-name='add']", function(e) {

        $("#modal_add").modal('show');
    });
</script>
{{-- End JS ADD Data --}}


{{-- JS Datepicker --}}
<script>
    $('input[data-name="tanggal"]').datepicker({
        format: "yyyy-mm-dd",
        viewMode: "days",
        minViewMode: "days",
        autoclose: true
    });
</script>
{{-- End JS Datepicker --}}


{{-- JS Datatable --}}
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "scrollY": "55vh",
            "scrollCollapse": true,
            "paging": false
        });
    });
</script>
{{-- End JS Datatable --}}

@stop
