
function toggleBurger(navid) {
    
    var toggle = document.getElementById(navid);
    toggle.classList.toggle('nav-active');



}


function scrollFunction()
{

    var nav = document.getElementById('nav')
    var sticky = nav.offsetTop;
    if(window.pageXOffset >= sticky)
    {
        nav.classList.add('sticky');
    }
    else
        {
            nav.classList.remove('sticky');
        }
}



