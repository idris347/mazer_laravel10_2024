@extends('kerangka.master')
@section('title')
@endsection
@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Crud Biasa</h3>
            <p class="text-subtitle text-muted">Crud standar yang biasa di gunakan</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card">
    @if (session('success'))
    <div id="i" class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-header">
        <a href="javascript:void(0)" class="btn btn-primary mb-2" id="btn-create-post">TAMBAH DATA</a>
    </div>
    @php
        $no = 1;
    @endphp
    <section class="section">
        <div class="card-body">
            <table class="table table-hover"  id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>deskripsi</th>
                        <th>jenis</th>
                        @if (Auth::user()->is_admin && Auth::check())
                        <th>nama penulis</th>
                        @endif
                        <th>satuan</th>
                        <th>jumlah</th>
                        <th>foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->jenis }}</td>
                            @if (Auth::user()->is_admin && Auth::check())
                            <th>{{ $item->user_name }}</th>
                            @endif
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td data-bs-toggle="modal" data-bs-target="#galleryModal">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#galleryModal"
                                    onclick="previewImage('{{ url('/data_file/' . $item->foto) }}')">
                                    <img width="75px" height="75px" src="{{ url('/data_file/' . $item->foto) }}"
                                        alt="Photo">
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $item->id }}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="btn icon btn-danger delete-product" data-product-id="{{ $item->id }}"><i class="bi bi-trash"></i></button>
                                <form id="delete-form-{{$item->id}}" action="{{ route('crudb.destroy',$item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="galleryModalTitle">Image Preview</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="previewImage" class="d-block w-100" src="" alt="Preview">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cruda.modal-create')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // Function to set the image source when clicking on a photo
    function previewImage(imageSrc) {
        document.getElementById('previewImage').src = imageSrc;
    }

</script>

@endsection
