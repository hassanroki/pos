<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    use HasFactory;
    protected $fillable = ['admin_id', 'user_id', 'challan_no', 'date', 'note'];

    // Purchase Item Table Connection Purchase Invoice Table
    public function item() {
        return $this->hasMany(PurchaseItem::class);
    }
}
