// Samarasinghe A.V.A.V. IT23585676
document.getElementById('paymentForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    
    const cardType = document.getElementById('cardType').value;
    const cardNumber = document.getElementById('cardNumber').value;
    const expiryDate = document.getElementById('expiryDate').value;
    const securityCode = document.getElementById('securityCode').value;
    const address = document.getElementById('address').value;
    const city = document.getElementById('city').value;
    const state = document.getElementById('state').value;
    const country = document.getElementById('country').value;
    const amount = document.getElementById('amount').value;
    const agree = document.getElementById('agree').checked;

    if (!cardType || !cardNumber || !expiryDate || !securityCode || !address || !city || !state || !country || !amount || !agree) {
        alert('Please fill out all fields.');
        return;
    }

    
    if (cardNumber.length < 16 || securityCode.length !== 3) {
        alert('Please enter valid card information.');
        return;
    }

    alert('Payment successful!\n\n' +
        'Card Type: ' + cardType + '\n' +
        'Card Number: ' + cardNumber + '\n' +
        'Expiry Date: ' + expiryDate + '\n' +
        'Security Code: ' + securityCode + '\n' +
        'Address: ' + address + '\n' +
        'City: ' + city + '\n' +
        'State: ' + state + '\n' +
        'Country: ' + country + '\n' +
        'Amount: ' + amount);
    
    
});
