<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="assets/Logo.png" />
    <link rel="stylesheet" href="css/tambahresep.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Resep - Karesku</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-restaurant"></i>
            <span class="logo_name">Karesku</span>
        </div>
        <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="Resep Disimpan.php">Resep Disimpan</a></li>
            <li><a href="Tambah Resep.php" class="active">Tambahkan Resep</a></li>
            <li><a href="#">Keluar</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>Tambahkan Resep</h1>
        <div class="add-recipe-container">
            <input type="text" id="recipeTitle" placeholder="Judul Makanan" />
            <textarea id="recipeIngredients" rows="3" placeholder="Bahan-Bahan"></textarea>
            <textarea id="recipeInstructions" rows="5" placeholder="Cara Pembuatan"></textarea>
            <button onclick="addRecipe()">Tambah Resep</button>
            <button class="save-btn" onclick="saveRecipes()">Simpan Resep</button>
        </div>
        <div class="recipe-list">
            <h2>Daftar Resep</h2>
            <ul id="recipeList">
                <!-- Resep akan ditambahkan di sini -->
            </ul>
        </div>
    </div>

    <!-- Notifikasi -->
    <div id="notification" class="notification"></div>

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

        // Fungsi untuk menampilkan pemberitahuan
        function showNotification(message) {
            const notification = document.getElementById("notification");
            notification.textContent = message;
            notification.className = "notification show";
            setTimeout(function () {
                notification.className = notification.className.replace("show", "");
            }, 3000);
        }

        function addRecipe() {
            let title = document.getElementById("recipeTitle").value;
            let ingredients = document.getElementById("recipeIngredients").value;
            let instructions = document.getElementById("recipeInstructions").value;

            if (title && ingredients && instructions) {
                addRecipeToList(title, ingredients, instructions);

                // Bersihkan input setelah menambah
                document.getElementById("recipeTitle").value = "";
                document.getElementById("recipeIngredients").value = "";
                document.getElementById("recipeInstructions").value = "";

                // Tampilkan notifikasi
                showNotification("Resep berhasil ditambahkan!");
            } else {
                alert("Silakan lengkapi semua field.");
            }
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

            // Tombol Edit dan Hapus
            let actions = document.createElement("div");
            actions.className = "recipe-actions";

            let editButton = document.createElement("button");
            editButton.textContent = "Edit";
            editButton.className = "edit-btn";
            editButton.onclick = function () {
                editRecipe(recipeTitle, recipeIngredients, recipeInstructions);
            };
            actions.appendChild(editButton);

            let deleteButton = document.createElement("button");
            deleteButton.textContent = "Hapus";
            deleteButton.className = "delete-btn";
            deleteButton.onclick = function () {
                listItem.remove();
                removeRecipeFromStorage(title); // Menghapus dari localStorage
            };
            actions.appendChild(deleteButton);

            listItem.appendChild(actions);
            document.getElementById("recipeList").appendChild(listItem);
            
            // Simpan resep ke localStorage
            saveRecipeToStorage(title, ingredients, instructions);
        }

        function saveRecipeToStorage(title, ingredients, instructions) {
            const recipes = JSON.parse(localStorage.getItem("recipes")) || [];
            recipes.push({ title, ingredients, instructions });
            localStorage.setItem("recipes", JSON.stringify(recipes));
        }

        function removeRecipeFromStorage(title) {
            let recipes = JSON.parse(localStorage.getItem("recipes")) || [];
            recipes = recipes.filter(recipe => recipe.title !== title);
            localStorage.setItem("recipes", JSON.stringify(recipes));
        }

        function saveRecipes() {
            // Tampilkan alert saat resep berhasil disimpan
            alert("Resep telah disimpan!");
        }

        function editRecipe(titleElem, ingredientsElem, instructionsElem) {
            let newTitle = prompt("Edit Judul Makanan:", titleElem.textContent);
            let newIngredients = prompt("Edit Bahan-Bahan:", ingredientsElem.textContent.replace("Bahan-Bahan: ", ""));
            let newInstructions = prompt("Edit Cara Pembuatan:", instructionsElem.textContent.replace("Cara Pembuatan: ", ""));

            if (newTitle) {
                removeRecipeFromStorage(titleElem.textContent); // Menghapus resep lama
                titleElem.textContent = newTitle;
            }
            if (newIngredients) {
                ingredientsElem.textContent = "Bahan-Bahan: " + newIngredients;
            }
            if (newInstructions) {
                instructionsElem.textContent = "Cara Pembuatan: " + newInstructions;
            }

            // Simpan resep yang diperbarui ke localStorage
            saveRecipeToStorage(titleElem.textContent, ingredientsElem.textContent.replace("Bahan-Bahan: ", ""), instructionsElem.textContent.replace("Cara Pembuatan: ", ""));
        }
    </script>
</body>
</html>
