<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class VehicleAsset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'asset_id',
        'name',
        'license_plate',
        'category_id',
        'image_url',
        'owner_name',
        'ownership_status',
        'condition_id',
        'production_year',
        'color',
        'insurance_policy_number',
        'stnk_number',
        'stnk_date',
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

    protected $casts = [
        'purchase_price' => 'decimal:15,2',
        'depreciation' => 'decimal:15,2',
        'residual_value' => 'decimal:15,2',
        'ownership_status' => 'string',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

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
