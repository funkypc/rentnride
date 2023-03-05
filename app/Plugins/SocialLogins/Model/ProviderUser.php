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

namespace Plugins\SocialLogins\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProviderUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'provider_id', 'access_token', 'profile_picture_url', 'is_connected', 'foreign_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
