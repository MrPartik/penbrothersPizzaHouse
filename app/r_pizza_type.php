<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $pt_id
 * @property string $pt_title
 * @property string $pt_desc
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property RPizzaInformation[] $rPizzaInformations
 */
class r_pizza_type extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pt_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pt_title', 'pt_desc', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rPizzaInformations()
    {
        return $this->hasMany(r_pizza_information::class, 'pt_id', 'pt_id');
    }
}
