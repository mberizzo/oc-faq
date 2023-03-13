<?php

namespace Mberizzo\Faq\Classes;

use Mberizzo\Faq\Models\FaqCategory;
use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;

class FaqCategorySearchProvider extends ResultsProvider
{
    public function search()
    {
        // Get your matching models
        $matching = FaqCategory::query()
            ->where('name', 'like', "%{$this->query}%")
            ->orWhere('description', 'like', "%{$this->query}%")
            ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->name;
            $result->url       = "/faq/{$match->slug}";
            $result->model     = $match;

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }

    public function displayName()
    {
        return 'category';
    }

    public function identifier()
    {
        return 'Mberizzo.Faq';
    }
}
