/**
 * @author Ing. Dwigth Astacio Hernández
 */
import { Date_Picker } from './datepicker.js';
import { Login } from './login.js';
import * as loader from './loader.js';
import { session } from './session.js';
import { getUserObject } from './util.js';

window.onload = () => {
    session.init()
        .then((user) => {
            session.setSessionUser(loader.loginbtn, JSON.parse(user)[0]);
            // alert(user);
        })
        .catch((err) => {
            console.log(err);
            //alert(err);
        });

    const datepicker = new Date_Picker(loader.date, loader.datetime, loader.time);
    const login = new Login(loader.modal, loader.loginmsg);

    loader.loginbtn.addEventListener('click', () => {
        login.openModal();
    });
    loader.span.addEventListener('click', () => {
        login.closeModal();
    });

    loader.send.addEventListener('click', () => {
        login.login(loader.user_input.value, loader.pass_input.value)
            .then(function(result) {
                let response = result;
                login.set_message(response.mensaje.msg);
                //alert(response);
                if (response.mensaje.valido) {

                    localStorage.setItem('usuario', getUserObject(response.mensaje.msg));
                    localStorage.setItem('matricula', loader.user_input.value);
                    localStorage.setItem('response', response.mensaje);
                    let user = localStorage.getItem('usuario');
                    session.setSessionUser(loader.loginbtn, JSON.parse(user)[0]);
                    setTimeout(() => {
                        login.closeModal();
                    }, 1000);
                }

            }).catch(function(err) {
                console.log(err.responseText);
                //alert(err);
            });
    });


    datepicker.getData(btn, message);

}