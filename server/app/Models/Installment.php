<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'amount',
        'expire_date',
        'note',
        'customer_id'

    ];

    public function customer()
    {

        return $this->belongsTo(Customer::class);
    }
}
