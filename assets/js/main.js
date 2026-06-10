document.addEventListener('DOMContentLoaded', () => {
    // Add mobile menu interaction
    const menuBtns = document.querySelectorAll('button');
    const mobileMenu = document.getElementById('mobile-menu');
    const closeBtn = document.getElementById('close-menu-btn');

    if (mobileMenu) {
        // Find hamburger buttons by their icon content or data attribute
        menuBtns.forEach(btn => {
            const hasMenuText = btn.textContent.toLowerCase().includes('menu');
            const hasMenuAttr = btn.querySelector('[data-icon="menu"]');
            
            if (hasMenuText || hasMenuAttr) {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    mobileMenu.classList.remove('translate-x-full');
                });
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', (e) => {
                e.preventDefault();
                mobileMenu.classList.add('translate-x-full');
            });
        }
    }
});
