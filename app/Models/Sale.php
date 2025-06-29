<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'qty',
        'discount',
        'vat_percent',
        'vat_amount',
        'total_amount',
        'paid_amount',
        'due_amount',
        'sale_date',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
