let toggle = document.querySelector('.dashboard-toggle');
let sidenav = document.querySelector('.dashboard-sidenav');
let main = document.querySelector('.dashboard-main');

toggle.onclick = function(){
    sidenav.classList.toggle('active');
    main.classList.toggle('active');
}

let list = document. querySelectorAll('.dashboard-sidenav li');
function activeLink(){
    list. forEach((item) =>
    item. classList.remove( 'hovered')); 
    this.classList.add ('hovered');
    }

    list. forEach((item) =>
    item.addEventListener ('mouseover' ,activeLink))