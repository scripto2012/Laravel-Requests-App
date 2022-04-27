<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    use HasFactory;
    protected $table = 'asks';
    protected $guarded = [];
    protected $fillable = ['name', 'phone', 'company', 'ask-name', 'message', 'file','user_id'];
}
