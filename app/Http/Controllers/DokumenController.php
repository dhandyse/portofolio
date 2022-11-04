<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

class DokumenController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('site.dokumen');
    }
}
