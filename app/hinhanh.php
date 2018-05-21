<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinhanh extends Model
{
    protected $table = 'hinhanh';
    public $timestamp = false;
    protected $fillable = ['mahinh','url','maloai','isDeleted'];
    public function maloai()
    {
    	return $this->belongsTo('App\loaisanpham');
    }
    
}
