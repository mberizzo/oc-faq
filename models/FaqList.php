<?php namespace Mberizzo\Faq\Models;

use Mberizzo\Faq\Models\FaqCategory;
use Model;

/**
 * Model
 */
class FaqList extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mberizzo_faq_list';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'category' => FaqCategory::class,
    ];

    public function getCategoryIdOptions()
    {
        return FaqCategory::get()->pluck('name', 'id');
    }

}
