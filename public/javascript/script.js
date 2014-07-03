var app = angular.module("MyApp", [])

app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('##');
	$interpolateProvider.endSymbol('##');
});

app.controller('IngredientesController', function ($scope) {
    var id_counter = 1;

    $scope.ingredientes = [ {nome:'Ingrediente 1'} ];
    $scope.add = function () {
        id_counter += 1;
        $scope.ingredientes.push({nome: 'Ingrediente ' + id_counter})
    };
    $scope.remove = function () {
        $scope.ingredientes.remove;
    };
    $scope.remove = function (index) {
        $scope.ingredientes.splice(index, 1);
    }
});



