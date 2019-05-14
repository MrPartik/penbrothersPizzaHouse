<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $p_id
 * @property integer $pi_id
 * @property integer $ps_id
 * @property float $p_price
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property RPizzaInformation $rPizzaInformation
 * @property RPizzaSize $rPizzaSize
 * @property TOrderItem[] $tOrderItems
 * @property TPizzaCustom[] $tPizzaCustoms
 */
class t_pizza extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_pizza';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'p_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pi_id', 'ps_id', 'p_price', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rPizzaInformation()
    {
        return $this->belongsTo(r_pizza_information::class, 'pi_id', 'pi_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rPizzaSize()
    {
        return $this->belongsTo(r_pizza_size::class, 'ps_id', 'ps_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tOrderItems()
    {
        return $this->hasMany(t_order_item::class, 'p_id', 'p_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tPizzaCustoms()
    {
        return $this->hasMany(t_pizza_custom::class, 'p_id', 'p_id');
    }
}
