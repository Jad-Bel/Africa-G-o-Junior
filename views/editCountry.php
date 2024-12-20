<?php
include "/xampp/htdocs/africa-geo-junior/views/connect.php";

$id = "";
$nom = "";
$population = "";
$continent = "";
$langue = "";

$succesMessage = "";
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: show the data of the country;

    if (!isset($_GET["id_pays"]) || empty($_GET["id_pays"])) {
        header("location: /africa-geo-junior/views/editCountry.php");
        exit;
    }
    $id = intval($_GET["id_pays"]);

    $sql = "SELECT * FROM pays WHERE id_pays = $id";
    $result = $connect->query($sql);

    $row = $result->fetch_assoc();
    $nom = $row['nom'];
    $population = $row['Population'];
    $langue = $row['langue'];

    if (!$row) {
        header("location: /africa-geo-junior/adminPage.php");
        exit;
    }
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // POST method: to post and update the data of the country;

    $id = $_POST['id_pays'];
    $nom = $_POST['nom'];
    $langue = $_POST['langue'];
    $population = $_POST['Population'];
    $continent = $_POST['continent_id'];

    do {
        if (empty($nom) || empty($population) || empty($langue) || empty($continent)) {
                    $errorMessage = "All the fields are required";
                    break;
        }

        $sql = "UPDATE pays " .
        "SET `nom`= '$nom', `Population`= '$population', `langue` = '$langue', `continent_id` = '$continent'" .
        "WHERE id_pays = $id";
        $result = $connect->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connect->error;
            break;
        }

        $succesMessage = "Pays modifier avec success";
        header("location: /africa-geo-junior/adminPage.php");
        exit;
    } while (true);
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
            <h2 class="text-xl font-bold mb-4">Modifier un Pays</h2>
            <form method="post">
                <input type="hidden" name="id_pays" value="<?php echo "$id" ?>">
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
                    <input type="number" id="population" name="Population" class="w-full border border-gray-300 px-4 py-2 rounded-lg" value="<?php echo "$population" ?>">
                </div>

                <div class="mb-4">
                    <label for="continent" class="block text-black font-medium mb-2">Continent:</label>
                    <select id="continent" name="continent_id" class="w-full border border-gray-300 px-4 py-2 rounded-lg">
                        <option value="" disabled selected>Selectioner une continent..</option>

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
                    <button type="submit" class="bg-[#f2902f] text-white px-4 py-2 rounded-md hover:bg-white hover:text-[#f2902f] hover:transition-all hover:duration-300 hover:ease-in-out">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>