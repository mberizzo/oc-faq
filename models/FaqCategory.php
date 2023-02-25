<?php namespace Mberizzo\Faq\Models;

use Model;

/**
 * Model
 */
class FaqCategory extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mberizzo_faq_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getIconOptions()
    {
        return [];
    }

}
