@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Organisasi Masyarakat</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('organisasi.index') }}">Organisasi</a></div>
                <div class="breadcrumb-item"><a href="#">Management</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Manajemen Organisasi Masyarakat</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Tambah Organisasi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('organisasi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_organisasi">Nama Organisasi</label>
                            <input id="nama_organisasi" name="nama_organisasi" type="text" spellcheck="false" autocomplete="off"
                            class="form-control @error('nama_organisasi') is-invalid @enderror" value="{{ old('nama_organisasi') }}">
                            @error('nama_organisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_organisasi">Deskripsi Organisasi</label>
                            <input id="deskripsi_organisasi" name="deskripsi_organisasi" type="text" spellcheck="false" autocomplete="off"
                            class="form-control @error('deskripsi_organisasi') is-invalid @enderror" value="{{ old('deskripsi_organisasi') }}">
                            @error('deskripsi_organisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar_organisasi">Gambar Organisasi</label><br>
                            <img src="/assets/img/news/placeholder-image.jpg" class="prevGambar img-preview img-fluid mb-2" id="image-preview" style="height: 180px; width: 320px">
                            <input type="file" class="form-control @error('gambar_organisasi') is-invalid @enderror" id="gambar_organisasi"
                            name="gambar_organisasi" value="{{ old('gambar_organisasi') }}" spellcheck="false" autocomplete="off">
                            @error('gambar_organisasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('organisasi.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>

    <script>
		const inputImage = document.querySelector("#gambar_organisasi");
		const previewImage = document.querySelector("#image-preview.img-preview");

		const displayInputImage = () => {	
			previewImage.style.height = "180px";
			previewImage.style.aspectRatio = "9/16";
			const oFReader = new FileReader();
			oFReader.readAsDataURL(inputImage.files[0]);

			oFReader.onload = function (oFREvent) {
				previewImage.src = oFREvent.target.result;
			}
		}

		if (inputImage.files[0] != null) {	
			displayInputImage()
		}

		inputImage.addEventListener("change", displayInputImage) 
	</script>
@endsection
