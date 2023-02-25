<?php namespace Mberizzo\Faq\Components;

use Cms\Classes\ComponentBase;
use Mberizzo\Faq\Models\FaqCategory;

class FaqList extends ComponentBase
{
    public $faqCategories;

    public function componentDetails()
    {
        return [
            'name' => 'FaqList Component',
        ];
    }

    public function onRun()
    {
        $this->faqCategories = FaqCategory::query()
            ->where('is_active', 1)
            ->with('questions')
            ->get();

        $this->page['faqCategories'] = $this->faqCategories;
    }
}
