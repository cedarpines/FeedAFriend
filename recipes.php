<?php
include 'start.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Finder</title>
    <link rel="stylesheet" href="styles.css">

    <script src="scripts.js" async></script>
</head>

<body>
    <?php 
    include 'header.php';
    ?>

    <div class="recipe-container">

        <a href="https://www.budgetbytes.com/classic-potato-soup/">
            <div class="recipe">
                <div class="recipe-image">
                        <img src="https://www.budgetbytes.com/wp-content/uploads/2026/09/1-Classic-Potato-Soup-Overhead-Wide-500x375.jpg"
                        alt="Potato Soup">  
                </div>
                    <div class="recipe-text">
                        <h2>Classic Potato Soup</h2>
                        <p>Recipe description</p>
                    </div>
                </div>
        </a>
        <a href="https://www.budgetbytes.com/vegan-meatballs/">
            <div class="recipe">
                <div class="recipe-image">
                    <img src="https://www.budgetbytes.com/wp-content/uploads/2026/06/Veggie-Meatballs-Overhead-Broken-Open-500x375.jpg"
                        alt="Vegan Meatballs">
                </div>

                <div class="recipe-text">
                    <h2>Vegan Meatballs</h2>
                    <p>Recipe description</p>
                </div>
            </div>
        </a>
        <a href="https://www.budgetbytes.com/baked-chicken-drumsticks/">
            <div class="recipe">
                <div class="recipe-image">
                    <img src="https://www.budgetbytes.com/wp-content/uploads/2025/01/Oven-Baked-Chicken-Drumsticks-On-Sheet-Pan-500x375.jpg"
                        alt="4 crispy chicken drumsticks">
                </div>

                <div class="recipe-text">
                    <h2>Baked Chicken Drumsticks</h2>
                    <p>Recipe description</p>
                </div>
            </div>
        </a>
        <a href="https://www.budgetbytes.com/cowboy-caviar/">
            <div class="recipe">
                <div class="recipe-image">
                    <img src="https://www.budgetbytes.com/wp-content/uploads/2025/05/Cowboy-Caviar-Overhead-Wide-268x200.jpg"
                        alt="A bowl filled with beans corn tomato and lime">
                </div>

                <div class="recipe-text">
                    <h2>Cowboy Caviar</h2>
                    <p>Recipe description</p>
                </div>
            </div>
        </a>
        <a href="https://www.budgetbytes.com/carrot-cake-bars/">
            <div class="recipe">
                <div class="recipe-image">
                    <img src="https://www.budgetbytes.com/wp-content/uploads/2026/03/Carrot-Cake-Bars-Front-Stack-500x375.jpg"
                        alt="Carrot cake bars">
                </div>

                <div class="recipe-text">
                    <h2>Carrot Cake Bars</h2>
                    <p>Recipe description</p>
                </div>
            </div>
        </a>
    </div>

    <footer>
        <h3>More recipes coming soon...</h3>
    </footer>


</body>

</html>