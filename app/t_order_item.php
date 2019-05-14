<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $oi_id
 * @property integer $o_id
 * @property integer $p_id
 * @property int $oi_sizeCombination
 * @property string $oi_pizaCombination
 * @property string $oi_toppings
 * @property int $oi_qty
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property TPizza $tPizza
 * @property TOrder $tOrder
 */
class t_order_item extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'oi_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['o_id', 'p_id', 'oi_sizeCombination', 'oi_toppings','oi_pizaCombination', 'oi_toppings', 'oi_qty', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tPizza()
    {
        return $this->belongsTo('App\TPizza', 'p_id', 'p_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tOrder()
    {
        return $this->belongsTo('App\TOrder', 'o_id', 'o_id');
    }
}
