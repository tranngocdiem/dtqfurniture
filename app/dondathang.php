<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dondathang extends Model
{
    protected $table = 'dondathang';
    public $timestamps = true;
    protected $fillable = ['maddh','ngaydat','ngaygiao','diachigiao','trangthai','matk','isDeleted'];
    public function loaisanpham(){
    	return $this->belongsToMany('App\loaisanpham','chitietdonhang','maddh','maloai')->using('App\chitietdonhang');
    }
    public function taikhoan(){
    	return $this->belongsTo('App\taikhoan');
    }
}
