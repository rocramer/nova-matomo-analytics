<?php

namespace Rocramer\MatomoAnalytics\Cards;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\TrendResult;
use Rocramer\MatomoAnalytics\CustomizedTrend;
use Rocramer\MatomoAnalytics\Helper\MatomoAPI;

class Outlinks extends CustomizedTrend
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
        $results = MatomoAPI::visitsSummary('getActions', $request->range, 'actionType==outlinks');

        return (new TrendResult())
            ->trend($results)
            ->showSumValue();
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'outlinks';
    }
}
