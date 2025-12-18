// Samarasinghe A.V.A.V. IT23585676
document.querySelector('form').addEventListener('submit', function(e) {
    if (!document.getElementById('agree').checked) {
        e.preventDefault();
        alert('Please agree to the privacy and policy statements.');
    }
});
