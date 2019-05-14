<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $pi_id
 * @property integer $pt_id
 * @property string $pi_title
 * @property string $pi_desc
 * @property string $pi_img
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property RPizzaType $rPizzaType
 * @property TPizza[] $tPizzas
 */
class r_pizza_information extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'r_pizza_information';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pi_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pt_id', 'pi_title', 'pi_desc', 'pi_img', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rPizzaType()
    {
        return $this->belongsTo(r_pizza_type::class, 'pt_id', 'pt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tPizzas()
    {
        return $this->hasMany(t_pizza::class, 'pi_id', 'pi_id');
    }
}
