<?php

namespace Christhompsontldr\LaravelRestricted\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RestrictedController extends Controller
{
    /**
     * Enter restricted mode
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function enter()
    {
        session([
            'laravel-restricted.enabled'  => true,
            'laravel-restricted.intended' => url()->previous(),
        ]);

        return redirect()->route(config('restricted.routes.landing_page'));
    }

    /**
     * Exit restricted mode
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function exit(Request $request)
    {
        if (!Hash::check($request->input('password'), auth()->user()->password)) {
            return back()
                ->with('error', 'Please enter your password.');
        }

        session()->forget('laravel-restricted.enabled');

        return redirect()
            ->to(session()->pull('laravel-restricted.intended'))
            ->with('success', 'You have exited restricted mode.');
    }
}
