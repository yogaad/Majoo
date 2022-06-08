@extends('backadmin.layouts.master')

@section('vendor-css')
 <!-- include summernote css/js -->
 <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('backadmin/theme/vendors/css/forms/select/select2.min.css') }}">   
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet"> 

    <style>
      

.dropzone {
    background: white;
    border-radius: 5px;
    /* max-width: 500px; */
    /* margin:50px  auto; */
    padding: 0 0;
    height: auto;
    min-height: 50px;
}


/* Custom css */
.dropzone.dz-clickable{
    cursor: pointer;
    background: #fafafa;
    color: #396E90;
    font-weight: 700;
    letter-spacing: 1px;
    font-family: 'Roboto', sans-serif;
    border:1px solid #cccccc;
    border-radius: 2px;
}
.dropzone .camera-img{
    display: inline-block;
    width: 20px;
    height: 20px;
    margin: 0 15px;
    position: absolute;
    left: 0;
}
.dropzone .img-circle{position: relative;display: inline-block;padding-left: 45px;}
.dropzone .camera-img img{
    width: 100%;
    height: 100%;
    display: block;
}
.dropzone .dz-preview .dz-details .dz-filename:hover span{
    border: 1px solid transparent; 
}
.dropzone .dz-message{margin: 15px;}
.dropzone .dz-preview .dz-details .dz-size{display: none;}
.dropzone .dz-preview .dz-details{
    height: 50px;
    min-height: 50px;
    padding:0;
    padding-left: 25px;
    text-align: left;
    display: flex;
    align-items: center;
    opacity: 1;
    justify-content: space-between;
}
.dropzone .dz-preview.image__open .dz-details{
    padding-left: 55px;
}
.dropzone .dz-preview{width: 100%;height: 50px;min-height: 50px;margin: 0;}
.dropzone .dz-preview .dz-progress{
    left: -1px;
    right: -1px;
    margin: 0;
    top: -5px;
    height: 5px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
    width: auto;
}
.dropzone .dz-preview .dz-image{
    height: 50px;
    width: 50px;
    border-radius: 0 !important;
    display: none;
}
.dropzone .dz-preview .dz-details .dz-filename{display:flex;}
.dropzone .dz-preview:hover .dz-image img{
    -webkit-transform:none;
    -moz-transform:none;
    -ms-transform:none;
    -o-transform:none;
     transform:none; 
     -webkit-filter: none; 
     filter: none; 
}
.dropzone .dz-preview .dz-image img{
     height: 100%;
     width: 100%;
}
.dropzone .dz-preview .dz-progress .dz-upload{
    background: #396E90;   
}
.dropzone .dz-preview .dz-error-message{
    top: auto;
    left: 0;
    background: linear-gradient(to bottom, #ff0000, #ff0000);
    background: #ff0000;
}
.dropzone .dz-preview .dz-error-message:after{
    border-bottom: 6px solid #ff0000;
}
.dropzone .dz-preview .dz-remove{
    color: #396E90;
    text-decoration: none;
    padding: 0 25px;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    z-index: 999999;
}
.dropzone .dz-preview .dz-remove:hover{
    text-decoration: none;
}
.dropzone .dz-preview.image__open .dz-image{display: block;}
.dropzone .dz-preview.image__open .uploading{display: none;}
        </style> 
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('backadmin.produk.index') }}">Produk</a></li>
@endsection

