<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['challan_no', 'date', 'note', 'user_id', 'admin_id'];

    // Admin Connection
    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    // Sale Item Table Connection Sale Invoice Table
    public function item() {
        return $this->hasMany(SaleItem::class);
    }

}
