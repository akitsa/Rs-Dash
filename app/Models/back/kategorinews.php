<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorinews extends Model
{
    protected $table = "tb_kat_news";
    protected $guarded = ["id"];
}
