let list = document. querySelectorAll('.dashboard-sidenav li');
function activeLink(){
    list. forEach((item) =>
    item. classList.remove( 'hovered')); 
    this.classList.add ('hovered');
    }

    list. forEach((item) =>
    item.addEventListener ('mouseover' ,activeLink))