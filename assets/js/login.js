/**
 * @author Ing. Dwigth Astacio Hernández
 */
import { http_request } from './request_handler.js';
export class Login {
    constructor(modal,message) {
        this.modal = modal;
        this.element_message = message;
    }
    openModal() {
        this.modal.style.display = "block";
    }
    closeModal() {
        this.modal.style.display = "none";
    }
    login(user, password) {
        return new Promise(function (resolve, reject) {
        
            //let request = new XMLHttpRequest();
            //request.withCredentials = true;
            // request.onload = function () {
            //     resolve(this.responseText);
            // }
            // request.onerror = reject;
            // request.open('POST', `http://localhost/agendaut/index.php/login/login`, true);
            // request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            // request.setRequestHeader('Content-Type', 'application/json');
            // //request.setRequestHeader("Origin", "http://saiiut.uttab.edu.mx");
            // request.send(`xUsuario=${user}&xContrasena=${password}`);
            http_request('POST','http://localhost/agendaut/index.php/login/login',{xUsuario:user,xContrasena:password},'application/x-www-form-urlencoded')
            .done(function(user) {
                resolve(user);
            }).fail(function (err) {
                reject(err);
            })
        });
    }
    set_message(msg) {
        this.element_message.innerHTML = msg;
    }
}
