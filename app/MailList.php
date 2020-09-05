<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model
{
    protected $fillable = [
        'tanggal_masuk', 'asal', 'no_surat', 'tingkat_keamanan', 'perihal'
    ];
}
