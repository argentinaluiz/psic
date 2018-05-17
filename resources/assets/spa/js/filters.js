import Vue from 'vue';
/*
Verificamos se o valor existe e se ele é maior ou igual a 10.
Caso a condicional seja atendida, os 10 primeiros caracteres são capturados. Trata-se da data sem a hora e explodimos em todo traço - que tiver nesta data, formando um array de 3 posições. Depois disso, invertemos as posições e percorremos os dados do array, adicionando barra entre cada posição.
Lembrando que caso o valor não satisfaça a condicional, o filtro retornará o próprio valor.
*/
Vue.filter('dateBr', function (value) { //0000-00-00
    if (value && value.length >= 10) {
        let dateArray = value.substring(0, 10).split('-');
        if (dateArray.length === 3) {
            return dateArray.reverse().join('/');
        }
    }
    return value;
});

Vue.filter('dateTimeBr', function (value) { //0000-00-00
    if (value && value.length >= 16) {
        let dateArray = value.substring(0, 10).split('-');
        if (dateArray.length === 3) {
            return dateArray.reverse().join('/').replace('T','');
        }
    }
    return value;
});

Vue.filter('truncate', function (str, length) { 
    var output = str;
    if (output.length > length) {
        output = str.substring(0, length) + '...';
    }
    return output;
});

Vue.filter('classInformationAlias', function(classInformation){
    return `${classInformation.name}.${classInformation.semester}.${classInformation.year}`;
})
