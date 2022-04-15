let selectChoice = document.getElementById('selectChoice');

selectChoice.addEventListener('change', (event) => {
    window.location.href = event.target.value;
});