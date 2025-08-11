let navbar = document.querySelector('#navbar')
let button_event = document.querySelector('#button-event-nav')
let setting_list = document.querySelector('#setting-list')
let close_list = document.querySelector('#close-list')

window.addEventListener('scroll', () => {
    if (scrollY > 0) {
        navbar.classList.add('shadow-sm')
    } else {
        navbar.classList.remove('shadow-sm')
    }
})

button_event.addEventListener('click', () => {
    if (setting_list && close_list) {
        setting_list.classList.toggle('d-none')
        close_list.classList.toggle('d-none')
    }
})


let alert = document.querySelector('#alert')

if (alert) {
    setTimeout(() => {
        alert.style.transition = 'opacity 1s ease'
        alert.style.opacity = '0'
        setTimeout(()=> alert.remove(), 1000)
    }, 4000)
}