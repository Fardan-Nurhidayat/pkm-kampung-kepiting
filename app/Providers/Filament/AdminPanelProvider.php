<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Http\Middleware\TrustProxies;
use App\Http\Middleware\EnsureUserIsAdmin;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Filament\Resources\BlogsResource\Widgets\BlogsOverview;
use App\Filament\Resources\ProductResource\Widgets\ProductsOverview;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->favicon(asset('assets/images/favicon.png'))
            ->brandName('PKM PNC')
            ->spa()
            ->id('admin')
            ->path('admin')
            ->login(null)
            ->profile(isSimple: false)
            ->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('66rem')
            ->topNavigation()
            ->breadcrumbs(false)
            ->colors([
                'primary' => [
                    50 => '252, 237, 236',   // Very light
                    100 => '249, 219, 217',  // Light
                    200 => '243, 183, 179',  // Light medium
                    300 => '237, 147, 141',  // Medium light
                    400 => '227, 107, 98',   // Medium
                    500 => '217, 67, 54',    // Base color
                    600 => '195, 60, 49',    // Medium dark
                    700 => '163, 50, 41',    // Dark
                    800 => '130, 40, 33',    // Darker
                    900 => '106, 33, 26',    // Very dark
                    950 => '65, 20, 16',     // Darkest
                ],
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                BlogsOverview::class,
            ])
            ->middleware([
                'web',
                EnsureUserIsAdmin::class,
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ]);
    }
}
