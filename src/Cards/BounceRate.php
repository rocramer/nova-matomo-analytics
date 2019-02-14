<?php

namespace Rocramer\MatomoAnalytics\Cards;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\TrendResult;
use Rocramer\MatomoAnalytics\CustomizedTrend;
use Rocramer\MatomoAnalytics\Helper\MatomoAPI;

class BounceRate extends CustomizedTrend
{
    /**
     * Calculate the value of the metric.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function calculate(Request $request)
    {
        // Get Bounce Count
        $bounce_count = MatomoAPI::visitsSummary('getBounceCount', $request->range);

        // Get Page Visits
        $visits = MatomoAPI::visitsSummary('getVisits', $request->range);

        // Divide to get percentage
        $results = [];

        $keys = array_keys($bounce_count);

        foreach ($keys as $key) {
            if ($visits[$key]) {
                $value = $bounce_count[$key] / $visits[$key] * 100;
                $value = (int) round($value);
                $results[$key] = $value;
            }
        }

        return (new TrendResult())
            ->trend($results)
            ->showLatestValue()
            ->suffix('%');
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'bounce-count';
    }
}
