//De Silva H.S.S IT23562042
function displayDateTime() {
    const now = new Date();
    const dateTimeString = now.toLocaleString();
    document.getElementById('dateTime').innerText = dateTimeString;
}
window.onload = displayDateTime;





