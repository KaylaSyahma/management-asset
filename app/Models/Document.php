<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Document extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'asset_id',
        'document_name',
        'document_type_id',
        'document_path',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function delete()
    {
        $this->deleted_by = Auth::id(); // Ambil ID user yang lagi login dan simpan ke kolom deleted_by
        $this->save(); // Simpan perubahan ke database

        return parent::delete(); // method delete bawaan Laravel untuk soft delete (isi deleted_at)
    }
}
