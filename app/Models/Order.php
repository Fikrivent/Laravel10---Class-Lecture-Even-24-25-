<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Food;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    public $table = "table_dmorders";
    
    public function customer() : BelongsTo{
        return $this->belongsTo(User::class, "customer_id");
    }
    public function staff() : BelongsTo{
        return $this->belongsTo(User::class, "staff_id");
    }

    public function foods(): BelongsToMany{
        return $this->belongsToMany(Food::class,"table_dmorderfood","order_id", "food_id")
              ->withPivot('quantity');
    }
}


