window.addEventListener('load', (event) => {
    console.log("Hello ");
    let navbar = document.getElementById("CustomNav");
    navbar.addEventListener('click', (event) => {
        if (event.target.classList.contains('nav-link')) {
            let activeNavItem = document.getElementsByClassName('active')[0];
            activeNavItem.classList.remove('active');
            event.target.classList.add('active');
        }
    });
});