<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
    protected $with = ['sub_projects'];

    public function sub_projects()
    {
        return $this->hasMany('App\Models\Sub_Project');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
