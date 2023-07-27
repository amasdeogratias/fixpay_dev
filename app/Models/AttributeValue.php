<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_values';

    protected $fillable = [
        'attribute_id', 'value', 'price'
    ];

    protected $casts = [
        'attribute_id' => 'integer'
    ];

    //relationship btn attribute and attribute values
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
