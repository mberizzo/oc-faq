<?php namespace Mberizzo\Faq\Models;

use Illuminate\Support\Str;
use Mberizzo\Faq\Models\FaqList;
use Model;

/**
 * Model
 */
class FaqCategory extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mberizzo_faq_categories';

    protected $slugs = ['slug' => 'name'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => ['required', 'unique:mberizzo_faq_categories'],
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

    public function beforeSave()
    {
        $this['slug'] = Str::slug($this->name);
    }

}
