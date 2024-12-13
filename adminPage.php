<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminPage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

    <body class="bg-gray-200">
        <header class="bg-gray-300 h-16 flex justify-center items-center">
            <nav class="h-12 w-[90%] flex justify-between items-center">
                <div class="hover:scale-105 hover:transition-all duration-300 ease-in-out">
                    <a href="index.html">
                        <img src="assets/africa.png" alt="" class="h-12">
                    </a>
                </div>
    
                <div class="flex items-center gap-20">
                    <div class="flex w-fit gap-6 justify-between">
                        <ul class="flex gap-6 justify-between">
                            <li class="btn bg-[#f2902f] w-24 p-2 rounded-lg flex items-center justify-center font-semibold hover:bg-[#c66505] hover:transition-all duration-300 ease-in-out">
                                <a href="adminPage.html">AUTHORS</a>
                            </li>
                            <li class="btn bg-[#f2902f] w-24 p-2 rounded-lg flex items-center justify-center font-semibold hover:bg-[#c66505] hover:transition-all duration-300 ease-in-out">
                                <a href="">STUDENT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <div class="flex h-screen">
            <!-- Side Navigation -->
            <aside class="w-64 bg-gray-300 text-white flex flex-col">
                <div class="p-4 text-center bg-[#f2902f]">
                    <h1 class="text-2xl font-bold">Navigation</h1>
                </div>
    
                <!-- Continent Section -->
                <div class="continent p-4 flex items-center">
                    <button class="text-lg font-semibold mb-2 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f2902f"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80-28-28q-6-6-9-13t-3-15v-224q-33 0-56.5-23.5T360-520v-40L235-685q-35 42-55 94t-20 111q0 134 93 227t227 93Zm40-2q119-15 199.5-105T800-480q0-133-93.5-226.5T480-800q-44 0-84.5 11.5T320-757v77h142q18 0 34.5 8t27.5 22l56 70h60q17 0 28.5 11.5T680-540v42q0 9-2.5 17t-7.5 16L520-240v78Z"/></svg>
                        Continent
                    </button>
                </div>
    
                <!-- Pays Section -->
                <div class="country p-4">
                    <button class="text-lg font-semibold mb-2 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f2902f"><path d="M200-120v-680h360l16 80h224v400H520l-16-80H280v280h-80Zm300-440Zm86 160h134v-240H510l-16-80H280v240h290l16 80Z"/></svg>
                        Pays</button>
                </div>
    
                <!-- Villes Section -->
                <div class="city p-4">
                    <button class="text-lg font-semibold mb-2 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#f2902f"><path d="M120-120v-560h160v-160h400v320h160v400H520v-160h-80v160H120Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 320h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Z"/></svg>
                        Villes</button>
                </div>
            </aside>

            <main class="flex-1 p-10">
                <!-- continents table -->
                <table class="continent-table min-w-full border-collapse border border-gray-300">
                    <!-- Table Header -->
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left flex items-center justify-between">Name</th>
                        </tr>
                    </thead>
                    <!-- table body -->
                    <tbody>
                        <?php
                            include "/xampp/htdocs/africa-geo-junior/views/connect.php";

                            $data = "SELECT * FROM continent";
                            $result = $connect -> query($data);

                            if (!$result) {
                                die("Invalid query: ". $connect->error);
                            }

                            while($row = $result->fetch_assoc()) { ?>
                                <tr class="odd:bg-gray-100 even:bg-white">
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['continent_id'] ?></td>
                                    <td class="border border-gray-300 px-4 py-2 flex justify-between"><?= $row['nom'] ?></td>
                                </tr>
                                
                           <?php } ?>
                    </tbody>
                </table>
                <!-- countries table -->
                <table class="country-table min-w-full border-collapse border border-gray-300 hidden">
                    <!-- Table Header -->
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Population</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nom</th>
                            <th class="border border-gray-300 px-4 py-2 text-left flex items-center justify-between">Langue
                                <div class="addCountryBtn rounded-xl font-bold text-lg flex items-center justify-center bg-[#f2902f] text-black w-12 p-1">
                                    <a href="/africa-geo-junior/views/createCountry.php">
                                        <button class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                                        </button>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <!-- table body -->
                    <tbody>
                        <?php
                            $data = "SELECT * FROM pays";
                            $result = $connect -> query($data);

                            if (!$result) {
                                die("Invalid query: ". $connect->error);
                            }

                            while($row = $result->fetch_assoc()) { ?>
                                <tr class="odd:bg-gray-100 even:bg-white">
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['id_pays'] ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['Population'] ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['nom'] ?></td>
                                    <td class="border border-gray-300 px-4 py-2 flex justify-between"><?= $row['langue'] ?>
                                        <div class="flex">
                                            <a href="/africa-geo-junior/views/editCountry.php?id_pays=<?=$row['id_pays']?>" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>
                                            <a href="/views/editCountry.php ?id=<?$row['id_pays']?>" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 ml-2">Delete</a>
                                        </div>
                                </td>
                                </tr>
                                
                           <?php } ?>
                    </tbody>
                </table>
                <!-- cities table -->
                <table class="city-table min-w-full border-collapse border border-gray-300 hidden">
                    <!-- Table Header -->
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nom du ville</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Capital</th>
                            <th class="border border-gray-300 px-4 py-2 text-left flex items-center justify-between">id du pays 
                                <div class="addCityBtn rounded-xl font-bold text-lg flex items-center justify-center bg-[#f2902f] text-black w-12 p-1">
                                    <a href="/africa-geo-junior/views/createCity.php">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                                        </button>
                                    </a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <!-- table body -->
                    <tbody>
                        <?php
                            // include "addModal.html";
                            
                            $servername = "localhost";
                            $username = "root";
                            $passwrd = "";
                            $database = "jeux_geo";
                            
                            $connect = mysqli_connect($servername, $username, $passwrd, $database);

                            $data = "SELECT * FROM ville";
                            $result = $connect -> query($data);

                            if (!$result) {
                                die("Invalid query: ". $connect->error);
                            }

                            while($row = $result->fetch_assoc()) { ?>
                                <tr class="odd:bg-gray-100 even:bg-white">
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['id_ville'] ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= $row['nom'] ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= ($row['capital'] == 1) ? "Oui" : "Non";  ?></td>
                                    <td class="border border-gray-300 px-4 py-2 flex justify-between"><?= $row['id_pays'] ?>
                                        <div class="flex">
                                            <a href="/africa-geo-junior/views/editCity.php?id_ville=<?=$row['id_ville']?>" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>
                                            <a href="/africa-geo-junior/views/.php?id_ville=<?=$row['id_ville']?>" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 ml-2">Delete</a>
                                        </div>
                                </td>
                                </tr>
                                
                           <?php } ?>
                    </tbody>
                </table>
            </main>
        </div>        
        <script src="main.js"></script>
    </body>
</html>