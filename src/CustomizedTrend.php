<?php

namespace Rocramer\MatomoAnalytics;

use Laravel\Nova\Metrics\Trend;
use Laravel\Nova\Metrics\TrendResult;

abstract class CustomizedTrend extends Trend
{
    /**
     * The element's component.
     *
     * @var string
     */
    public $component = 'custom-trend-metric';

    /**
     * Create a new trend metric result.
     *
     * @param  string|null  $value
     * @return \Laravel\Nova\Metrics\TrendResult
     */
    public function result($value = null)
    {
        return new TrendResult($value);
    }


}