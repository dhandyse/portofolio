@extends('components.app')
@section('content')
    <x-layout>
        <x-slot name="title">Repository</x-slot>
        <!-- Main content -->
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
                            <form id="form_add" action="{{ route('site.dokumen.' . $urlnya) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <br>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="col-md-2"></div>
                                        <label class="col-md-2">Tahun <span style="color: red;">*</span></label>
                                        <div class="col-md-8">
                                            <input type="hidden" class="form-control" id="id" name="id"
                                                autocomplete="off"
                                                @isset($dokumen)
                      value="{{ $dokumen->id }}" readonly @endisset
                                                required>
                                            <!-- <input type="text" name="kepada" id="kepada" class="form-control" @if (isset($dokumen)) value="{{ $dokumen->kepada }}" @endisset autocomplete="off" {{ $disabled_ }}> -->
                    @php
                    $now = date('Y');
                    $start = $now;
                    $end = $now + 10;
                    @endphp
                    <select name="tahun" id="tahun" class="form-control" required {{ $disabled_ }}>
                      <option value="" selected>--Pilih Tahun--</option>
                      @for ($start; $start < $end; $start++) <option value="{{ $start }}" @if (isset($dokumen)) @if ($dokumen->tahun == $start) selected @endif @endif>{{ $start }}</option>
                                        @endfor
                                    </select>
                                  </div>
                                </div>
                              </div><br>
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="col-md-2"></div>
                                  <label class="col-md-2">Tanggal <span style="color: red;">*</span></label>
                                  <div class="col-md-8">
                                    <input type="date" name="tgl" id="tgl" class="form-control tgl_date" data-date=""
                                      data-date-format="DD/MM/YYYY" @if (isset($dokumen)) value="{{ $dokumen->tgl }}" @endisset
                      autocomplete="off" required {{ $disabled_ }}>
                  </div>
                </div>
              </div><br>

              <div class="row">
                <div class="col-md-10">
                  <div class="col-md-2"></div>
                  <label class="col-md-2">Judul<span style="color: red;">*</span></label>
                  <div class="col-md-8">
                    <textarea class="form-control" name="program" id="program" rows="10" cols="50" {{ $disabled_ }}>@if (isset($dokumen)){{ $dokumen->program }}@endisset</textarea>
                  </div>
                </div>
              </div><br>
              <div class="row">
                <div class="col-md-10">
                  <div class="col-md-2"></div>
                  <label class="col-md-2">Dokumen</label>
                  <div class="col-md-8">
                    @if ($judul !== 'Detail')
                    <input type="file" name="dokumen" id="dokumen" class="form-control" autocomplete="off"
                      accept=".doc, .docx, .pdf, .jpg, .jpeg, .png" required> @endif

                                    @if (isset($dokumen)) @if ($dokumen->dokumen)
                    <?php $dok = explode('.', $dokumen->dokumen);
                    $type = strtolower(end($dok)); ?>
                    @if ($type == 'jpg' || $type == 'jpeg' || $type == 'png')
                    <img src="{{ url('/') . '/uploads/' . $dokumen->dokumen }}" alt="Dokumen Lampiran">
                    @else
                    <a href="{{ url('/') . '/uploads/' . $dokumen->dokumen }}" target="_blank"
                      class="btn btn-outline-secondary"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; {{ cutString($dokumen->dokumen, 25, '_') }}</a> @endif
                                    @endif
                                    @endif
                                    <span style="font-size: 13px;color: red">*) .doc, .docx, .pdf, .jpg, .jpeg, .png ,Max 20MB</span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="col-md-4"></div>
                                  <div class="col-md-8">
                                    <p id="error1" style="display:none;font-size: 12px;color: red;">
                                      Format Dokumen Tidak Valid! Format Dokumen Harus doc,docx,pdf,jpg,png.
                                    </p>
                                    <p id="error2" style="display:none;font-size: 12px;color:red;">
                                      Batas Ukuran Dokumen maksimum adalah 20MB
                                    </p>
                                  </div>
                                </div>
                              </div><br><br>
                              <div class="modal-footer">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                  <div style="float: right;">
                                    <a href="{{ route('site.dokumen.index') }}" type="button" class="btn btn-danger"><i
                                        class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                                    @if ($judul != 'Detail')
                                    <button type="button" class="btn btn-primary" id="simpan_"><i class="fa fa-check"></i>&nbsp;
                                      Simpan</button>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>

                  <!-- /.content -->

                                            <script type="text/javascript">
                                                function isEmptyM(obj) {
                                                    for (var key in obj) {
                                                        if (obj.hasOwnProperty(key))
                                                            return false;
                                                    }
                                                    return true;
                                                }

                                                function alertSimpan(form, text = null) {
                                                    var txt = "";
                                                    if (text) {
                                                        txt = text;
                                                    }
                                                    swal({
                                                        title: "Apakah anda yakin?",
                                                        text: txt,
                                                        icon: "info",
                                                        buttons: ["Batal", "OK"],
                                                    }).then((willDelete) => {
                                                        if (willDelete) {
                                                            $(form).submit();
                                                        } else {
                                                            return false;
                                                        }
                                                    });
                                                }

                                                $(document).ready(function() {

                                                    var a = 0;
                                                    $('#dokumen').bind('change', function() {
                                                        if ($('#simpan_').attr('disabled', false)) {
                                                            $('#simpan_').attr('disabled', true);
                                                        }
                                                        var ext = $('#dokumen').val().split('.').pop().toLowerCase();
                                                        if ($.inArray(ext, ['doc', 'pdf', 'docx', 'jpg', 'jpeg', 'png']) == -1) {
                                                            $('#error1').slideDown("slow");
                                                            $('#error2').slideUp("slow");
                                                            a = 0;
                                                        } else {
                                                            var picsize = (this.files[0].size);
                                                            var sizefile = Math.round((picsize / 1024));
                                                            if (sizefile > 20000) {
                                                                $('#error2').slideDown("slow");
                                                                a = 0;
                                                            } else {
                                                                a = 1;
                                                                $('#error2').slideUp("slow");
                                                            }
                                                            $('#error1').slideUp("slow");
                                                            if (a == 1) {
                                                                $('#simpan_').attr('disabled', false);
                                                            }
                                                        }
                                                    });

                                                    //simpan
                                                    $('#simpan_').on('click', function() {
                                                        tahun = $('#tahun').val();
                                                        tgl = $('#tgl').val();
                                                        program = $('#program').val();
                                                        if (isEmptyM(tahun)) {
                                                            AlertDataSatuan('tahun');
                                                        } else if (isEmptyM(tgl)) {
                                                            AlertDataSatuan('Tanggal');
                                                        } else if (isEmptyM(program)) {
                                                            AlertDataSatuan('Program');
                                                        } else {
                                                            alertSimpan('#form_add');
                                                        }
                                                    });

                                                });
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
