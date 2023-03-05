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

namespace Plugins\Withdrawals\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WithdrawalStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'withdrawal_statuses';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user_cash_withdrawal()
    {
        return $this->hasMany(UserCashWithdrawal::class);
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
