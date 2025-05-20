<?php
// -app/Providers/AppServiceProvider.php
namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * -Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * -Bootstrap any application services.
     */
    public function boot(): void
    {
       /*Model::automaticallyEagerLoadRelationships() est une fonctionnalité 
       puissante introduite dans Laravel 12.8 qui simplifie la gestion des 
       relations Eloquent en évitant les problèmes de requêtes N+1.
        Elle permet d'écrire un code plus propre et plus maintenable,
         tout en améliorant les performances de votre application.*/
      Model::automaticallyEagerLoadRelationships();
    }
}
