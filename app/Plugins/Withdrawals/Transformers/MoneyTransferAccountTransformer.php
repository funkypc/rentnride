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

namespace Plugins\Withdrawals\Transformers;

use App\Transformers\UserTransformer;
use League\Fractal;
use Plugins\Withdrawals\Model\MoneyTransferAccount;

class MoneyTransferAccountTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'User',
    ];

    public function transform(MoneyTransferAccount $money_transfer_account)
    {
        $output = array_only($money_transfer_account->toArray(), ['id', 'account', 'user_id', 'is_primary']);

        return $output;
    }

    /**
     * @param  MoneyTransferAccount  $money_transfer_account
     * @return Fractal\Resource\Item
     */
    public function includeUser(MoneyTransferAccount $money_transfer_account)
    {
        if ($money_transfer_account->user) {
            return $this->item($money_transfer_account->user, new UserTransformer());
        } else {
            return null;
        }
    }
}
