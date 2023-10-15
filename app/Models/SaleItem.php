<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'sale_invoice_id', 'quantity', 'price', 'total'];

    // Sale Invoice Table Connect Sale Item Table
    public function invoice() {
        return $this->belongsTo(SaleInvoice::class);
    }

    // Product Table Connect Sale Item Table
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
