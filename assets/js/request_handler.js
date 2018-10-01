/**
 * @author Ing. Dwigth Astacio Hernández
 */

 /**
  * * @description
  * Este metodo manejará las peticiones http necesarias para la comunicación con la 
  * API de agendaUT.
  * @todo IMPORTANTE en localhost del apache appserv no funcionan las peticiones ajax en navegadores móviles
  * @param {El método que se ejecutará GET,POST,PUT,DELETE} method 
  * @param {Url de destino} url 
  * @param {Datos de parametros} data 
  */
export function http_request(method,url,data,dataType) {
   return $.ajax({
        method: method,
        url:url,
        dataType:dataType,
        data:data,
    });
}
