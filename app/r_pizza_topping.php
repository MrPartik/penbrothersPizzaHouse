<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $pts_id
 * @property string $pts_title
 * @property string $pts_desc
 * @property string $pts_img
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property TTopping[] $tToppings
 */
class r_pizza_topping extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pts_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pts_title', 'pts_desc', 'pts_img', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tToppings()
    {
        return $this->hasMany(t_topping::class, 'pts_id', 'pts_id');
    }
}
