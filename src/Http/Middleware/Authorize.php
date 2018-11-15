<?php

namespace Rocramer\MatomoAnalytics\Http\Middleware;

use Rocramer\MatomoAnalytics\MatomoAnalytics;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(MatomoAnalytics::class)->authorize($request) ? $next($request) : abort(403);
    }
}
