<?php

namespace Foostart\Service;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;

use URL, Route;
use Illuminate\Http\Request;


class ServiceServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
         $this->publishes([
            __DIR__.'/config/service_admin.php' => config_path('service_admin.php'),
        ],'config');
         
         $this->publishes([
        __DIR__.'/public' => public_path('foostart'),
    ], 'public'); 
		


        $this->loadViewsFrom(__DIR__ . '/views', 'service');


        /**
         * Translations
         */
         $this->loadTranslationsFrom(__DIR__.'/lang', 'service');


        /**
         * Load view composer
         */
        $this->serviceViewComposer($request);

         $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations')
            ], 'migrations');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Service\Controllers\Admin\ServiceAdminController');
                $this->app->make('Foostart\Service\Controllers\Front\ServiceFrontController');

         /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'service');
    }

    /**
     *
     */
    public function serviceViewComposer(Request $request) {

        view()->composer('service::service*', function ($view) {
            global $request;
            $service_id = $request->get('id');
            $is_action = empty($service_id)?'page_add':'page_edit';

            $view->with('sidebar_items', [

                /**
                 * Services
                 */
                //list
                trans('service::service_admin.page_list') => [
                    'url' => URL::route('admin_service'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('service::service_admin.'.$is_action) => [
                    'url' => URL::route('admin_service.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],

//                /**
//                 * Categories
//                 */
//                //list
                trans('service::service_admin.page_category_list') => [
                 'url' => URL::route('admin_service_category'),
                  "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}
