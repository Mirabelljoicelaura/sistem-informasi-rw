@extends('admin.layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Data Kependudukan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Penduduk</a></div>
                <div class="breadcrumb-item"><a href="#">Management</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Manajemen Kependudukan</h2>

            <div class="row">
                <div class="col-12">
                    @include('admin.layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Daftar Penduduk</h4>
                            <div class="card-header-action">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ route('penduduk.create') }}">Tambah Penduduk</a>
                                <a class="btn btn-primary btn-color-blue text-white" data-toggle="modal" data-target="#importModal">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    Import Data</a>
                                <a class="btn btn-primary btn-color-blue" href="{{ route('penduduk.export') }}">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Export Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md" id="penduduk">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th style="white-space: nowrap">Tempat Lahir</th>
                                            <th>Tgl Lahir</th>
                                            <th>Jenis.</th>
                                            <th>Gol.</th>
                                            <th>Agama</th>
                                            <th>Pekerjaan</th>
                                            <th>Alamat</th>
                                            <th>RT</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penduduk as $key => $item)
                                            <tr>
                                                <td class="openKTP"
                                                    data-toggle="modal"
                                                    data-target="#ktp"
                                                    data-nik="{{ $item->nik }}"
                                                    data-nama="{{ $item->nama }}"
                                                    data-tempat_lahir="{{ $item->tempat_lahir }}"
                                                    data-tanggal_lahir="{{ $item->tanggal_lahir }}"
                                                    data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                    data-golongan_darah="{{ $item->golongan_darah }}"
                                                    data-alamat="{{ $item->alamat }}"
                                                    data-rt="{{ $item->rt }}"
                                                    data-agama="{{ $item->agama }}"
                                                    data-status_perkawinan="{{ $item->status_perkawinan }}"
                                                    data-pekerjaan="{{ $item->pekerjaan }}">
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->tempat_lahir }}</td>
                                                <td style="white-space: nowrap">{{ $item->tanggal_lahir }}</td>
                                                <td>{{ $item->jenis_kelamin }}</td>
                                                <td>{{ $item->golongan_darah }}</td>
                                                <td>{{ $item->agama }}</td>
                                                <td>{{ $item->pekerjaan }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>00{{ $item->rt }}</td>
                                                <td class="text-right">
                                                    <div class="d-flex justify-content-end">
                                                        <button class="btn btn-sm btn-warning btn-icon d-flex align-items-center justify-content-center openKTP" style="height: 30px; width: 30px"
                                                            data-toggle="modal"
                                                            data-target="#ktp"
                                                            data-nik="{{ $item->nik }}"
                                                            data-nama="{{ $item->nama }}"
                                                            data-tempat_lahir="{{ $item->tempat_lahir }}"
                                                            data-tanggal_lahir="{{ $item->tanggal_lahir }}"
                                                            data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                            data-golongan_darah="{{ $item->golongan_darah }}"
                                                            data-alamat="{{ $item->alamat }}"
                                                            data-rt="{{ $item->rt }}"
                                                            data-agama="{{ $item->agama }}"
                                                            data-status_perkawinan="{{ $item->status_perkawinan }}"
                                                            data-pekerjaan="{{ $item->pekerjaan }}">
                                                            <i class="fas fa-user"></i></button>
                                                        <a href="{{ route('penduduk.edit', $item->id) }}"
                                                            class="btn btn-sm btn-info btn-icon ml-2 mr-2 d-flex align-items-center justify-content-center" style="height: 30px; width: 30px">
                                                            <i class="fas fa-pen"></i></a>
                                                        <form action="{{ route('penduduk.destroy', $item->id) }}"
                                                            method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}">
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete d-flex align-items-center justify-content-center" style="height: 30px; width: 30px">
                                                            <i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
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
        </div>
    </section>
    <div id="ktp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="detailKTP">
                    <div class="headerKTP">
                        <h5>PROVINSI JAWA TIMUR</h5>
                        <h5>KOTA MALANG</h5>
                    </div>
                    <div class="bodyKTP" style="overflow: hidden;">
                        <div>
                            <h5>NIK&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&nbsp;</h5><span id="nik" class="openKTP" data-toggle="modal" data-target="#kk"></span>
                        </div>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>: <span id="nama"></span></td>
                            </tr>
                            <tr>
                                <td>Tempat/Tgl Lahir</td>
                                <td>: <span id="tempat_lahir"></span>, <span id="tanggal_lahir"></span></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <span id="jenis_kelamin"></span>&emsp;&emsp;&ensp;Gol. Darah&emsp;: <span id="golongan_darah"></span></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <span id="alamat"></span></td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp;&ensp;RT/RW</td>
                                <td>: 00<span id="rt"></span>/005</td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp;&ensp;Kel/Desa</td>
                                <td>: TANJUNGREJO</td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp;&ensp;Kecamatan</td>
                                <td>: SUKUN</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: <span id="agama"></span></td>
                            </tr>
                            <tr>
                                <td>Status Perkawinan</td>
                                <td>: <span id="status_perkawinan"></span></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>: <span id="pekerjaan"></span></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: WNI</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kk" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="detailKTP">
                    <div class="headerKTP">
                        <h5>KARTU KELUARGA</h5>
                    </div>
                    <div class="bodyKTP" style="overflow: hidden;">
                        <div>
                            <h5>NIK&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:&nbsp;</h5><span id="nik" class="openKTP" data-toggle="modal"
                            data-target="#exampleModalCenter"></span>
                        </div>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>: <span id="nama"></span></td>
                            </tr>
                            <tr>
                                <td>Tempat/Tgl Lahir</td>
                                <td>: <span id="tempat_lahir"></span>, <span id="tanggal_lahir"></span></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: <span id="jenis_kelamin"></span>&emsp;&emsp;&ensp;Gol. Darah&emsp;: <span id="golongan_darah"></span></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <span id="alamat"></span></td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp;&ensp;RT/RW</td>
                                <td>: 0<span id="rt"></span>/05</td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp;&ensp;Kel/Desa</td>
                                <td>: TANJUNGREJO</td>
                            </tr>
                            <tr>
                                <td>&emsp;&emsp;&ensp;Kecamatan</td>
                                <td>: SUKUN</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: <span id="agama"></span></td>
                            </tr>
                            <tr>
                                <td>Status Perkawinan</td>
                                <td>: <span id="status_perkawinan"></span></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>: <span id="pekerjaan"></span></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: WNI</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="importModalLabel">Import Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('penduduk.import') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="file" name="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
        </div>
    </div>
