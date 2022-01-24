<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPublish extends Model
{
    protected $tableName = "status_publishes";
    public $timestamps = false;
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
