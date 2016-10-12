angular
  .module('inspinia')
  .filter('startFrom',function(){
        return function(input, start) {
            if(input) {
                start = +start; //parse to int
                return input.slice(start);
            }
            return [];
        }
  })
  .controller('PagosController',function($scope, $http, $uibModal){
    
    $scope.datos = {
      comerciante: {
        nombre: "nombre",
        ubicacion: "ubicacion",
        giro: "giro",
        tipo: "tipo ",
        horario: "horario",
        vigencia_permiso: "vigencia del permiso",
        dimensiones: "dimensiones",
        lic_sanitaria: "licencia sanitaria",
        observaciones: "observaciones",
        cuota: "100.00"
      },
      pagos:[
        {fecha: "2016/06/10", comentarios: "comentarios", cantidad: "100.00"},
        {fecha: "2016/06/12", comentarios: "comentarios 2da sdsada", cantidad: "200.00"},
        {fecha: "2016/06/12", comentarios: "comentarios 2da sdsada", cantidad: "200.00"},
      ]
    };

    $scope.agregarPago = function(){
      var modalInstance = $uibModal.open({
          templateUrl: 'views/pagos/modal_agregar.html',
          controller: function($scope, $http, $uibModalInstance){
              
            $scope.modal = {
              cantidad : 0
            };

            $scope.ok = function () {
              // se hace el post al php
              console.log($scope.modal.cantidad);
              $uibModalInstance.close();
            };

            $scope.cancel = function () {
              $uibModalInstance.dismiss('cancel');
            };
          },
          scope: $scope
      });
    };

  });