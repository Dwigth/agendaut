/**
 * @author Ing. Dwigth Astacio Hernández
 */
export function getUserObject(user = '') {
    //se quita de la cadena la palabra "bienvenido" y los caracteres " : "
    let name_string = user.substring(13, user.length);

    let whitespace = name_string.indexOf(" ");
    let names = [];
    while (whitespace > 0) {
        names.push(name_string.substring(0, whitespace));
        name_string = name_string.substring(whitespace + 1, name_string.length);
        whitespace = name_string.indexOf(" ");
    }
    //se aigna la última cadena que queda
    names.push(name_string.substring(0, name_string.length));

    return JSON.stringify(names);
}
/**
 * @author lastguest
 * @description Convert JavaScript object to x-www-form-urlencoded format
 * @borrows function
 * @see https://gist.github.com/lastguest/1fd181a9c9db0550a847
 * @param {*} element 
 * @param {*} key 
 * @param {*} list 
 */
export function JSON_to_URLEncoded(element, key, list) {
    var list = list || [];
    if (typeof(element) == 'object') {
        for (var idx in element)
            JSON_to_URLEncoded(element[idx], key ? key + '[' + idx + ']' : idx, list);
    } else {
        list.push(key + '=' + encodeURIComponent(element));
    }
    return list.join('&');
}