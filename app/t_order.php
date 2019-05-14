<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $o_id
 * @property integer $u_id
 * @property string $o_transCode
 * @property string $o_payTransCode
 * @property string $o_payID
 * @property string $o_verficationCode
 * @property string $o_deliverAt
 * @property string $o_fromName
 * @property string $o_fromEmail
 * @property string $o_fromPhone
 * @property string $o_toHouseNo
 * @property string $o_toAddress
 * @property string $o_toStreet
 * @property string $o_toBarangay
 * @property string $o_toCity
 * @property string $o_toProvince
 * @property string $o_toLandmark
 * @property string $o_toNote
 * @property string $o_toZipCode
 * @property float $o_totalAmount
 * @property string $o_status
 * @property string $o_preparing_at
 * @property string $o_void_at
 * @property string $o_onBoard_at
 * @property string $o_paid_at
 * @property string $o_delivered_at
 * @property boolean $stats
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property TOrderItem[] $tOrderItems
 */
class t_order extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'o_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['u_id', 'o_transCode', 'o_payTransCode', 'o_payID', 'o_verficationCode', 'o_deliverAt', 'o_fromName', 'o_fromEmail', 'o_fromPhone', 'o_toHouseNo', 'o_toAddress', 'o_toStreet', 'o_toBarangay', 'o_toCity', 'o_toProvince', 'o_toLandmark', 'o_toNote', 'o_toZipCode', 'o_totalAmount', 'o_status', 'o_preparing_at', 'o_void_at', 'o_onBoard_at', 'o_paid_at', 'o_delivered_at', 'stats', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'u_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tOrderItems()
    {
        return $this->hasMany(t_order_item::class, 'o_id', 'o_id');
    }
}
