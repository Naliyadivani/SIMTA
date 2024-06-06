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
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>MAHSISWA</th>
                                        <th>TEMA</th>
                                        <th>TANGGAL</th>
                                        <th>CATATAN BIMBINGAN</th>
                                        <th>ACTION PLANT</th>
                                        <th>STATUS</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($arr as $key => $val)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$val->nik}} - {{$val->name}}</td>
                                            <td>{{$val->tema}}</td>
                                            <td>{{ \Carbon\Carbon::parse($val->tanggal)->isoFormat('dddd, DD MMM YYYY') }}</td>
                                            <td>{{$val->catatan}}</td>
                                            <td>{{$val->plant}}</td>
                                            <td>
                                                @if ($val->status == 1)
                                                    <span class="badge bg-primary">Submitted</span>
                                                @elseif ($val->status == 2)
                                                    <span class="badge bg-success">Approved</span>
                                                @elseif ($val->status == 3)
                                                    <span class="badge bg-danger">Rejected</span>
                                                @else
                                                    <span class="badge bg-primary">Submitted</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-warning" data-name="" data-item="{{$val->id}}">
                                                    Approved Or Rejected
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
