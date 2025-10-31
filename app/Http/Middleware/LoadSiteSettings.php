<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Setting;

class LoadSiteSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('setup')) {
            return $next($request);
        }
        if (!session()->has('site_settings')) {
            $settings = Setting::whereIn('name', [
                'site_title', 'site_logo', 'site_favicon', 'social', 'email', 'address', 'map'
            ])->get()->keyBy('name');
            session([
                'site_settings' => [
                    'site_title' => $settings['site_title']->data ?? '',
                    'site_logo' => !empty($settings['site_logo'])?$settings['site_logo']->getFirstMediaUrl('site_logo') : '#',
                    'site_favicon' => !empty($settings['site_favicon'])?$settings['site_favicon']->getFirstMediaUrl('site_favicon') : '#',
                    'social' => $settings['social']->data ?? '',
                    'email' => $settings['email']->data ?? '',
                    'address'=> $settings['address']->data ?? '',
                    'map'=> $settings['map']->data ?? ''
                ]
            ]);
        }
        return $next($request);
    }
}
