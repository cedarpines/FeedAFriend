
// Small buttons (Recipes, Coupons, Forums)
const smallButtons = document.querySelectorAll('.btn');
if (smallButtons.length > 0) {
    smallButtons.forEach(button => {
        button.addEventListener('click', () => {
            const label = button.textContent.trim();

            if (label === 'Recipes') {
                window.location.href = 'recipes.php';
            } else if (label === 'Gardening Tips') {
                window.location.href = 'gardening.php';
            } else if (label === 'Farming') {
                window.location.href = 'farming.php';
            }
        });
    });
}

// Login button
const loginBtn = document.querySelector('.btnThin');
if (loginBtn) {
    loginBtn.addEventListener('click', () => {
        window.location.href = 'loginForm.php';
    });
}
// Food Map button
const foodMapBtn = document.querySelector('.btnLrg');
if (foodMapBtn) {
    foodMapBtn.addEventListener('click', () => {
        window.location.href = 'food-map.php';
    });
}