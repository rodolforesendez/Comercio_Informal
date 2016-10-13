angular
  .module('inspinia')
  .controller('Comerciantes', function($scope, $http, Catalogos){

    $scope.loading = true;
    $scope.buscar  = "";
    $scope.currentPage = 1;
    $scope.entryLimit  = 22;

    Catalogos.Comerciantes($scope.buscar, $scope.currentPage, $scope.entryLimit).then(function(response){
      $scope.comerciantes = response.comerciantes;
      $scope.totalItems = response.totalItems;
      $scope.loading = false;
    });

    $scope.filtrar = function(){
      $scope.currentPage = 1;
      $scope.loading = true;
      Catalogos.Comerciantes($scope.buscar, $scope.currentPage, $scope.entryLimit).then(function(response){
        $scope.comerciantes = response.comerciantes;
        $scope.totalItems = response.totalItems;
        $scope.loading = false;
      });
    };

    $scope.setPage = function( page ){
      $scope.currentPage = page;
      $scope.loading = true;
      Catalogos.Comerciantes($scope.buscar, $scope.currentPage, $scope.entryLimit).then(function(response){
        $scope.comerciantes = response.comerciantes;
        $scope.totalItems = response.totalItems;
        $scope.loading = false;
      });
    };

    $scope.borrarComerciante = function( index ){
      $scope.comerciantes.splice(index, 1);
    };
  })

  .controller('CapturaController',function($scope,$http){
    		
        $http.get(servidor+'ObtenerGiro.php').then(function (response){
          $scope.giros = response.data;
        });

    		$scope.onSubmit= function(){
    			
    			console.log(JSON.stringify($scope.formmodel));
 						
		             /*   $http.post('http://162.144.36.113/angular/procesos.php', JSON.stringify($scope.formmodel)).then(function (data){
		                
		                       console.log(data);
		                      

		                 });

                     */

			};	

  });
