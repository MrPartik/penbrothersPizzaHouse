<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ps_id
 * @property float $ps_size
 * @property string $ps_desc
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property TPizza[] $tPizzas
 * @property TTopping[] $tToppings
 */
class r_pizza_size extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ps_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ps_size', 'ps_desc', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tPizzas()
    {
        return $this->hasMany(t_pizza::class, 'ps_id', 'ps_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tToppings()
    {
        return $this->hasMany(t_topping::class, 'ps_id', 'ps_id');
    }
}