@endsection
@push('customScript')
    <script>
        $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });

        $(document).on("click", ".openKTP", function () {
            var nik = $(this).data('nik');
            var nama = $(this).data('nama');
            var tempat_lahir = $(this).data('tempat_lahir');
            var tanggal_lahir = $(this).data('tanggal_lahir');
            var jenis_kelamin = $(this).data('jenis_kelamin');
            var golongan_darah = $(this).data('golongan_darah');
            var alamat = $(this).data('alamat');
            var rt = $(this).data('rt');
            var agama = $(this).data('agama');
            var status_perkawinan = $(this).data('status_perkawinan');
            var pekerjaan = $(this).data('pekerjaan');

            $(".modal-content #nik").text(nik);
            $(".modal-content #nama").text(nama);
            $(".modal-content #tempat_lahir").text(tempat_lahir);
            $(".modal-content #tanggal_lahir").text(tanggal_lahir);
            $(".modal-content #jenis_kelamin").text(jenis_kelamin);
            $(".modal-content #golongan_darah").text(golongan_darah);
            $(".modal-content #alamat").text(alamat);
            $(".modal-content #rt").text(rt);
            $(".modal-content #agama").text(agama);
            $(".modal-content #status_perkawinan").text(status_perkawinan);
            $(".modal-content #pekerjaan").text(pekerjaan);
        });
    </script>
@endpush

@push('customStyle')
@endpush
