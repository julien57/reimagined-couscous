/*
const offerForm = document.getElementById('offer_formm');

const required = { 0: 'gift_amount', 1:'gift_personName' , 2:'gift_lastName',
                     3:'gift_name', 4:'gift_email', 5:'dayroom_room' };
//var dayroom = offerForm.classList.contains('dayroom');

if( offerForm != undefined ){

offerForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const formData = new FormData(offerForm);

    for(let req in required){
        var id = required[req];

        var el = document.getElementById(id)
        if(el !== undefined){
            var value = el.value;

            if(value == ''){
                el.classList.add('error')
            }
        }

    }

    fetch('/offer/send-form', {body: formData, method: 'POST'})
        .then(response => response.json())
        .then(response => {
            if (response.message) {
                window.open(response.message);
            } else {
                document.getElementById('messageOffer').innerHTML = '<p>Demande envoyée !</p>';
                offerForm.reset();
            }
        })
});
}
*/