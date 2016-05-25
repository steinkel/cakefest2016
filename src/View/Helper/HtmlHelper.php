<?php
namespace App\View\Helper;

use Cake\View\Helper\HtmlHelper as BaseHelper;
use Cake\View\View;

/**
 * Html helper
 */
class HtmlHelper extends BaseHelper
{
    public function image($path, array $options = [])
    {
        if (empty($options['alt']) && !empty($options['title'])) {
            $options['alt'] = $options['title'];
        }
        return parent::image($path, $options);
    }
}
