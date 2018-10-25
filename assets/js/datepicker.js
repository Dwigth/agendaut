/**
 * @author Ing. Dwigth Astacio Hernández
 */
import { http_get, http_request } from './request_handler.js';
import { JSON_to_URLEncoded } from "./util.js";

export class Date_Picker {
    constructor({ date, datetime, aprox_time }) {
        this.date = date;
        this.datetime = datetime;
        this.aprox_time = aprox_time;
        this.places = places;
        this.spaces = spaces;
    }
    getData(btn, user, element) {
        btn.addEventListener('click', () => {
            console.log(user);

            let cita = {
                fecha_cita: this.date.value,
                hora_inicio: this.datetime.value,
                tiempo_aprox: this.aprox_time.value,
                id_espacio: this.spaces.value,
                nombre: user[0],
                apellidos: user[1] + " " + user[2],
            }
            if (user != null) {
                cita["matricula"] = localStorage.getItem('matricula');
            }
            console.log(cita);

            http_request('POST', 'http://localhost/agendaut/index.php/citas/crear_cita', JSON_to_URLEncoded(cita), 'application/x-www-form-urlencoded')
                .then(response => {
                    console.log(response);
                    if (response.error) {
                        if (this.date.value === '' || this.datetime.value === ''
                            || this.aprox_time.value === '') {
                            this.failfill_message(element);
                            let small = document.createElement('small');
                            small.innerText = response.mensaje;
                            element.appendChild(small);
                        } else {
                            this.pre_message(element);
                            let small = document.createElement('small');
                            small.innerText = response.mensaje;
                            element.appendChild(small);
                        }
                    }
                })
                .catch(e => console.error(e));



        });
    }
    pre_message(element) {
        let message = `Se procesará una cita para la fecha ${this.date.value}`
            + ` en el ${this.spaces.options[this.spaces.selectedIndex].text} del ${this.places.options[this.places.selectedIndex].text}`
            + ` a las ${this.datetime.value} con una duración aproximada de ${this.aprox_time.value} hr(s).`;
        element.innerHTML = message;
    }
    fillPlaces() {
        http_get('http://localhost/agendaut/index.php/edificio').then(data => {
            if (!data.error) {
                data.edificios.forEach(edificio => {
                    let option = document.createElement('option');
                    option.innerText = edificio.nombre;
                    option.value = edificio.id_edificio;
                    this.places.appendChild(option);
                });
            }
        })
            .catch(error => console.error(error));
    }
    fillSpaces() {
        http_get('http://localhost/agendaut/index.php/edificio/tipo_espacio').then(data => {
            if (!data.error) {
                data.tipo_espacio.forEach(espacio => {
                    let option = document.createElement('option');
                    option.innerText = espacio.nombre;
                    option.value = espacio.id_tipo_espacio;
                    this.spaces.appendChild(option);
                });
            }
        })
            .catch(error => console.error(error));
    }
    imagesPlaces(id, contenedor) {
        contenedor.innerHTML = "";
        http_get('http://localhost/agendaut/index.php/edificio/espacios/' + id).then(data => {
            if (!data.error) {
                console.log(data);
                data.espacios[0].imagenes.forEach(imagen => {
                    let option = document.createElement('div');
                    option.classList.add(['p-2', 'bd-highlight']);
                    option.innerHTML = `<img class="img-thumbnail img-spaces" src="${imagen.url}">`;
                    contenedor.appendChild(option);
                });


            }
        })
            .catch(error => console.log(error));
    }
    failfill_message(element) {
        element.innerHTML = 'Error el formulario debe estár completado.';
    }
}