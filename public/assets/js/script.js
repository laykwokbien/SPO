const checkbox = document.getElementById('checkbox'),
password = document.getElementById('password'),
alert = document.querySelectorAll('.alert'),
arrowleft = document.getElementById('arrowleft'),
arrowright = document.getElementById('arrowright'),
dropdownmenu = document.getElementById('menu'),
user = document.getElementById('extendbtn');

setTimeout(() => {
    alert.forEach(element => {
        element.remove();
    });
}, 1500)

if(checkbox != null){
    checkbox.addEventListener('click', () => {
        if(password.type == "password"){
            password.type = "text";
        } else {
            password.type = "password"
        }
    })
}

if(user != null){
    user.addEventListener('click', () => {
        if(dropdownmenu.dataset.extended == 'true'){
            arrowright.style.transition = 'all 0.2s'
            arrowleft.style.transition = 'all 0.2s'
            arrowright.style.transform = 'rotate(-55deg)'
            arrowleft.style.transform = 'rotate(55deg)'
            dropdownmenu.style.display = 'none'
            dropdownmenu.dataset.extended = 'false';
            return
        }
        if(dropdownmenu.dataset.extended == 'false'){
            arrowright.style.transition = 'all 0.2s'
            arrowleft.style.transition = 'all 0.2s'
            arrowright.style.transform = 'rotate(55deg)'
            arrowleft.style.transform = 'rotate(-55deg)'
            dropdownmenu.style.display = 'flex';
            dropdownmenu.dataset.extended = 'true';
            return
        }
    })
}