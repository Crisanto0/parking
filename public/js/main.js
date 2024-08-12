document.getElementById("btn_open").addEventListener('click', open_close_menu);
let listElements = document.querySelectorAll('.options__button--click');

listElements.forEach(listElement => {
    listElement.addEventListener('click', () => {
        listElement.classList.toggle('arrow');

        let height = 0;
        let menu = listElement.nextElementSibling;
        if (menu.clientHeight == "0") {
            height = menu.scrollHeight;
        }

        menu.style.height = height + "px";
    });
});

function open_close_menu() {
    const body = document.getElementById("body");
    const side_menu = document.getElementById("menu");
    
    body.classList.toggle("body_move");
    side_menu.classList.toggle("menu_move");
}




