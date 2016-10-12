

angular
    .module('inspinia')


  	.controller('CapturaController',function($scope,$http){
    		

    		$scope.formmodel={};

    		$scope.onSubmit= function(){
    			
    			console.log(JSON.stringify($scope.formmodel));
 						
		                $http.post('http://162.144.36.113/angular/procesos.php', JSON.stringify($scope.formmodel)).then(function (data){
		                
		                       console.log(data);
		                      

		                 });
			};	

    		
    		


   	});

  	