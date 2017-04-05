<?php

namespace Myrtle\Core\MaritalStatuses\Models;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    protected $fillable = ['name'];

    public $timestamps = false;
}
