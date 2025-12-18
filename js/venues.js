//Akith Perera IT23551152
document.addEventListener("DOMContentLoaded", () => {
   
    document.getElementById('scrollButton').onclick = () => {
        document.getElementById('venues').scrollIntoView({ behavior: 'smooth' });
    }});