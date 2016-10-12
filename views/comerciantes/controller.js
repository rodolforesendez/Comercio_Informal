angular
  .module('inspinia')
  .controller('Comerciantes', function($scope, $http){

    $scope.loading = false;
    $scope.buscar  = "";
    $scope.currentPage = 1;
    $scope.entryLimit  = 1;

    $scope.comerciantes = [
      { idcomerciante: 1, nombre: "a es ta le pongo algo diferente deinformacion", giro: "tipo de giro dos", tipo: "tipo", vigencia: "fecha de vigencia"},
      { idcomerciante: 2, nombre: "rodolfo resendez", giro: "tipo de giro", tipo: "tipo", vigencia: "fecha de vigencia"},
    ];

    $scope.totalItems = $scope.comerciantes.length;

    $scope.filtrar = function(){
      console.log("buscando por "+ $scope.buscar);
    };

    $scope.setPage = function( page ){
      $scope.currentPage = page;
    };

    $scope.borrarComerciante = function( index ){
      $scope.comerciantes.splice(index, 1);
    };
  })

  .controller('CapturaController',function($scope,$http){
    		
    		$scope.formmodel={};

    		$scope.onSubmit= function(){
    			
    			console.log(JSON.stringify($scope.formmodel));
 						
		             /*   $http.post('http://162.144.36.113/angular/procesos.php', JSON.stringify($scope.formmodel)).then(function (data){
		                
		                       console.log(data);
		                      

		                 });
                     */
			};	

  });
