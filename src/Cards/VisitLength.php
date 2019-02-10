<?php

namespace Rocramer\MatomoAnalytics\Cards;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\TrendResult;
use Rocramer\MatomoAnalytics\CustomizedTrend;
use Rocramer\MatomoAnalytics\Helper\MatomoAPI;

class VisitLength extends CustomizedTrend
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
        // Get Visit Length Sum
        $visit_length = MatomoAPI::visitsSummary('getSumVisitsLength', $request->range);

        // Get Page Visits
        $visits = MatomoAPI::visitsSummary('getVisits', $request->range);

        // Divide to get percentage
        $results = [];

        $keys = array_keys($visit_length);

        foreach ($keys as $key) {
            if ($visits[$key]) {
                $value = $visit_length[$key] / $visits[$key];
                $value = (int) round($value);
                $results[$key] = $value;
            }
        }

        return (new TrendResult())
            ->trend($results)
            ->showLatestValue()
            ->suffix(__('seconds (avg.)'));
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'visit-length';
    }
}
