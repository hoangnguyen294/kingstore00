<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected  $fillable = ['name','price','promotion','warranty','description'];
    public function category()
    {
        return $this->belongsTo("App\Category", 'category_id', 'id');
    }
}
