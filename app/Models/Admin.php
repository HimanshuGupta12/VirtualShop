<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';

    public function sellerPersonal()
    {
        return $this->belongsTo('App\Models\Seller' , 'seller_id');
    }

    public function sellerBusiness()
    {
        return $this->belongsTo('App\Models\SellersBusinessDetails' , 'seller_id');
    }

    public function sellerBank()
    {
        return $this->belongsTo('App\Models\SellersBankDetails' , 'seller_id');
    }



}
