<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'date', 'note', 'user_id', 'sale_invoice_id', 'admin_id'];

    // Admin Connection
    public function admin() {
        return $this->belongsTo(Admin::class);
    }

    // Sale Invoice Connection
    public function invoice() {
        return $this->belongsTo(SaleInvoice::class);
    }
}
