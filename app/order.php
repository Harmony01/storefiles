<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $fillable =['tel','location','paymentType', 'amount', 'Dprice','tId','Information', 'reference', 'orderId', 'status', 'user_id', 'total_price', 'region_id', 'disctrict_id'];
    public function user(){
      return $this->belongsTo(User::class);

    }
    public function orderItem(){
      return $this->belongsToMany(Product::class, 'order_products')->withPivot('qty', 'total');
    }

    public function Region()
    {
    	return $this->belongsTo(region::class);
    }

    public function district()
    {
    	return $this->belongsTo(disctrict::class, 'disctrict_id');
    }

}
