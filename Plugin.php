<?php namespace Mberizzo\Faq;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    /**
     * @var array Plugin dependencies
     */
    public $require = [
        'Inetis.ListSwitch',
        'GinoPane.AwesomeIconsList',
    ];

    public function registerComponents()
    {
        return [
            'Mberizzo\Faq\Components\FaqList' => 'faqList',
        ];
    }

    public function registerSettings()
    {
    }
}
