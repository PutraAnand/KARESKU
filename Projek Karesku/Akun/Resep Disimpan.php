<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resep Disimpan - Karesku</title>
    <link rel= "stylesheet" href="Akun/css/resepsimpan.css" />
    
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-restaurant"></i>
            <span class="logo_name">Karesku</span>
        </div>
        <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="Resep Disimpan.php" class="active">Resep Disimpan</a></li>
            <li><a href="Tambah Resep.php">Tambahkan Resep</a></li>
            <li><a href="Projek Kares/Karesku Akun.php">Beranda</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Resep Disimpan</h1>
        <div class="recipe-list">
            <ul id="recipeList">
                <!-- Resep akan ditambahkan di sini -->
            </ul>
        </div>
    </div>

    <script>
        // Memuat resep yang disimpan saat halaman dimuat
        window.onload = function() {
            loadRecipes();
        };

        function loadRecipes() {
            const recipes = JSON.parse(localStorage.getItem("recipes")) || [];
            recipes.forEach(recipe => {
                addRecipeToList(recipe.title, recipe.ingredients, recipe.instructions);
            });
        }

        function addRecipeToList(title, ingredients, instructions) {
            let listItem = document.createElement("li");

            // Tampilkan judul resep
            let recipeTitle = document.createElement("h3");
            recipeTitle.textContent = title;
            listItem.appendChild(recipeTitle);

            // Tampilkan bahan-bahan
            let recipeIngredients = document.createElement("p");
            recipeIngredients.textContent = "Bahan-Bahan: " + ingredients;
            listItem.appendChild(recipeIngredients);

            // Tampilkan cara pembuatan
            let recipeInstructions = document.createElement("p");
            recipeInstructions.textContent = "Cara Pembuatan: " + instructions;
            listItem.appendChild(recipeInstructions);

            // Tombol hapus
            let deleteBtn = document.createElement("button");
            deleteBtn.textContent = "Hapus Resep";
            deleteBtn.classList.add("delete-btn");
            deleteBtn.onclick = function() {
                removeRecipeFromStorage(title);
                listItem.remove();
            };
            listItem.appendChild(deleteBtn);

            document.getElementById("recipeList").appendChild(listItem);
        }

        function removeRecipeFromStorage(title) {
            const recipes = JSON.parse(localStorage.getItem("recipes")) || [];
            const updatedRecipes = recipes.filter(recipe => recipe.title !== title);
            localStorage.setItem("recipes", JSON.stringify(updatedRecipes));
        }
    </script>
</body>
</html>
 