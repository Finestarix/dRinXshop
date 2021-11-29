<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        http_response_code(405);
        die();
    }

    $drinksJSON = file_get_contents("./assets/json/drinks.json");
    $drinks = json_decode($drinksJSON)->drinks;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>dRinXshop | Introduction to Artificial Intelligence</title>
        <link rel="icon" href="./assets/icons/favicon.ico">

        <link href="./assets/css/tailwind.css" rel="stylesheet">
        <link href="./assets/css/fontawesome.css" rel="stylesheet">

        <script defer src="assets/js/alpine.min.js"></script>

        <style>body::-webkit-scrollbar {display: none;}</style>
    </head>
    <body class="min-h-screen bg-gray-100">

        <nav x-data="{isMenuOpen: false}" class="bg-white shadow-sm">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">

                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="h-6 w-auto w-auto" src="./assets/images/logo.png" alt="ReXshop">
                    </div>
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                        <a class="border-gray-800 text-gray-800 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium" aria-current="page">Drinks</a>
                    </div>
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="isMenuOpen = !isMenuOpen" type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <i x-show="!isMenuOpen" class="fas fa-bars"></i>
                    <i x-show="isMenuOpen" class="fas fa-times"></i>
                    </button>
                </div>

                </div>
            </div>

            <div x-show="isMenuOpen" class="sm:hidden" id="mobile-menu">
                <div class="pt-2 pb-3 space-y-1">
                    <a class="bg-gray-50 border-gray-800 text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium" aria-current="page">Drinks</a>
                </div>
            </div>

        </nav>

        <div class="py-10">

            <header>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold leading-tight text-gray-800">List Drinks</h1>
                </div>
            </header>

            <main>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="px-4 py-8 sm:px-0">
                        <ul id="drink-container" role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                            <?php foreach($drinks as $key => $drink) { ?>
                                <li class="drink-content relative">
                                    <a href="detail.php?id=<?= $drink->id ?>" class="relative group block w-full rounded-lg bg-gray-100 overflow-hidden cursor-pointer">
                                        <img width="450" height="200" src="./assets/images/drinks/<?= $drink->image ?>" alt="<?= $drink->image ?>" class="object-cover opacity-80">
                                        <div class="absolute flex justify-center items-center text-center px-3 right-0 left-0 top-1 m-auto z-30">
                                            <p class="rounded-lg drink-name block text-lg font-bold tracking-wider text-gray-800"><?= $drink->name ?></p>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </main>

        </div>

        <footer class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                <div class="md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">
                        &copy; 2021 Software Laboratory Center (SLC).
                    </p>
                </div>
            </div>
        </footer>

    </body>
</html>
