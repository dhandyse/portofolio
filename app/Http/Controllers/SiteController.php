<?php

namespace App\Http\Controllers;

use App\Models\DokumenModel as ModelsDokumenModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

use App\Models\paban_1\DokumenModel;
use App\User;
use Auth;
use Session;
use DB;
use PDF;

class SiteController extends Controller
{
    //
    public function index()
    {

        return view('site/index');
    }



    public function education()
    {
        return view('site.education');
        if (true) {

            if (true) {
                if (true) {
                }
            }
        } elseif (true) {
        }
    }

    public function dokumen()
    {
        return view('site.dokumen.index');
    }

    public function scopeData(Request $req)
    {

        $dokumen = ModelsDokumenModel::orderBy('id', 'desc')

            ->get();

        return Datatables::of($dokumen)
            ->addIndexColumn()
            ->addColumn('tgl', function ($data) {
                $tgl = "";
                if ($data->tgl != null) {
                    $tgl = getTanggalIndo($data->tgl);
                }
                return $tgl;
            })
            /* ->addColumn('nomor', function ($data) {
            return '<div align="left">'.$data->nomor.'</div>';
          })
          ->addColumn('pengirim', function ($data) {
            $user = '';
            if ($data->id_user) {
              $user = User::where('id', $data->id_user)->first()->name;
            }
            return $user;
          }) */
            ->addColumn('dokumen', function ($data) {
                return '<div align="center"><a href="' . url('/') . '/uploads/' . $data->dokumen . '" target="_blank" class="btn btn-default btn-sm" title="Lampiran"><i class="fas fa-paperclip"></i></a></div>';
            })
            ->addColumn('action', function ($data) {
                if ($data->dokumen !== null) {
                    return '<center>
                        <a href="' . route('site.dokumen.ubah', $data->id) . '" class="btn btn-default btn-sm" title="Ubah"><i class="fas fa-paperclip"></i></a>
                        <button class="btn btn-sm btn-default" onclick="destroy(\'' . $data->id . '\')" title="Hapus"><i class="fa fa-trash text-danger"></i></button>
                        
                    </center>';
                } else {
                    return '<center>
                        <a href="' . route('site.dokumen.destroy', $data->id) . '" class="btn btn-default btn-sm" title="Destroy"><i class="fa fa-edit text-warning"></i></a>
                        <button class="btn btn-sm btn-default" onclick="destroy(\'' . $data->id . '\')" title="Hapus"><i class="fa fa-trash text-danger"></i></button>
                      </center>';
                }
            })
            ->rawColumns(['action', 'nomor', 'dokumen'])
            ->make(true);
    }

    public function create()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['judul'] = "Tambah";
        $data['urlnya'] = 'store';
        $data['disabled_'] = '';
        return view('site.dokumen.create', $data);
    }

    public function store(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');




        $destination = 'uploads/';
        if ($req->hasFile('dokumen')) {
            $file = $req->file('dokumen');
            $nama_file = time() . '_dokumen' . '_' . str_replace(' ', '_', $req->file('dokumen')->getClientOriginalName());
            Storage::disk('uploads')->putFileAs($destination, $file, $nama_file);
        } else {
            $nama_file = null;
        }

        $dokumen = ModelsDokumenModel::create([
            //'kepada' => $req->kepada,
            'tgl' => $req->tgl,
            'tahun' => $req->tahun,
            'program' => $req->program,
            // 'nomor' => $req->nomor,
            // 'klasifikasi' => $req->klasifikasi,
            // 'judul' => $req->judul,
            // 'pangdam' => $req->pangdam,
            // 'nirp_pangdam' => $req->nirp_pangdam,
            // 'keterangan' => $req->keterangan,
            'dokumen' => $nama_file,

            'created_at' => $datenow,
        ]);


        return redirect()->route('site.dokumen.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function ubah($id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['judul'] = "Ubah";
        $data['urlnya'] = 'update';
        $data['disabled_'] = '';
        $data['dokumen'] = ModelsDokumenModel::where('id', $id)->first();

        return view('site.dokumen.create', $data);
    }

    public function update(Request $req)
    {
        date_default_timezone_set("Asia/Bangkok");
        $datenow = date('Y-m-d H:i:s');

        $destination = 'uploads\\';
        if ($req->hasFile('dokumen')) {
            $file = $req->file('dokumen');
            $nama_file = time() . '_ProgjaAnggaran' . '_' . str_replace(' ', '_', $req->file('dokumen')->getClientOriginalName());
            Storage::disk('uploads')->putFileAs($destination, $file, $nama_file);
            ModelsDokumenModel::where('id', $req->id)->update(['dokumen' => $nama_file]);
        }

        $dokumen = ModelsDokumenModel::where('id', $req->id)->update([
            //'kepada' => $req->kepada,
            'tgl' => $req->tgl,
            'tahun' => $req->tahun,
            'program' => $req->program,
            // 'nomor' => $req->nomor,
            // 'klasifikasi' => $req->klasifikasi,
            // 'judul' => $req->judul,
            // 'pangdam' => $req->pangdam,
            // 'nirp_pangdam' => $req->nirp_pangdam,
            // 'keterangan' => $req->keterangan,
            'updated_at' => $datenow,
        ]);


        return redirect()->route('site.dokumen.index')->with(['success' => 'Data Berhasil Diubah']);
    }

    public function detail($id)
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['judul'] = "Detail";
        $data['urlnya'] = 'update';
        $data['disabled_'] = 'disabled';
        $data['dokumen'] = ModelsDokumenModel::where('id', $id)->first();

        return view('site.dokumen.create', $data);
    }

    public function destroy(Request $req)
    {
        $exec = ModelsDokumenModel::destroy($req->id);
        echo  $exec;
        die();
        if ($exec) {

            Session::flash('success', 'Data Berhasil Dihapus');
        } else {
            Session::flash('gagal', 'Error Data');
        }
    }
}
