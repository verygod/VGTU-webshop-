<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('admin'))
         {
            if (!Auth::user()->hasPermissionTo('Administer roles & permissions'))
            {
                return redirect('/')->with('flash_message','Tokio puslapio nėra.');
            }
         else {
                return $next($request);
            }
        }

        if ($request->is('products'))
         {
            if (!Auth::user()->hasPermissionTo('Administer roles & permissions'))
            {
                return redirect('/')->with('flash_message','Tokio puslapio nėra.');
            }
         else {
                return $next($request);
            }
        }

        if ($request->is('category'))
         {
            if (!Auth::user()->hasPermissionTo('Administer roles & permissions'))
            {
                return redirect('/')->with('flash_message','Tokio puslapio nėra.');
            }
         else {
                return $next($request);
            }
        }

        if ($request->is('supplier'))
         {
            if (!Auth::user()->hasPermissionTo('Administer roles & permissions'))
            {
                return redirect('/')->with('flash_message','Tokio puslapio nėra.');
            }
         else {
                return $next($request);
            }
        }


        if ($request->isMethod('Delete')) //If user is deleting a post
         {
            if (!Auth::user()->hasPermissionTo('Delete Post')) {
                return redirect('/')->with('flash_message','Tokio puslapio nėra.');
            }
         else
         {
                return $next($request);
            }
        }

        return $next($request);
    }
}
