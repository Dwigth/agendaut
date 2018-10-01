/**
 * @author Ing. Dwigth Astacio Hernández
 */
export function getUserObject(user = '') {
    //se quita de la cadena la palabra "bienvenido" y los caracteres " : "
   let name_string =  user.substring(13,user.length);
   
   let whitespace = name_string.indexOf(" ");
   let names = [];
   while(whitespace > 0) {
    names.push(name_string.substring(0,whitespace));
    name_string = name_string.substring(whitespace+1,name_string.length);
    whitespace = name_string.indexOf(" ");
   }
   //se aigna la última cadena que queda
   names.push(name_string.substring(0,name_string.length));

   return JSON.stringify(names);
}