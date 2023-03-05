<?php
/**
 * Plugin
 *
 * PHP version 5
 *
 * @category   PHP
 *
 * @author     Agriya <info@agriya.com>
 * @copyright  2018 Agriya Infoway Private Ltd
 * @license    http://www.agriya.com/ Agriya Infoway Licence
 *
 * @link       http://www.agriya.com
 */

namespace Plugins\Paypal\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class PaypalTransactionLog
 */
class PaypalTransactionLog extends Model
{
    /**
     * @var string
     */
    protected $table = 'paypal_transaction_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'amount', 'payment_id', 'paypal_pay_key', 'status', 'payment_type', 'buyer_email', 'buyer_address', 'authorization_id', 'payer_id', 'capture_id', 'void_id', 'refund_id', 'fee_payer', 'paypal_transaction_fee',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function paypal_transaction_logable()
    {
        return $this->morphTo();
    }

    /**
     * @param    $query
     * @param  Request  $request
     * @return mixed
     */
    public function scopeFilterByRequest($query, Request $request)
    {
        $query->orderBy($request->input('sort', 'id'), $request->input('sortby', 'desc'));

        return $query;
    }
}
