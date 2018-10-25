/**
 * @author Ing. Dwigth Astacio Hernández
 * @description
 * Este metodo manejará las peticiones http necesarias para la comunicación con la
 * API de agendaUT.
 * @todo IMPORTANTE en localhost del apache appserv no funcionan las peticiones ajax en navegadores móviles
 * @param {El método que se ejecutará GET,POST,PUT,DELETE} method
 * @param {Url de destino} url
 * @param {Datos de parametros} data
 */
export function http_request(method, url, data, dataType) {

    return new Promise(function (resolve, reject) {
        let request = new XMLHttpRequest();
        console.log('Creando el request');
        request.onload = function () {
            resolve(JSON.parse(this.responseText));
        }
        request.onerror = reject;
        request.open(method, url, true);
        request.setRequestHeader('Content-Type', dataType);
        request.send(data);
    });

}
export function http_get(url) {
    return new Promise ((resolve,reject)=>{
        fetch(url)
        .catch(function(e){
            reject(e);
        })
        .then(function (response) {
            return response.json();
        })
        .then(function (myJson) {
            resolve(myJson);
        });
    })

}