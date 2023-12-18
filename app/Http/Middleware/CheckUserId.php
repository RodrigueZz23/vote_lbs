<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$allowedIds)
{
    $userId = auth()->id();

    // Vérifie si l'ID de l'utilisateur est autorisé
    if (!in_array($userId, $allowedIds)) {
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
}
}
