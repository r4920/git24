<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Enterprise extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'enterprises';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'code',
        'address',
        'description',
        'website',
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
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'code' => 'string',
        'address' => 'string',
        'description' => 'string',
        'website' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function departments()
    {
        return $this->belongsTo(Departments::class, 'enterprise', 'id');
    }
}
