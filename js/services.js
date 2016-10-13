angular.module('inspinia.servicios', [])

.service('Catalogos', function($http, $q){
	
	this.Comerciantes = function(buscar, currentPage, pageLimit){
		var deferred = $q.defer();

  		$http.get(servidor+'ConsultaCausante.php?buscar='+buscar+"&currentPage="+currentPage+"&pageLimit="+pageLimit).then(function (response, status, headers, config) {
            deferred.resolve(response.data);
        }, function(data, status){
        	deferred.reject("Error Consulta Causante");
        });

  		return deferred.promise;
  	}
})