<?php
/**
 * APP
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

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
     * @var string
     */
    protected $table = 'attachments';

    protected $fillable = [
        'filename', 'dir', 'mimetype', 'filesize', 'height', 'width',
    ];

    /**
     * Get all of the owning likeable models.
     */
    public function attachmentable()
    {
        return $this->morphTo();
    }
}
