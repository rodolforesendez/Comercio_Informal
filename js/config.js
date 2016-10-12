/**
 * INSPINIA - Responsive Admin Theme
 *
 * Inspinia theme use AngularUI Router to manage routing and views
 * Each view are defined as state.
 * Initial there are written state for all view in theme.
 *
 */
function config($stateProvider, $urlRouterProvider, $ocLazyLoadProvider) {
    $urlRouterProvider.otherwise("/index/comerciantes");

    $ocLazyLoadProvider.config({
        // Set to true if you want to see what and when is dynamically loaded
        debug: false
    });

    $stateProvider

        .state('index', {
            abstract: true,
            url: "/index",
            templateUrl: "views/common/content.html",
        })

        /* RUTAS DE COMERCIANTES */
        .state('index.comerciantes', {
            url: "/comerciantes",
            templateUrl: "views/comerciantes/index.html",
            controller: "Comerciantes",
            data: { pageTitle: 'Listado de Comerciantes' }
        })

        /* RUTAS DE PAGOS */
        .state('index.pagos', {
            url: "/pagos/:id",
            templateUrl: "views/pagos/index.html",
            controller: "PagosController",
            data: { pageTitle: 'Registrar Pago' }
        })        
      
}
angular
    .module('inspinia')
    .config(config)
    .run(function($rootScope, $state) {
        $rootScope.$state = $state;
    });
