/**
 * @author Ing. Dwigth Astacio Hernández
 */
import { http_request } from './request_handler.js';
import { JSON_to_URLEncoded } from "./util.js";
export class Login {
    constructor(modal, message) {
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
        return new Promise(function(resolve, reject) {
            http_request('POST', 'http://localhost/agendaut/index.php/login/login', JSON_to_URLEncoded({ xUsuario: user, xContrasena: password }), 'application/x-www-form-urlencoded')
                .then(function(user) {
                    resolve(user);
                }).catch(function(err) {
                    reject(err);
                })
        });
    }
    set_message(msg) {
        this.element_message.innerHTML = msg;
    }
}