/**
 * @author Ing. Dwigth Astacio Hernández
 */
export class Date_Picker {
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