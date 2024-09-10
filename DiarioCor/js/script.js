// script.js
document.addEventListener('DOMContentLoaded', function () {
    const menuContainers = document.querySelectorAll('.menu-container');

    menuContainers.forEach(container => {
        const button = container.querySelector('button');
        const menuContent = container.querySelector('.menu-content');

        button.addEventListener('click', function(event) {
            event.stopPropagation();
            const isVisible = menuContent.style.display === 'block';
            hideAllMenus();
            if (!isVisible) {
                menuContent.style.display = 'block';
            }
        });
    });

    function hideAllMenus() {
        document.querySelectorAll('.menu-content').forEach(menu => {
            menu.style.display = 'none';
        });
    }

    document.addEventListener('click', function (event) {
        if (!event.target.closest('.menu-container')) {
            hideAllMenus();
        }
    });
});
