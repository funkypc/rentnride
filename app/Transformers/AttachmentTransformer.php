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

namespace App\Transformers;

use App\Attachment;
use App\Services\AttachmentService;
use League\Fractal;

/**
 * Class AttachmentTransformer
 */
class AttachmentTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param  Attachment  $attachment
     * @return array
     */
    public function transform(Attachment $attachment)
    {
        $output = [];
        $output['thumb'] = AttachmentService::getThumbUrl($attachment, $attachment->attachmentable_id);

        return $output;
    }
}
