const checkbox = document.getElementById('checkbox');
const password = document.getElementById('password');


console.log(checkbox.type)

checkbox.addEventListener('click', () => {
    if(password.type == "password"){
        password.type = "text";
    } else {
        password.type = "password"
    }
})