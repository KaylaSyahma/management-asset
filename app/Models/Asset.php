<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'id',
        'asset_number',
        'type',
        'current_status_id',
        'assignment_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // public function currentStatus()
    // {
    //     return $this->belongsTo(Statute::class, 'current_status_id');
    // }

    // public function assignment()
    // {
    //     return $this->belongsTo(Assignment::class);
    // }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
