<?php
include "/xampp/htdocs/africa-geo-junior/views/connect.php";

$nom = "";
$population = "";
$langue = "";
$continent = "";

$succesMessage = "";
$errorMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST["nom"];
    $population = $_POST["population"];
    $langue = $_POST["langue"];
    $continent = $_POST["continent"];

    do {
        if (empty($nom) || empty($population) || empty($langue)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // insert new country to the db
        $sql = "INSERT INTO pays (`nom`, `population`, `langue`, `continent_id`) VALUES ('$nom', '$population', '$langue', '$continent')";
        $result = $connect -> query($sql);

        if (!$result) {
            $errorMessage = "Invalid query " . $connect->error;
            break;
        }

        $nom = "";
        $population = "";
        $langue = "";

        $succesMessage = "Country added correctly";

        header("location: /africa-geo-junior/adminPage.php");
        exit;
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


    <div id="countryModal" class="fixed absolute top-[17.5%] left-[20%]">
        <div class="bg-gray-400 rounded-lg shadow-lg w-[45rem] p-6">
            <h2 class="text-xl font-bold mb-4">Ajouter un Pays</h2>
            <form method="post">
                <?php
                if (!empty($errorMessage)) {
                    echo "
                    <div class=\"bg-red-500 flex items-center justify-center border-2 border-red-300 rounded-lg p-1\">
                        <strong>$errorMessage</strong>
                    </div>
                    ";
                }
                ?>


                <div class="mb-4">
                    <label for="nom" class="block text-black font-medium mb-2">Nom du Pays:</label>
                    <input type="text" id="nom" name="nom" class="w-full border border-gray-300 px-4 py-2 rounded-lg" value="<?php echo "$nom" ?>">
                </div>

                <div class="mb-4">
                    <label for="population" class="block text-black font-medium mb-2">Population:</label>
                    <input type="number" id="population" name="population" class="w-full border border-gray-300 px-4 py-2 rounded-lg" value="<?php echo "$population" ?>">
                </div>
                
                <div class="mb-4">
                    <label for="continent" class="block text-black font-medium mb-2">Continent:</label>
                    <select id="continent" name="continent" class="w-full border border-gray-300 px-4 py-2 rounded-lg">
                        <option value="" disabled selected>Sélectionnez un Continent</option>
                        
                        <?php 
                            $result = $connect->query("SELECT continent_id, nom FROM continent");
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['continent_id'] . "'>" . $row['nom'] . "</option>";
                            } 
                        ?>

                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="langue" class="block text-black font-medium mb-2">Langue:</label>
                    <input type="text" id="langue" name="langue" class="w-full border border-gray-300 px-4 py-2 rounded-lg" value="<?php echo "$langue" ?>">
                </div>


                <?php
                if (!empty($succesMessage)) {
                    echo "
                    <div class=\"bg-green-500 mb-4 flex items-center justify-center border-2 border-green-300 rounded-lg p-1\">
                        <strong>$succesMessage</strong>
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