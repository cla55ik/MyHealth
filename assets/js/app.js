const formHealth = document.querySelector('#form_send');
// console.log('asd');

const health = {
    date: '',
    pressure1: 0,
    pressure2: 0,
    pulse: 0
}



formHealth.addEventListener('submit', (event) => {
    event.preventDefault();

    let date = formHealth.querySelector('[name="date"]')
    date = date.value
    date = date.replace('-', '.')
    date = date.replace('-', '.')

    const pressure1 = formHealth.querySelector('[name="pressure1"]')
    const pressure2 = formHealth.querySelector('[name="pressure2"]')
    const pulse = formHealth.querySelector('[name="pulse"]')


    health.date = date
    health.pressure1 = pressure1.value
    health.pressure2 = pressure2.value
    health.pulse = pulse.value

    sendAjax();
})


function sendAjax() {

    $.ajax({
        url: '/controllers/sendtodb.php',
        type: "POST",
        data: health,
        success: function(response) {
            res = $.parseJSON(response)
                // res = response
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


function clearForm() {

    formHealth.querySelector('[name="date"]').value = ''
    const pressure1 = formHealth.querySelector('[name="pressure1"]').value = ''
    const pressure2 = formHealth.querySelector('[name="pressure2"]').value = ''
    const pulse = formHealth.querySelector('[name="pulse"]').value = ''

    health.date = ''
    health.pressure1 = 0
    health.pressure2 = 0
    health.pulse = 0
}