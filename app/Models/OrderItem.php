<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class OrderItem extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'order_items';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'item',
        'uom',
        'qty',
        'is_active',
        'created_at',
        'updated_at',
        'updated_by',
        'added_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'order_id' => 'string',
        'item' => 'string',
        'uom' => 'string',
        'qty' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];
}
