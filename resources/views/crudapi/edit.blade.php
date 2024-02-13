@extends('kerangka.master')
@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit data Product</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @foreach ($data as $item)
                        <form class="form" action="{{ route('crudapis.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Nama Produk -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Masukan Nama Produk</label>
                                        <input type="text" id="first-name-column" class="form-control"
                                            placeholder="Nama Produk" name="nama" value="{{ $item->nama }}">
                                        @error('nama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Deskripsi Produk -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Deskripsi Produk</label>
                                        <input type="text" class="form-control" value="{{ $item->deskripsi }}" name="deskripsi">
                                        @error('deskripsi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Jenis -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Jenis</label>
                                        <input type="text" value="{{ $item->jenis }}" id="city-column" class="form-control" placeholder="Jenis"
                                            name="jenis">
                                        @error('jenis')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Jumlah -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Jumlah</label>
                                        <input type="number " value="{{ $item->jumlah }}" id="country-floating" class="form-control"
                                            name="jumlah" placeholder="Jumlah">
                                        @error('jumlah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Satuan -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Satuan</label>
                                        <input type="text" value="{{ $item->satuan }}" id="company-column" class="form-control"
                                            name="satuan" placeholder="Satuan">
                                        @error('satuan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Foto -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file"   class="form-control"
                                            name="foto" placeholder="Foto">
                                        @error('foto')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="form-group col-12">
                                    <div class='form-check'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                            <label for="checkbox5">Remember Me</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Submit dan Kembali -->
                                <div class="col-12 d-flex justify-content-end">
                                    <button id="submitBtn" type="submit" class="btn btn-primary me-1 mb-1">
                                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span class="loading-text">Submit</span>
                                    </button>                                  
                                     <a href="{{ route('crudapis.index') }}">
                                        <button type="button" class="btn btn-light-secondary me-1 mb-1">Kembali</button>
                                    </a>                               
                                </div>
                            </div>
                        </form>                 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Handle form submission
        $('form').submit(function () {
            // Disable the submit button, show the loading spinner, and change the text
            $('#submitBtn').prop('disabled', true);
            $('#submitBtn .spinner-border').removeClass('d-none');
            $('#submitBtn .loading-text').text('Loading...');

            // You can also add other actions here if needed

            // Proceed with form submission
            return true;
        });
    });
</script>
@endsection