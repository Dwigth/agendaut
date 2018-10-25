/**
 * @author Ing. Dwigth Astacio Hernández
 */
import { Date_Picker } from './datepicker.js';
import { Login } from './login.js';
import * as loader from './loader.js';
import { session } from './session.js';
import { getUserObject } from './util.js';

window.onload = () => {
    //obtiene el objeto usuario si este ya ha ingresado al sistema
    session.init()
        .then((user) => {
            session.setSessionUser(loader.loginli, JSON.parse(user)[0]);
            loader.loginbtn.style.display = "none";
            // alert(user);
        })
        .catch((err) => {
            console.log(err);
            //alert(err);
        });

    const datepicker = new Date_Picker(loader.date, loader.datetime, loader.time);
    const login = new Login(loader.loginmsg);

    loader.send.addEventListener('click', () => {
        login.login(loader.user_input.value, loader.pass_input.value)
            .then(function (result) {
                let response = result;
                login.set_message(response.mensaje.msg);
                //alert(response);
                if (response.mensaje.valido) {
                    localStorage.setItem('usuario', getUserObject(response.mensaje.msg));
                    localStorage.setItem('matricula', loader.user_input.value);
                    localStorage.setItem('response', response.mensaje);
                    let user = localStorage.getItem('usuario');
                    session.setSessionUser(loader.loginli, JSON.parse(user)[0]);
                    loader.loginbtn.style.display = "none";

                }
            }).catch(function (err) {
                console.log(err.responseText);
            });
    });


    datepicker.getData(btn, message);

}