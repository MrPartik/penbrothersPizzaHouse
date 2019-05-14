<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $sa_id
 * @property integer $u_id
 * @property string $sa_address
 * @property string $sa_houseNo
 * @property string $sa_barangay
 * @property string $sa_city
 * @property string $sa_zipCode
 * @property string $sa_Phone
 * @property string $created_at
 * @property boolean $stats
 * @property User $user
 */
class r_saved_delivery_information extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'r_saved_delivery_information';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'sa_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['u_id', 'sa_address', 'sa_houseNo', 'sa_barangay', 'sa_city', 'sa_zipCode', 'sa_Phone', 'created_at', 'stats'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'u_id');
    }
}
