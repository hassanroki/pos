<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $fillable = ['group_id', 'name', 'email', 'phone', 'address'];

    // Group Tables Connection
    public function group() {
        return $this->belongsTo(Group::class);
    }

    // Sales Table Invoice Connection
    public function sales() {
        return $this->hasMany(SaleInvoice::class);
    }

    // Purchases Table Invoice Table Connection
    public function purchases() {
        return $this->hasMany(PurchaseInvoice::class);
    }

    // Payments Table Connection
    public function payments() {
        return $this->hasMany(Payment::class);
    }

    // Receipts Table Connection
    public function receipts() {
        return $this->hasMany(Receipt::class);
    }
}
