const form = document.querySelector('#form_send');
// console.log('asd');



form.addEventListener('submit', (event) => {
    event.preventDefault();

    let date = form.querySelector('[name="date"]')
    date = date.value
    date = date.replace('-', '.')
    date = date.replace('-', '.')
    console.log(date);
    date = date.toString()

    const pressure1 = form.querySelector('[name="pressure1"]')
    const pressure2 = form.querySelector('[name="pressure2"]')
    const pulse = form.querySelector('[name="pulse"]')
        // date = new Date(date)
    const data = {
        date: date,
        pressure1: pressure1.value,
        pressure2: pressure2.value,
        pulse: pulse.value
    }

    console.log(data);
})