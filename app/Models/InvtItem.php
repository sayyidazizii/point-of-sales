<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvtItem extends Model
{
    protected $table = 'invt_item';
    protected $primaryKey = 'item_id';
    protected $guarded = [
        'item_id',
        'updated_at',
        'created_at'
    ];

    
    public function unit() {
        return $this->belongsTo(InvtItemUnit::class,'item_unit_id','item_unit_id');
    }

    public function category() {
        return $this->belongsTo(InvtItemCategory::class,'item_category_id','item_category_id');
    }
}
