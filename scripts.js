
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

// Login button and My pledges
const thinButtons = document.querySelectorAll('.btnThin');
if (thinButtons.length > 0){
    thinButtons.forEach(button => {
        button.addEventListener('click', () => {
            const label = button.textContent.trim();

            if (label === 'Login') {
                window.location.href = 'loginForm.php';
            } else if (label === 'My Pledges') {
                window.location.href = 'pledgeList.php';
            }
        });
    });
};


// Food Map button
const foodMapBtn = document.querySelector('.btnLrg');
if (foodMapBtn) {
    foodMapBtn.addEventListener('click', () => {
        window.location.href = 'food-map.php';
    });
}