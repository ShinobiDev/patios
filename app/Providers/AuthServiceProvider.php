<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\Entry' => 'App\Policies\EntryPolicy',
        'App\Crane' => 'App\Policies\CranePolicy',
        'App\Rate' => 'App\Policies\RatePolicy',
        'App\Invoce' => 'App\Policies\InvocePolicy',
        'App\Salida' => 'App\Policies\SalidaPolicy',
        'App\Daringreso' => 'App\Policies\DaringresoPolicy',
        'App\Yard' => 'App\Policies\YardPolicy',
        'App\Report' => 'App\Policies\ReportPolicy',
        'App\Owenr' => 'App\Policies\OwenrPolicy',
        'App\Proveedores_gruas' => 'App\Policies\Proveedores_gruasPolicy',
        'App\Section' => 'App\Policies\SectionPolicy',
        'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',
        'Spatie\Permission\Models\Permission' => 'App\Policies\PermissionPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
