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
    var userStorage = null;
    session.init()
        .then((user) => {
            userStorage = JSON.parse(user);
            session.setSessionUser(loader.loginli, JSON.parse(user)[0]);
            loader.loginbtn.style.display = "none";
            loader.divInvitado.style.display = "none";
            let response = localStorage.getItem('response');
            if (response.type > 4) {
                loader.loginli.href = "http://localhost/agendaut/index.php/admin";
            }
            // alert(user);
        })
        .catch((err) => {
            console.log(err);
            //alert(err);
        });
    let htmlElemetsObj = {
        date: loader.date,
        datetime: loader.datetime,
        aprox_time: loader.time,
        places: loader.places,
        spaces: loader.spaces,
    };
    const datepicker = new Date_Picker(htmlElemetsObj);
    const login = new Login(loader.loginmsg);

    loader.send.addEventListener('click', () => {
        login.login(loader.user_input.value, loader.pass_input.value)
            .then(function(result) {
                let response = result;
                login.set_message(response.mensaje.msg);
                //alert(response);
                if (response.mensaje.valido) {
                    localStorage.setItem('usuario', getUserObject(response.mensaje.msg));
                    localStorage.setItem('matricula', loader.user_input.value);
                    localStorage.setItem('response', JSON.stringify(response.mensaje));
                    let user = localStorage.getItem('usuario');
                    session.setSessionUser(loader.loginli, JSON.parse(user)[0]);
                    loader.loginbtn.style.display = "none";
                    window.location.reload();


                }
            }).catch(function(err) {
                console.log(err.responseText);
            });
    });

    loader.spaces.addEventListener('change', () => {
        datepicker.imagesPlaces(loader.spaces.value, loader.imagenes);
    });

    datepicker.fillPlaces();
    datepicker.fillSpaces();
    session.exitSession(loader.loginli);
    setTimeout(() => {
        datepicker.getData(btn, userStorage, message);
    }, 1000);

}