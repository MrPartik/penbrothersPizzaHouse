<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $t_id
 * @property integer $pts_id
 * @property integer $ps_id
 * @property float $t_price
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property RPizzaTopping $rPizzaTopping
 * @property RPizzaSize $rPizzaSize
 */
class t_topping extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 't_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pts_id', 'ps_id', 't_price', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rPizzaTopping()
    {
        return $this->belongsTo(r_pizza_topping::class, 'pts_id', 'pts_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rPizzaSize()
    {
        return $this->belongsTo(r_pizza_size::class, 'ps_id', 'ps_id');
    }
}
