const checkbox = document.getElementById('checkbox');
const password = document.getElementById('password');
const alert = document.querySelectorAll('.alert');

setTimeout(() => {
    alert.forEach(element => {
        element.remove();
    });
}, 1500)


checkbox.addEventListener('click', () => {
    if(password.type == "password"){
        password.type = "text";
    } else {
        password.type = "password"
    }
})