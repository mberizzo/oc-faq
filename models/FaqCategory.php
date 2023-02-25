<?php namespace Mberizzo\Faq\Models;

use Mberizzo\Faq\Models\FaqList;
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
        'name' => ['required'],
        'icon' => ['required'],
    ];

    public $hasMany = [
        'questions' => [
            FaqList::class,
            'order'      => 'sort_order asc',
            'conditions' => 'is_active = 1',
            'key' => 'category_id',
            'otherKey' => 'id',
        ],
    ];

    public function getIconOptions()
    {
        return [];
    }

}
