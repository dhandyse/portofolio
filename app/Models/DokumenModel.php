<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use DB;

class DokumenModel extends Model
{
  protected $primaryKey = 'id';

  protected $table = "tbl_dokumen";

  protected $guarded = [];

  public $timestamps = false;
}
