@extends('components.app')
@section('content')
    <x-layout>
        <x-slot name="title">Repository</x-slot>

        <section class="content container-fluid">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="Blog-title Blog-title--item" data-content-field="title" itemprop="headline"
                        style="text-align: center;">Repository |
                        Documents, PDF, and Photos</h1>
                    <div class="box-tools pull-center">
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ route('site.dokumen.create') }}" class="btn btn-primary"
                                                style="margin-top: 26px;position: absolute;right: 900px;">
                                                <span class="fa fa-plus"></span>&nbsp; Tambah
                                            </a>
                                            <br><br>
                                            <table id="dt_basic_1" class="table table-striped table-bordered table-hover"
                                                width="100%" style="text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th width="7%">
                                                            <center>No</center>
                                                        </th>
                                                        <th>
                                                            <center>Tahun</center>
                                                        </th>
                                                        <th>
                                                            <center>Tanggal</center>
                                                        </th>
                                                        <th>
                                                            <center>Judul</center>
                                                        </th>
                                                        <th>
                                                            <center>Dokumen</center>
                                                        </th>
                                                        <th width="15%">
                                                            <center>Aksi</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            $(document).ready(function() {
                var token = '{{ csrf_token() }}';
                $('#dt_basic_1').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('site.dokumen.scopeData') }}",
                    iDisplayLength: 10,
                    columnDefs: [{
                        className: "text-center",
                        "targets": "_all"
                    }],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'tahun',
                            name: 'tahun'
                        },
                        {
                            data: 'tgl',
                            name: 'tgl'
                        },
                        {
                            data: 'program',
                            name: 'program'
                        },
                        {
                            data: 'dokumen',
                            name: 'dokumen'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });

            //token
            var token = '{{ csrf_token() }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function destroy(id) {


                swal({
                    title: "",
                    text: "Apakah anda yakin menghapus data ini?",
                    icon: "warning",
                    buttons: ['Batal', 'OK'],
                }).then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                        $.post("{{ route('site.dokumen.destroy') }}", {
                            id: id,
                            _token: token,
                        }, function(data) {
                            console.log(data);
                            location.reload();
                        })
                    } else {
                        return false;
                    }
                });
            }
        </script>

        @if (Session::has('success'))
            <script type="text/javascript">
                swal({
                    icon: 'success',
                    text: '{{ Session::get('success') }}',
                    button: false,
                    timer: 1500
                });
            </script>
            <?php
            Session::forget('success');
            ?>
        @endif
        @if (Session::has('gagal'))
            <script type="text/javascript">
                swal({
                    icon: 'warning',
                    title: 'Oops !',
                    button: false,
                    text: '{{ Session::get('gagal') }}',
                    timer: 1500
                });
            </script>
            <?php
            Session::forget('gagal');
            ?>
        @endif



    </x-layout>
@endsection
