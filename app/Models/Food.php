<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class,'category_id')
                ->withTrashed();
    }

    public function orders(){
        return $this->belongToMany(Order::class,"table_dmorderfood","food_id", "order_id")
              ->withPivot('quantity');
    }

}
