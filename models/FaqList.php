<?php namespace Mberizzo\Faq\Models;

use Illuminate\Support\Str;
use Mberizzo\Faq\Models\FaqCategory;
use Model;

/**
 * Model
 */
class FaqList extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mberizzo_faq_list';

    protected $slugs = ['slug' => 'title'];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'title' => ['required', 'unique:mberizzo_faq_list'],
        'category_id' => ['required'],
        'content' => ['required'],
    ];

    public $belongsTo = [
        'category' => FaqCategory::class,
    ];

    public function beforeSave()
    {
        $this['slug'] = Str::slug($this->title);
    }

    public function getCategoryIdOptions()
    {
        return FaqCategory::get()->pluck('name', 'id');
    }

}
