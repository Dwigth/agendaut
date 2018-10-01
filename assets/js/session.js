/**
 * @author Ing. Dwigth Astacio Hernández
 */
class Session {
    constructor() {
    }
    init() { 
        return new Promise((resolve,reject)=>{
        let user = localStorage.getItem('usuario');
        if(user === null || user === '') {
            reject('El usuario no ha iniciado sesión');
        } else {
            resolve(user);
        }
        });
    }
    setSessionUser(nameText,name){
        nameText.innerText = `Hola ${name}`;
    }
}
export let session  = new Session();