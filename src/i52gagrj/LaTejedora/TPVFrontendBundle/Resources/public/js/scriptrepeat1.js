angular
    .module('apiApp', [])
    .controller('apiAppCtrl', controladorPrincipal);

function controladorPrincipal($scope, $http){
    var vm=this;

    vm.orden = false;
    vm.campo = "name";
    
    var url = "http://api.openbeerdatabase.com/v1/beers.json?callback=JSON_CALLBACK";
    if(vm.nombre){
        url += "&query=" + vm.nombre

        $http.jsonp(url).success(function(respuesta){
            console.log("res:", respuesta);
            vm.cervezas = respuesta.beers;
        });

    }
    vm.buscaCervezas = function(){
        $http.jsonp(url).success(function(respuesta){
            console.log("res:", respuesta);
            vm.cervezas = respuesta.beers;
        });
    }
}
