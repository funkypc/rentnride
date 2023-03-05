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

namespace Plugins\Paypal\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Paypal;
use Plugins\Paypal\Services\PayPalService;
use Plugins\Paypal\Services\PaypalTransactionLogService;

/**
 * Paypal resource representation.
 *
 * @Resource("Paypal")
 */
class PaypalController extends Controller
{
    /**
     * @var
     */
    private $_api_context;

    /**
     * @var
     */
    private $paypalService;

    /**
     * @var
     */
    private $paypalLog;

    public function __construct()
    {
        $this->setPaypalTransactionLogService();
        $this->setPayPalService();
    }

    public function setPaypalTransactionLogService()
    {
        $this->paypalLog = new PaypalTransactionLogService();
    }

    public function setPayPalService()
    {
        $this->paypalService = new PayPalService();
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function processPayment(Request $request)
    {
        if ($request->has('paymentId') && $request->has('PayerID') && $request->has('token')) {
            $response = $this->paypalService->executePayment($request->get('paymentId'), $request->get('PayerID'), $request->get('token'));

            return redirect($response['returnUrl']);
        } else {
            return $this->response->errorNotFound('Invalid Request');
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getCancel()
    {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        return view('checkout.cancel');
    }
}
