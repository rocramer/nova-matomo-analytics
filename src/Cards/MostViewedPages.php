<?php

namespace Rocramer\MatomoAnalytics\Cards;

use Laravel\Nova\Card;

class MostViewedPages extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/2';

    public function __construct()
    {
        $this->withMeta(['title' => __("Most Viewed Pages")]);

        $this->withMeta(['ranges' => [
            7 => '7 ' . __('Days'),
            14 => '14 ' . __('Days'),
            30 => '30 ' . __('Days'),
            90 => '90 ' . __('Days'),
        ]]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'most-viewed-pages';
    }
}