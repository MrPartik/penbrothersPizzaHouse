<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $pc_id
 * @property integer $p_id
 * @property string $pc_name
 * @property int $pc_sizeCombination
 * @property string $pc_pizaCombination
 * @property string $pc_toppings
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property TPizza $tPizza
 */
class t_pizza_custom extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'pc_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['p_id', 'pc_name', 'pc_sizeCombination', 'pc_pizaCombination', 'pc_toppings', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tPizza()
    {
        return $this->belongsTo('App\TPizza', 'p_id', 'p_id');
    }
}
