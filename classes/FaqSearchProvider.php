<?php

namespace Mberizzo\Faq\Classes;

use Mberizzo\Faq\Models\FaqList;
use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;

class FaqSearchProvider extends ResultsProvider
{
    public function search()
    {
        // Get your matching models
        $matching = FaqList::query()
            ->where('title', 'like', "%{$this->query}%")
            ->orWhere('content', 'like', "%{$this->query}%")
            ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->title;
            $result->url       = "/faq/{$match->category->slug}#{$match->slug}";
            $result->model     = $match;

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }

    public function displayName()
    {
        return 'Pregunta';
    }

    public function identifier()
    {
        return 'Mberizzo.Faq';
    }
}
