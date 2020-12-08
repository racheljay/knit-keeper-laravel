<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Project extends Model
{
    use HasFactory;
    protected $table = 'sub_projects';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function projects()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
