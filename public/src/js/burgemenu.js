// Бургер меню
const burger_menu = () => {
    const burger = document.querySelector(".burger_menu");
    if (!parent) return false;
    const button_burger = document.querySelector(".burger_buttom");
    const burger_window = document.querySelector(".burger_window");
    const burger_buttom_close = document.querySelector(".burger_buttom_close");

    const burger_show = () => {
        burger.classList.add("active");
        burger_window.classList.add("active");
    };
    const burger_close = () => {
        burger.classList.remove("active");
        burger_window.classList.remove("active");
    };

    burger_buttom_close.addEventListener("click", () => {
        burger_close();
    });
    button_burger.addEventListener("click", () => {
        burger_show();
    });
    document.addEventListener("keydown", (event) => {
        if (event.keyCode === 27) {
            burger_close();
        }
    });
    burger.addEventListener("click", (event) => {
        if (event.target === burger) {
            burger_close();
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
    burger_menu();
});
