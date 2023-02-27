<?php namespace Mberizzo\Faq\Components;

use Cms\Classes\ComponentBase;
use Mberizzo\Faq\Models\FaqCategory;

class FaqList extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'FaqList Component',
            'description' => 'Listado de categorias con sus preguntas',
        ];
    }

    public function defineProperties()
    {
        return [
            'category_slug' => [
                'title'       => 'Category slug',
                'description' => 'Filtra la categoria por el slug',
                'default'     => '{{ :slug }}',
                'type'        => 'string',
            ],
        ];
    }

    public function onRun()
    {
        $faqCategories = FaqCategory::where('is_active', 1);

        if ($categorySlug = $this->properties['category_slug']) {
            $faqCategories
                ->where('slug', $categorySlug)
                ->with('questions');
        }

        $this->page['faqCategories'] = $faqCategories->get();
        $this->page['categorySlug'] = $categorySlug;
    }
}
