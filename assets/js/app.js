const formHealth = document.querySelector('#form_send');
const formDeletePressure = document.querySelector('#form__delete')
    // console.log('asd');

const health = {
    date: '',
    pressure1: 0,
    pressure2: 0,
    pulse: 0,
    time: ''
}

let curr_id = 0



formHealth.addEventListener('submit', (event) => {
    event.preventDefault();

    const pressure1 = formHealth.querySelector('[name="pressure1"]')
    const pressure2 = formHealth.querySelector('[name="pressure2"]')
    const pulse = formHealth.querySelector('[name="pulse"]')

    let date = new Date().toLocaleDateString()
    let time = new Date().toLocaleTimeString().slice(0, -6);

    if (time > 17) {
        part_day = 'Вечер'
    } else if (time > 10) {
        part_day = 'День'
    } else {
        part_day = 'Утро'
    }


    health.date = date
    health.time = part_day
    health.pressure1 = pressure1.value
    health.pressure2 = pressure2.value
    health.pulse = pulse.value

    createPressure();
})

formDeletePressure.addEventListener('submit', (event) => {
    event.preventDefault()
    const form_id = formDeletePressure.querySelector('[name="curr_id"]')
    curr_id = form_id.value
    console.log(curr_id);

    deletePressure()
})


function createPressure() {

    $.ajax({
        url: '/pressure/create.php',
        type: "POST",
        data: health,
        success: function(response) {
            // res = $.parseJSON(response)
            res = response
            console.log('ok', res);
            clearForm()
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
            $('#message').html('Непредвиденная ошибка')
        }
    });
}


function deletePressure() {

    console.log('delete_start');
    $.ajax({
        url: '/pressure/delete.php',
        type: "POST",
        data: { 'curr_id': curr_id },
        success: function(response) {
            // res = $.parseJSON(response)
            res = response
            console.log('delete', res);
            clearForm()
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.statusText);
            console.log(textStatus);
            console.log(error);
            $('#message').html('Непредвиденная ошибка')
        }
    });
}


function clearForm() {

    pressure1 = formHealth.querySelector('[name="pressure1"]').value = ''
    pressure2 = formHealth.querySelector('[name="pressure2"]').value = ''
    pulse = formHealth.querySelector('[name="pulse"]').value = ''

    health.date = ''
    health.date = ''
    health.pressure1 = 0
    health.pressure2 = 0
    health.pulse = 0
    health.curr_id = 0
}