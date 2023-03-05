<?php
/**
 * Rent & Ride
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

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthenticateRole
 */
class AuthenticateRole
{
    /**
     * @param    $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user()->toArray();
        if ($user['role_id'] != config('constants.ConstUserTypes.Admin')) {
            throw new \Symfony\Component\HttpKernel\Exception\BadRequestHttpException('Authentication failed');
        }

        return $next($request);
    }
}
