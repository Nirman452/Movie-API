<?php
session_start();
if(isset($_SESSION['logged'])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../dist/stlye.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API</title>
    </head>
    <body>
    
        <div id="flex">
    
            <form  method="post">
                <input id="button" type="button" value="Search">
            </form>
    
            <label for="category"><i class="fas fa-ticket-alt"></i> Select a category:</label>
            <select name="category" id="category">
                <option value="all_titles">All titles</option>
                <option value="action">Action</option>
                <option value="drama">Drama</option>
                <option value="horror">Horror</option>
                <option value="scifi">Sci-Fi</option>
            </select>
    
            <p class="text"><i class="fas fa-search"></i> Or search by name:</p>
    
            <input id="searchbox" type="text" oninput="inputSearch();">

            <span class="line"></span>
    
            <div id="storedData">Search results goes here</div>
    
            <form id="form" method="post" action="../api/post/logout.php">
                <button id="logout">Logout <i class="fas fa-sign-in-alt"></i></button>
            </form>
            <span class="line"></span>

                    <!-- The Modal -->
        <div id="myModal" class="modal">
    
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close"><i class="fas fa-times"></i></span>
                    <h2 id="h2"></h2>
                </div>
                <div class="modal-body">
                    <p id="categoryName"></p>
                    <p id="year"></p>
                    <p id="refCode"></p>
                    <img id="movieImg" src="" alt="">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    
        </div>
    </body>
    </html>
    
    <script src="../dist/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> <?php
}else{
    die('Error: Unable to join without API key!');
}
?>