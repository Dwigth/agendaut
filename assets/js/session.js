/**
 * @author Ing. Dwigth Astacio Hernández
 */
class Session {
    constructor() {
    }
    /**
     * @returns Promise
     * @returns null
     * Retorna una promesa con el objeto usuario si este ya ha sido guardado
     * de otro modo retorna un valor tipo null.
     */
    init() {
        return new Promise((resolve,reject)=>{
        let user = localStorage.getItem('usuario');
        if(user === null || user === '') {
            reject(null);
        } else {
            resolve(user);
        }
        });
    }
    /**
     *
     * @param {HTMLElement} nameText Boton de inicio
     * @param {string} name Nombre de usuario
     *
     * Esta función asigna el nombre del usuario al boton de navegación
     */
    setSessionUser(nameText,name){
        nameText.innerText = `Hola ${name}`;
    }
}
export let session  = new Session();