@extends('layouts.app')

@section('title', '| Mentor')

@section('head')
    <!-- Data Table CSS -->
    <link href="{{ asset('asset-admin/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('asset-admin/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('modal')
    <!-- Modal forms-->
    <div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="modalTambahData" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulir Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('admin.mentor.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama Mentor..." required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Mentor..." required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" placeholder="Foto Mentor..." accept="image/*">
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="profesi">Profesi*</label>
                            <input type="text" class="form-control @error('profesi') is-invalid @enderror" id="profesi" name="profesi" placeholder="Profesi Mentor..." required>
                            @error('profesi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi*</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Deskripsi Mentor..." required></textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi*</label>
                            <input type="text" class="form-control disabled @error('password') is-invalid @enderror" id="password" name="password" placeholder="Kata Sandi..." value="Secret123" disabled>
                            <span class="feedback" role="alert">
                                <strong>Kata Sandi secara default adalah 'Secret123', setelah mentor ditambahkan disarankan untuk langsung mengubah Kata Sandi di profil.</strong>
                            </span>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-info float-right"><i class="fa fa-save"></i> Tambahkan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Breadcrumb -->
    <nav class="hk-breadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light bg-transparent">
            <li class="breadcrumb-item active" aria-current="page">Mentor</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <!-- Container -->
    <div class="container">

        <!-- Title -->
        <div class="hk-pg-header align-items-top">
            <div>
                <h4 class="hk-pg-title font-weight-600 mb-10"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="database"></i></span></span>Mentor</h4>
            </div>
            <div class="d-flex">
                <button class="btn btn-sm btn-outline-primary btn-wth-icon icon-wthot-bg mb-15">
                    <span class="icon-label"><i class="fa fa-plus"></i> </span>
                    <span class="btn-text" data-toggle="modal" data-target="#modalTambahData">Tambah Data</span>
                </button>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table id="datatables-mentor" class="table table-hover w-100 display pb-30">
                                    <thead>
                                        <tr>
                                            <th data-priority="1">Nama</th>
                                            <th>Email</th>
                                            <th>Profesi</th>
                                            <th data-priority="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <th data-priority="1">Nama</th>
                                            <th>Email</th>
                                            <th>Profesi</th>
                                            <th data-priority="2">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->
@endsection

@section('script')
    <!-- Data Table JavaScript -->
    <script src="{{ asset('asset-admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('asset-admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

    <script>
        @if ($errors->any())
            $('#modalTambahData').modal('show');
        @endif
        $(function () {
            var table = $('#datatables-mentor').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    type: "POST",
                    url: "{{ route('admin.mentor.data') }}",
                    data: function (d) {
                        d._token = "{{csrf_token()}}"
                    },
                    error: function (xhr, error, thrown) {
                        console.log(xhr);
                        alert( 'ERROR saat pengumpulan data!' );
                    }
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'mentor.profesi', name: 'profesi'},
                    {
                        data: 'action', 
                        name: 'action',
                        className: 'nowrap text-right',
                        orderable: false, 
                        searchable: false
                    },
                ],
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: -1 }
                ],
                "aaSorting": [],
                language:  {
                    url: "//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json"
                }
            });

        });

        function resetPasswordData()
        {
            var id = $(event.currentTarget).data("value");
            var nama = $(event.currentTarget).data("nama");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Kamu yakin untuk mengatur ulang kata sandi mentor dengan nama "'+nama+'"?',
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $("#reset-password-data-"+id).submit();
                }
            });
        }

        function deleteData()
        {
            var id = $(event.currentTarget).data("value");
            var nama = $(event.currentTarget).data("nama");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Kamu yakin untuk menghapus mentor dengan nama "'+nama+'"?',
                text: "Jika Kamu hapus, data tidak akan bisa dikembalikan lagi!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: "Hapus",
                cancelButtonText: "Batal",
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $("#delete-data-"+id).submit();
                }
            });
        }
    </script>
@endsection