/**
 * @author Ing. Dwigth Astacio Hernández
 */
window.onload = () => {
    const date       = document.getElementById('date');
    const datetime   = document.getElementById('datetime');
    const time       = document.getElementById('time');
    const btn        = document.getElementById('btn');
    const message    = document.getElementById('message');
    const loginbtn   = document.getElementById('login');

    class Date_Picker {
        constructor(date, datetime, aprox_time) {
            this.date = date;
            this.datetime = datetime;
            this.aprox_time = aprox_time;
        }
        getData(btn, element) {
            btn.addEventListener('click', () => {
                return new Promise((resolve, reject) => {
                    if (this.date.value === '' || this.datetime.value === ''
                        || this.aprox_time.value === '') {
                        reject(this.failfill_message(element));
                    } else {
                        resolve(this.pre_message(element, {
                            date: this.date.value,
                            datetime: this.datetime.value,
                            aprox_time: this.aprox_time.value
                        }));
                    }
                });
            });
        }
        pre_message(element, data) {
            let message = `Se procesará una cita para la fecha ${data.date}`
                + ` a las ${data.datetime} con una duración aproximada de ${data.aprox_time} hr(s).`;
            element.innerHTML = message;
        }
        failfill_message(element) {
            element.innerHTML = 'Error el formulario debe estár completado.';
        }
    }

    class Login {
        constructor() {
        }
        login(user,password) {
            return new Promise(function (resolve, reject) {

                let request = new XMLHttpRequest();
                //request.withCredentials = true;
                request.onload = function () {
                    console.log(this.readyState);
                    console.log(this.status);
                    resolve(this.responseText);
                }
                request.onerror = reject;
                request.open('POST', 'http://saiiut.uttab.edu.mx/jsp/newLogin/ajax_json_acceso.jsp', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.setRequestHeader("Origin", "http://saiiut.uttab.edu.mx");
                request.send(`xUsuario=${user}&xContrasena=${password}&xUniversidad=42&IE=null&rand=1`);

            });
        }
    }

    const datepicker = new Date_Picker(date, datetime, time);
    const login = new Login();
    loginbtn.addEventListener('click', () => {
        login.login('421510099_i', 'Restime2')
            .then(function (result) {
                console.log(result);
            }).catch(function (err) {
                console.log(err);
                
            });
    });

    datepicker.getData(btn, message);



}