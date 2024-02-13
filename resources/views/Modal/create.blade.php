
<div class="col-md-6 col-12">
    <div class="card">
        {{-- <div class="card-header">
            <h4 class="card-title">Create data Products</h4>
        </div> --}}
        <div class="card-body">
            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true" data-bs-backdrop="false" >
                <div class="modal-dialog modal-dialog-scrollable" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel1">create data</h5>
                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form" action="{{ route('crudm.create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Nama Produk -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Masukan Nama Produk</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Nama Produk" name="nama">
                                            @error('nama')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <!-- Deskripsi Produk -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Deskripsi Produk</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
                                            @error('deskripsi')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <!-- Jenis -->
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Jenis</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Jenis"
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
                                            <input type="number" id="country-floating" class="form-control"
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
                                            <input type="text" id="company-column" class="form-control"
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
                                            <input type="file"  class="form-control"
                                                name="foto" placeholder="Foto">
                                            @error('foto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
            
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button  id="submitBtn" type="submit" class="btn btn-primary me-1 mb-1">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                <span class="loading-text">Submit</span>
                            </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@if ($errors->any() && session('showModal'))
    <script>
        $(document).ready(function () {
            $('#default').modal('show');
        });
    </script>
@endif