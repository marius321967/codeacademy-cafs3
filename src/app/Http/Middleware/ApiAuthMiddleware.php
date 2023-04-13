<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Sample middleware that would authenticate API requests
 * by reading Authorization token and extracting user from it
 */
class ApiAuthMiddleware
{

  public function handle(Request $request, Closure $next): Response
  {
    $token = $request->header('Authorization');
    if (!$token)
      throw new UnauthorizedException();

    // our 'secret' token in this case is just the user ID.
    // don't do this in real applications! Use a format like JWT
    $userId = $token;
    $user = User::find($userId);
    if (!$user)
      throw new UnauthorizedException();

    $request->setUserResolver(function () use ($user) {
      return $user;
    });

    return $next($request);
  }
}
