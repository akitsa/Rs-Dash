<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = "tb_profile";
    protected $guarded = ['id'];

    public $timestamps = false;
}
