
function MainCtrl2() {

    this.userName = 'Example user';
    this.helloText = 'Welcome in SeedProject';
    this.descriptionText = 'It is an application skeleton for a typical AngularJS web app. You can use it to quickly bootstrap your angular webapp projects and dev environment for these projects.';
    

};


angular
    .module('inspinia')
    /*.controller('MainCtrl', MainCtrl)*/

    	.controller('MainCtrl',function($scope,$http){
    		

    		$scope.formmodel={};

    		$scope.onSubmit= function(){
    			
    			console.log(JSON.stringify($scope.formmodel));
 						
		                $http.post('http://162.144.36.113/angular/procesos.php', JSON.stringify($scope.formmodel)).then(function (data){
		                
		                       console.log(data);
		                      

		                 });
			};	

    		
    		


    	});

  	

