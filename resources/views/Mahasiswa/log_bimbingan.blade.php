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
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($arr as $key => $val)
                                        @php
                                            $ns = $no++;
                                            $dt = DB::table('trx_detail_log_bimbingan')->select('trx_detail_log_bimbingan.*', 'b.name', 'b.nik')
                                                    ->leftJoin('users AS b', 'b.id', '=', 'trx_detail_log_bimbingan.id_dospem')
                                                    ->where('trx_detail_log_bimbingan.id_log', $val->id)->where('trx_detail_log_bimbingan.is_active', 1)->get();
                                            $cn = count($dt);
                                        @endphp
                                        @foreach ($dt as $k => $v)
                                            <tr>
                                                @if ($k == 0)
                                                    <td rowspan="{{$cn}}" class="text-center">{{$ns}}</td>
                                                @else
                                                    <td style="display: none">{{$ns}}</td>
                                                @endif
                                                <td>{{$v->nik}} - {{$v->name}}</td>
                                                <td>{{$v->posisi}}</td>
                                                @if ($k == 0)
                                                    <td rowspan="{{$cn}}">{{ \Carbon\Carbon::parse($val->tanggal)->isoFormat('dddd, DD MMM YYYY') }}</td>
                                                @else
                                                    <td style="display: none">{{$val->tanggal}}</td>
                                                @endif
                                                <td>{{$v->catatan}}</td>
                                                <td>{{$v->plant}}</td>
                                                @if ($v->status == 1)
                                                    <td><span class="badge bg-primary">Submitted</span></td>
                                                @elseif ($v->status == 2)
                                                    <td><span class="badge bg-success">Approved</span></td>
                                                @elseif ($v->status == 3)
                                                    <td><span class="badge bg-danger">Rejected</span></td>
                                                @else
                                                    <td><span class="badge bg-primary">Submitted</span></td>
                                                @endif
                                            </tr>
                                        @endforeach
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

{{-- Modal Add --}}
<div class="modal fade" id="modal_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
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
                                <textarea name="" id="" cols="30"class="form-control" data-name="tema"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">TANGGAL</label>
                                <input type="text" class="form-control" id="" placeholder="" data-name="tanggal">
                            </div>

                            <hr style="margin-bottom: 0.5rem;margin-top: 0.5rem;">

                            <div class="row">
                                <div class="col-6">

                                    @if ($setdospem->id_dospem_1 > 0)
                                        <h6>Dosen Pembimbing 1 : </h6>
                                        <input type="hidden" data-name="id_dospem[]" value="{{$setdospem->id_dospem_1}}">
                                        <input type="hidden" data-name="posisi[]" value="Pembimbing 1">
                                        <div class="mb-3">
                                            <label for="" class="form-label">CATATAN</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="catatan[]"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">ACTION PLANT</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="plant[]"></textarea>
                                        </div>
                                    @endif

                                    @if ($setdospem->id_dospem_2 > 0)
                                        <hr style="margin-bottom: 0.5rem;margin-top: 0.5rem;">

                                        <h6>Dosen Pembimbing 2 : </h6>
                                        <input type="hidden" data-name="id_dospem[]" value="{{$setdospem->id_dospem_2}}">
                                        <input type="hidden" data-name="posisi[]" value="Pembimbing 2">
                                        <div class="mb-3">
                                            <label for="" class="form-label">CATATAN</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="catatan[]"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">ACTION PLANT</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="plant[]"></textarea>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-6">

                                    @if ($setdospem->id_dospej_1 > 0)
                                        <h6>Dosen Penguji 1 : </h6>
                                        <input type="hidden" data-name="id_dospem[]" value="{{$setdospem->id_dospej_1}}">
                                        <input type="hidden" data-name="posisi[]" value="Penguji 1">
                                        <div class="mb-3">
                                            <label for="" class="form-label">CATATAN</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="catatan[]"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">ACTION PLANT</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="plant[]"></textarea>
                                        </div>
                                    @endif

                                    @if ($setdospem->id_dospej_2 > 0)
                                        <hr style="margin-bottom: 0.5rem;margin-top: 0.5rem;">

                                        <h6>Dosen Penguji 2 : </h6>
                                        <input type="hidden" data-name="id_dospem[]" value="{{$setdospem->id_dospej_2}}">
                                        <input type="hidden" data-name="posisi[]" value="Penguji 2">
                                        <div class="mb-3">
                                            <label for="" class="form-label">CATATAN</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="catatan[]"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">ACTION PLANT</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="plant[]"></textarea>
                                        </div>
                                    @endif

                                    @if ($setdospem->id_dospej_3 > 0)
                                        <hr style="margin-bottom: 0.5rem;margin-top: 0.5rem;">

                                        <h6>Dosen Penguji 3 : </h6>
                                        <input type="hidden" data-name="id_dospem[]" value="{{$setdospem->id_dospej_3}}">
                                        <input type="hidden" data-name="posisi[]" value="Penguji 3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">CATATAN</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="catatan[]"></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">ACTION PLANT</label>
                                            <textarea name="" id="" cols="30"class="form-control" data-name="plant[]"></textarea>
                                        </div>
                                    @endif

                                </div>
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
        $("[data-name='tema']").val('');
        $("[data-name='tanggal']").val('');
        $("[data-name='catatan[]']").val('');
        $("[data-name='plant[]']").val('');
        $("#modal_add").modal('show');
    });

    $(document).on("click", "[data-name='save_add']", function(e) {
        var id_mhs      = "{!! $idnusr->id !!}";
        var tema        = $("[data-name='tema']").val();
        var tanggal     = $("[data-name='tanggal']").val();
        var id_dospem   = [];
        var posisi      = [];
        var catatan     = [];
        var plant       = [];
        var detail      = [];

        $('input[data-name="id_dospem[]"]').each(function(){
            var content = $(this).val();
            id_dospem.push(content);
        });

        $('input[data-name="posisi[]"]').each(function(){
            var content = $(this).val();
            posisi.push(content);
        });

        $('textarea[data-name="catatan[]"]').each(function(){
            var content = $(this).val();
            catatan.push(content);
        });

        $('textarea[data-name="plant[]"]').each(function(){
            var content = $(this).val();
            plant.push(content);
        });

        var x = 0;
        $('input[data-name="id_dospem[]"]').each(function(){
            detail.push({
                'id_dospem': id_dospem[x],
                'posisi': posisi[x],
                'catatan': catatan[x],
                'plant': plant[x],
            });
            x++;
        });

        if (id_mhs === '' || tema === '' || tanggal === '') {
            Swal.fire({
                position: 'center',
                title: 'Form is empty!',
                icon: 'error',
                showConfirmButton: false,
                timer: 1000
            })
        } else {
            $.ajax({
                type: "POST",
                url: "{{route('add_log_bimbingan_mhs')}}",
                data: {
                    id_mhs: id_mhs,
                    tema: tema,
                    tanggal: tanggal,
                    detail: detail
                },
                cache: false,
                success: function(response) {
                    // console.log(response);
                    Swal.fire({
                        position: 'center',
                        title: 'Success!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((response) => {
                        location.reload();
                    })
                },
                error: function(response) {
                    Swal.fire({
                        position: 'center',
                        title: 'Action Not Valid!',
                        icon: 'warning',
                        showConfirmButton: true,
                        // timer: 1500
                    }).then((response) => {
                        // location.reload();
                    })
                }
            });
        }
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
