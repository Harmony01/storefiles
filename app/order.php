<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $fillable =['tel','location','paymentType', 'amount','tId','Information','orderId', 'status', 'user_id', 'total_price'];
    public function user(){
      return $this->belongsTo(User::class);

    }
    public function orderItem(){
      return $this->belongsToMany(Product::class, 'order_products')->withPivot('qty', 'total');
    }
}
