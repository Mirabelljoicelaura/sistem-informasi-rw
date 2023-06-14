@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Agenda Sosial</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('agenda.index') }}">Agenda</a></div>
                <div class="breadcrumb-item"><a href="#">Management</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Manajemen Agenda Sosial</h2>

            <div class="card">
                <div class="card-header">
                    <h4>Validasi Edit Agenda</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('agenda.update', $agenda) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="judul_agenda">Nama Agenda</label>
                            <input id="judul_agenda" name="judul_agenda" type="text" spellcheck="false" autocomplete="off"
                            class="form-control @error('judul_agenda') is-invalid @enderror"
                                value="{{ old('judul_agenda', $agenda->judul_agenda) }}">
                            @error('judul_agenda')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_agenda">Tanggal Agenda</label>
                            <input id="tanggal_agenda" name="tanggal_agenda" type="date" spellcheck="false" autocomplete="off"
                            class="form-control @error('tanggal_agenda') is-invalid @enderror"
                                value="{{ old('tanggal_agenda', $agenda->tanggal_agenda) }}">
                            @error('tanggal_agenda')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_agenda">Deskripsi Agenda</label>
                            <input id="deskripsi_agenda" name="deskripsi_agenda" type="text" spellcheck="false" autocomplete="off"
                            class="form-control @error('deskripsi_agenda') is-invalid @enderror"
                                value="{{ old('deskripsi_agenda', $agenda->deskripsi_agenda) }}">
                            @error('deskripsi_agenda')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar_agenda">Gambar Agenda</label><br>
                            <img src="/assets/img/agenda/{{ $agenda->gambar_agenda }}" alt="{{ $agenda->gambar_agenda }}" class="prevGambar img-preview mb-2" id="image-preview" style="height: 180px; width: 320px">
                            <input id="gambar_agenda" name="gambar_agenda" type="file" spellcheck="false" autocomplete="off"
                            class="form-control @error('gambar_agenda') is-invalid @enderror"
                                value="{{ old('gambar_agenda', $agenda->gambar_agenda) }}">
                            @error('gambar_agenda')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('agenda.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>

    <script>
		const inputImage = document.querySelector("#gambar_agenda");
		const previewImage = document.querySelector("#image-preview.img-preview");

		const displayInputImage = () => {	
			previewImage.style.height = "180px";
			previewImage.style.aspectRatio = "16/9";
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
