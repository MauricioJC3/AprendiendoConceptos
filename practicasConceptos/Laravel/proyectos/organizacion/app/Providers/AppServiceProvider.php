<?php
// app/Providers/AuthServiceProvider.php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Board;
use App\Policies\BoardPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Board::class => BoardPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}