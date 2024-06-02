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
                            <button type="button" class="btn btn-success" data-name="add">KELOLA DOSEN</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIP</th>
                                        <th>NAME</th>
                                        <th>NO TLP</th>
                                        <th>EMAIL</th>
                                        <th>PASSWORD</th>
                                        <th>TTD</th>
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
                                            <td>{{$val->nik}}</td>
                                            <td>{{$val->name}}</td>
                                            <td>{{$val->no_tlp}}</td>
                                            <td>{{$val->email}}</td>
                                            <td>*** *** ***</td>
                                            <td>
                                                @if($val->ttd == '-')
                                                    <span class="badge bg-danger">Belum Upload</span>
                                                @else
                                                    <span class="badge bg-success">Sudah Upload</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-outline-primary" data-name="upload_ttd" data-item="{{$val->id}}">
                                                    <i class="bi bi-upload me-0"></i>
                                                </button>

                                                <button type="button" class="btn btn-outline-info" data-name="edit" data-item="{{$val->id}}">
                                                    <i class='bx bx-edit me-0'></i>
                                                </button>

                                                <button type="button" class="btn btn-outline-danger" data-name="delete" data-item="{{$val->id}}">
                                                    <i class='bx bxs-trash me-0'></i>
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

@stop