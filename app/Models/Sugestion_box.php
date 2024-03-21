<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugestion_box extends Model
{
    use HasFactory;
    protected $table = 'sugestion_boxes';
    protected $fillable = [
        'title',
        'body',
    ];
    public function cuenta(){
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
