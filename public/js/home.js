
// getting the elements from the dom, so that it can be manipulated
const iconTrigger = document.querySelector('#iconTrigger')
const icon = document.querySelector('#icon')
const menuContainer = document.querySelector('.menu-container')

// opening and closing the nav menu
iconTrigger.addEventListener('click', () => {
   if (icon.classList.contains('fa-bars')) {

      icon.classList.remove('fa-bars')
      icon.classList.add('fa-close')

      menuContainer.classList.add('show')
      menuContainer.classList.remove('hide')
   } else {
      icon.classList.add('fa-bars')
      icon.classList.remove('fa-close')

      menuContainer.classList.remove('show')
      menuContainer.classList.add('hide')
   }
})

function parallax() {
   icon.classList.add('fa-bars')
   icon.classList.remove('fa-close')

   menuContainer.classList.remove('show')
   menuContainer.classList.add('hide')
 }