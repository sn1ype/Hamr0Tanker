<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class water extends Model
{
    use HasFactory;
    protected $table = [ "dname",  "contact", "isbooked", "user_id"];
}
