<?php
/**
 * APP
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    RENT&RIDE
 * @subpackage Core
 * @author     Agriya <info@agriya.com>
 * @copyright  2018 Agriya Infoway Private Ltd
 * @license    http://www.agriya.com/ Agriya Infoway Licence
 * @link       http://www.agriya.com
 */

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attachment
 * @package App
 */
class Attachment extends Model
{
    /**
     * @var string
     */
    protected $table = "attachments";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'dir', 'mimetype', 'filesize', 'height', 'width', 'created_at', 'updated_at', 'attachmentable_type'
    ];


    /**
     * Get all of the owning likeable models.
     */
    public function attachmentable()
    {
        return $this->morphTo();
    }

}
