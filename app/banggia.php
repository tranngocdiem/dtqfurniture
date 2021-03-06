<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banggia extends Model
{
    protected $table = 'banggia';
    public $timestamp = true;
    protected $fillable = ['magia','gia','maloai','makm','isDeleted'];
    public function chuongtrinhkhuyenmai()
    {
    	return $this->belongsTo('App\chuongtrinhkhuyenmai');
    }
    public function loaisanpham()
    {
    	return $this->belongsTo('App\loaisanpham');
    }
}
