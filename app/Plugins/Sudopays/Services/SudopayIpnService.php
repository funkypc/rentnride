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

namespace Plugins\Sudopays\Services;

use App\Services\IpService;
use Plugins\Sudopays\Model\SudopayIpnLog;

class SudopayIpnService
{
    /**
     * @var
     */
    protected $ipService;

    /**
     * SudopayIpnService constructor.
     */
    public function __construct()
    {
        $this->setIpService();
    }

    /**
     * Ipservice object created
     */
    public function setIpService()
    {
        $this->ipService = new IpService();
    }

    /**
     * @param $request
     * @param $ip
     * @return static
     */
    public function log($request, $ip)
    {
        $log = [];
        $log['ip'] = $this->ipService->getIpId($ip);
        $log['post_variable'] = serialize($request);

        return SudopayIpnLog::create($log);
    }
}
