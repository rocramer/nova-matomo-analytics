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
     * Get the displayable name of the metric.
     *
     * @return string
     */
    public function name()
    {
        return __(parent::name());
    }

    /**
     * Create a new trend metric result.
     *
     * @param string|null $value
     *
     * @return \Laravel\Nova\Metrics\TrendResult
     */
    public function result($value = null)
    {
        return new TrendResult($value);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            7   => '7 '.__('Days'),
            14  => '14 '.__('Days'),
            30  => '30 '.__('Days'),
            90  => '90 '.__('Days'),
            180 => '180 '.__('Days'),
            365 => '365 '.__('Days'),
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        if ($cacheMinutes = config('services.matomo.caching', 5)) {
            return now()->addMinutes($cacheMinutes);
        }
    }
}
