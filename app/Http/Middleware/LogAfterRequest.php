<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\TerminableMiddleware;
use Illuminate\Support\Facades\Log;

class LogAfterRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
    public function terminate($request, $response)
    {
        $logFile = 'log.txt';
        Log::useDailyFiles(storage_path().'/logs/'.$logFile);
        Log::info('app.requests', ['request' => $request->all()]);
    }
}
