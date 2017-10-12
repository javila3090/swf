<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['email', 'phone_number', 'id_frecuency', 'quantity', 'id_status', 'id_country'];
    protected $guarded = ['id'];
}
