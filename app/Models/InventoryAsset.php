<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class InventoryAsset extends Model
{
    protected $fillable = [
        'id',
        'asset_id',
        'name',
        'category_id',
        'image_url',
        'ownership_status',
        'owner_name',
        'condition_id',
        'purchase_price',
        'purchase_date',
        'brand_id',
        'depreciation',
        'residual_value',
        'location_id',
        'project_id',
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
