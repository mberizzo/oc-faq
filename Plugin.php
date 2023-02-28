<?php namespace Mberizzo\Faq;

use Illuminate\Support\Facades\Event;
use Mberizzo\Faq\Classes\FaqCategorySearchProvider;
use Mberizzo\Faq\Classes\FaqSearchProvider;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    /**
     * @var array Plugin dependencies
     */
    public $require = [
        'Inetis.ListSwitch',
        'GinoPane.AwesomeIconsList',
        'OFFLINE.SiteSearch',
    ];

    public function registerComponents()
    {
        return [
            'Mberizzo\Faq\Components\FaqList' => 'faqList',
        ];
    }

    public function boot()
    {
        Event::listen('offline.sitesearch.extend', function () {
            return [new FaqSearchProvider(), new FaqCategorySearchProvider()];
        });
    }
}