@section('actions')
<button type="submit" form="form-main" formaction="{{ $data->id ? route('backadmin.produk.update', $data->id) : route('backadmin.produk.store') }}" class="btn btn-primary" id="btn-save"><i class="mr-75" data-feather="save"></i>Simpan</button>
    @if($data->id)
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-delete"><i class="mr-75" data-feather="trash"></i>Hapus</button>
    @endif
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-text">
            <div id="app">
                <form id="form-main" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($data->id)
                        @method('PUT')
                    @endif
                    <section class="pr-form-main">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4>Informasi Umum</h4>
                        </div>
    
                        <div class="row">
                            
                            <div class="col-12 form-group" 
                            >
                                <label for="name" class="form-label required">Nama Produk</label>
                                <input type="text" 
                                    name="nama_produk"
                                    v-model="data.nama_produk" 
                                    class="form-control @error('nama_produk') {{ 'is-invalid' }} @enderror" 
                                    placeholder="Masukkan nama produk" autocomplete="off">
                                @error('nama_produk')
                                    <small class="text-danger">{{ $errors->first('nama_produk') }}</small>
                                @enderror
                            </div> 
                            <div class="col-12 form-group" 
                            >
                                <label for="name" class="form-label required">Deskripsi Produk</label>
                                <textarea  
                                    name="deskripsi_produk"
                                    v-model="data.deskripsi_produk" 
                                    class="form-control @error('deskripsi_produk') {{ 'is-invalid' }} @enderror summernote" 
                                    placeholder="Masukkan  Deskripsi" autocomplete="off" colspan="5"> </textarea>
                                @error('deskripsi_produk')
                                    <small class="text-danger">{{ $errors->first('deskripsi_produk') }}</small>
                                @enderror
                            </div> 
                              
                            <div class="col-12 form-group" 
                            >
                                <label for="name" class="form-label required">Harga Produk</label>
                                <input type="text" 
                                    name="harga_produk"
                                    v-model="data.harga_produk" 
                                    class="form-control @error('harga_produk') {{ 'is-invalid' }} @enderror" 
                                    placeholder="Masukkan nama harga produk" autocomplete="off">
                                @error('harga_produk')
                                    <small class="text-danger">{{ $errors->first('harga_produk') }}</small>
                                @enderror
                            </div> 
                            <div class="col-12 col-md-12 form-group">
                                <label for="id_kategori" class="form-label required">Nama Kategori</label>
                                <select
                                    name="id_kategori"
                                    class="form-control @error('id_kategori') {{ 'is-invalid' }} @enderror">
                                </select>
                                @error('id_kategori')
                                    <small class="text-danger">{{ $errors->first('id_kategori') }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-md-12 form-group">
                                <label for="id_kategori" class="form-label required">Upload Foto</label>
                            <input type="hidden" name="id_resume_file_url" id="id_resume_file_url">
                            <input type="hidden" name="image" id="image">
                            <section>
                                <div id="dropzone"> 
                                    <div class=" dropzone needsclick demo-upload">
                                         <div class="dz-message needsclick">
                                            <div class=" img-circle"> <i class="camera-img"> </i>Choose photo</div>
                                        </div>
                                    </div>
                                </div>
                    
                    
                            </section>
                            
                            <div id="preview-template" style="display: none;">
                                <div class="dz-preview dz-file-preview">
                                    <div class="dz-image"><img data-dz-thumbnail=""></div>
                                    <div class="dz-details">
                                        <div class="dz-filename"><span class="uploading">Uploading - </span><span data-dz-name=""></span></div>
                                    </div>
                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                    <div class="dz-error-message"><span data-dz-errormessage=""></span></div>
                                </div>
                            </div>
                            @error('image')
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                        @enderror
                        </div>
                        </div><!-- .row -->
                    </section><!-- .pr-form-main -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modal')
    @if ($data->id)
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('backadmin.produk.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalDelete">Konfirmasi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin akan menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary">Ya, Hapus</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endpush

@section('vendor-js')
    <script src="{{ asset('backadmin/theme/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('backadmin/vendors/vue/vue.global.js') }}"></script>
    <script src="{{ asset('backadmin/app/js/helper.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
@endsection

@push('page-js') 
<script>
    let form = Vue.createApp({
        data() {
            return {
                data: {

                },
                
            }
        },
        created() {
            old = {!! json_encode(old()) !!};
            data = {!! json_encode($data) !!};
            this.data = {
                nama_produk: old.nama_produk ?? data.nama_produk ?? '',
                deskripsi_produk: old.deskripsi_produk ?? data.deskripsi_produk ?? '',
                harga_produk: old.harga_produk ?? data.harga_produk ?? '', 
                id_kategori: old.id_kategori ?? data.id_kategori ?? 0,
              
            }
            if(this.data.id_kategori)
                initS2FieldWithAjax('[name=id_kategori]', "{{ route('backadmin.s2Init.edit-kategori')}}", {
                    id: this.data.id_kategori
                }, ['nama_kategori']);
     
                
          
             
        },
        mounted() {
            $(".img-circle").text(data.image);
            $("#id_resume_file_url").val(data.image);
            $('.summernote').summernote({}); 
            //select
            $('[name=id_kategori]').select2({
                ajax: {
                    url: "{{ route('backadmin.s2Opt.kategori-produks') }}",
                    data: function(params) {
                        let query = {
                            q: params.term
                        };
                        return query;
                    },
                    processResults: function(data) {
                        return { results: data }
                    }
                },
                minimumInputLength: 2,
                placeholder: 'Masukkan Nama Kategori',
                templateResult: function(data) {
                    return data.loading ? 'Mencari...' : data.nama_kategori;
                },
                templateSelection: function(data) {
                    return data.text || data.nama_kategori;
                },
                width: '100%'
            }).on('select2:select', function(e) {
                form.data.id_kategori = e.target.value;
            });
            //dropzone
            var dropzone = new Dropzone('.demo-upload', {
                url: "/upload/", 
  maxFilesize: 4,
  addRemoveLinks: true,
  acceptedFiles: ".jpeg, .jpg, .png, .gif, .WebP, .svg",
  previewTemplate: document.querySelector('#preview-template').innerHTML,
  parallelUploads: 2,
  thumbnailHeight: 308,
  thumbnailWidth: 308,
  maxFilesize: 1,
  filesizeBase: 100000000000,
  success: function(file, response) {
   file.previewElement.classList.add("image__open");
 },
 thumbnail: function(file, dataUrl) {
  if (file.previewElement) {
    file.previewElement.classList.remove("dz-file-preview");
    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
    for (var i = 0; i < images.length; i++) {
      var thumbnailElement = images[i];
      thumbnailElement.alt = file.name;
      thumbnailElement.src = dataUrl;
    }
    setTimeout(function() { file.previewElement.classList.add("dz-image-preview"); $("#image").val(dataUrl)}, 800);
  }
  
}

});


// Now fake the file upload, since GitHub does not handle file uploads
// and returns a 404

var minSteps = 6,
maxSteps = 100,
timeBetweenSteps = 300,
bytesPerStep = 10000;

dropzone.uploadFiles = function(files) {
  var self = this;

  for (var i = 0; i < files.length; i++) {

    var file = files[i];
    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

    for (var step = 0; step < totalSteps; step++) {
      var duration = timeBetweenSteps * (step + 1);
      setTimeout(function(file, totalSteps, step) {
        return function() {
          file.upload = {
            progress: 100 * (step + 1) / totalSteps,
            total: file.size,
            bytesSent: (step + 1) * file.size / totalSteps
          };

          self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
          if (file.upload.progress == 100) {
            file.status = Dropzone.SUCCESS;
            self.emit("success", file, 'success', null);
            self.emit("complete", file);
            self.processQueue();
          }
        };
      }(file, totalSteps, step), duration);
    }
  }
}
           
        },
        computed: {

        }
    }).mount('#app');
</script>
@endpush

