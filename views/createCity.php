
<?php 

include "/xampp/htdocs/africa-geo-junior/views/connect.php";

$name = "";
$capital = "";
$pays = "";

$succesMessage = "";
$errorMessage = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST["nom"];
    
    if(isset($_POST["pays"])) {
        $pays = $_POST["pays"];
    } else {
        $pays = "";
    }
    
    if(isset($_POST["Capital"])) {
        $capital = $_POST["Capital"];
    } else {
        $capital = "";
    }

    do {
        if (empty($name)) {
            $errorMessage = "Veuillez remplir le champ du nom. Obligatoire !!";
        } else if (empty($pays)) {
            $errorMessage = "Veuillez selectioner le pays du ville.";
        } else if (empty($pays) && empty($name)) {
            $errorMessage = "Veuillez taper le nom et selectioner le pays du ville."; 
        }  else {
            
            $sql = "INSERT INTO ville (`nom`, `capital`, `id_pays`) VALUES ('$name', '$capital', '$pays')";
            $result = $connect -> query($sql);
        
            if (!$result) {
                echo "Invalid query: " . $connect->error ;
        
            } else {
                $name = "";
                $capital = "";
                $pays = "";
                $succesMessage = "Ville ajouter avec succes";
            }
            
        }
    
        // $nom = "";
        // $population = "";
        // $langue = "";
    
        // $succesMessage = "Ville ajouter avec succes";
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
        <header class="bg-gray-300 h-16 flex justify-center items-center">
            <nav class="h-12 w-[90%] flex justify-between items-center">
                <div class="hover:scale-105 hover:transition-all duration-300 ease-in-out">
                    <a href="../index.html">
                        <img src="../assets/africa.png" alt="" class="h-12">
                    </a>
                </div>
    
                <div class="flex items-center gap-20">
                    <div class="flex w-fit gap-6 justify-between">
                        <ul class="flex gap-6 justify-between">
                            <li class="btn bg-[#f2902f] w-24 p-2 rounded-lg flex items-center justify-center font-semibold hover:bg-[#c66505] hover:transition-all duration-300 ease-in-out">
                                <a href="../adminPage.php">AUTHORS</a>
                            </li>
                            <li class="btn bg-[#f2902f] w-24 p-2 rounded-lg flex items-center justify-center font-semibold hover:bg-[#c66505] hover:transition-all duration-300 ease-in-out">
                                <a href="">STUDENT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


    <div id="cityModal" class="fixed absolute top-[17.5%] left-[20%]">
        <div class="bg-gray-400 rounded-lg shadow-lg w-[45rem] p-6">
            <h2 class="text-xl font-bold mb-4">Ajouter un Pays</h2>
            <form method="post">
                <?php
                if (!empty($errorMessage)) {
                    echo "
                    <div class=\"flex justify-center\">
                        <div class=\"bg-red-500 w-96 flex items-center justify-center border-2 border-red-300 rounded-lg p-1\">
                            <strong>$errorMessage</strong>    
                        </div>
                    </div>
                    ";
                }
                ?>


                <div class="mb-4">
                    <label for="nom" class="block text-black font-medium mb-2">Nom de Ville:</label>
                    <input type="text" id="nom" name="nom" class="w-full border border-gray-300 px-4 py-2 rounded-lg" value="<?php echo "$name" ?>">
                </div>

                <div class="mb-4">
                    <label for="Capital" class="block text-black font-medium mb-2">Capital:</label>
                    <input type="checkbox" id="capital" name="Capital" class="w-full border border-gray-300 px-4 py-2 rounded-lg" value="1">
                </div>

                <div class="mb-4">
                    <label for="pays" class="block text-black font-medium mb-2">pays:</label>
                    <select id="pays" name="pays" class="w-full border border-gray-300 px-4 py-2 rounded-lg">
                        <option value="" disabled selected>Sélectionnez un pays</option>
                        
                        <?php 
                            $result = $connect->query("SELECT id_pays, nom FROM pays");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['id_pays'] . "'>" . $row['nom'] . "</option>";
                            } 
                        ?>

                    </select>
                </div>

                <?php
                if (!empty($succesMessage)) {
                    echo "
                    <div class=\"flex justify-center\">
                        <div class=\"bg-green-500 w-64 mb-4 flex items-center justify-center border-2 border-green-300 rounded-lg p-1\">
                            <strong>$succesMessage</strong>
                        </div>
                    </div>
                    ";
                }
                ?>

                <div class="flex justify-end space-x-2">
                    <button type="button" id="closeModal" class="bg-white text-gray-700 px-4 py-2 rounded-md hover:bg-[#f2902f] hover:text-black hover:transition-all hover:duration-300 hover:ease-in-out">Annuler</button>
                    <button type="submit" class="bg-[#f2902f] text-white px-4 py-2 rounded-md hover:bg-white hover:text-[#f2902f] hover:transition-all hover:duration-300 hover:ease-in-out">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>