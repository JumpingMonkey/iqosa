<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinPopupMessageModel extends Model
{
    use HasFactory;

    protected $fillable = array('name', 'vacancy', 'email', 'file', 'linkedin');
}
