<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class BuildingAsset extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'asset_id',
        'name',
        'category_id',
        'image_url',
        'address',
        'owner_name',
        'land_area',
        'building_area',
        'certificate_number',
        'certificate_owner',
        'certificate_status',
        'certificate_location_id',
        'imb_holder_name',
        'imb_number',
        'imb_location_id',
        'latitude',
        'longitude',
        'imb_status',
        'pbb_number',
        'pbb_holder_name',
        'pbb_location_id',
        'pbb_status',
        'pbb_value',
        'appraiser_name',
        'appraisal_value',
        'appraisal_year',
        'purchase_price',
        'purchase_date',
        'current_price',
        'transfer_fee',
        'other_fees',
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
        'land_area' => 'decimal:10,2',
        'building_area' => 'decimal:10,2',
        'latitude' => 'decimal:9,6',
        'longitude' => 'decimal:9,6',
        'pbb_value' => 'decimal:15,2',
        'appraisal_value' => 'decimal:15,2',
        'purchase_price' => 'decimal:15,2',
        'current_price' => 'decimal:15,2',
        'transfer_fee' => 'decimal:15,2',
        'other_fees' => 'decimal:15,2',
        'depreciation' => 'decimal:15,2',
        'residual_value' => 'decimal:15,2',
        'certificate_status' => 'string',
        'imb_status' => 'string',
        'pbb_status' => 'string',
    ];

    protected $dates = ['deleted_at'];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function certificateLocation()
    {
        return $this->belongsTo(Location::class, 'certificate_location_id');
    }

    public function imbLocation()
    {
        return $this->belongsTo(Location::class, 'imb_location_id');
    }

    public function pbbLocation()
    {
        return $this->belongsTo(Location::class, 'pbb_location_id');
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
