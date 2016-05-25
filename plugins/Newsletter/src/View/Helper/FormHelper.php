<?php
namespace Newsletter\View\Helper;

use Cake\Utility\Hash;
use Cake\View\Helper\FormHelper as BaseFormHelper;
use Cake\View\View;

/**
 * Form helper override
 */
class FormHelper extends BaseFormHelper
{

    public function select($fieldName, $options = [], array $attributes = [])
    {
        if (isset($attributes['multiple'])) {
            $attributes['multiple'] = 'checkbox';
        }

        return parent::select($fieldName, $options, $attributes);
    }
}
