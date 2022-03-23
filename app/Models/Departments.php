<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;

class Departments extends Model
{
    use HasRecordOwnerProperties;

    /**
     * @var string
     */
    protected $table = 'departments';

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'code',
        'enterprise',
        'email',
        'phone',
        'website',
        'address',
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
        'code' => 'string',
        'enterprise' => 'integer',
        'email' => 'string',
        'phone' => 'string',
        'website' => 'string',
        'address' => 'string',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function enterprise()
    {
        return $this->hasOne(Enterprise::class, 'id', 'enterprise');
    }
}
