<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./dist/stlye.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>

    <div id="flex">
    <span class="line"></span>
        <div id="index-wrap">
            <p class="text"><i class="fas fa-key"></i> Enter your API Key to proceed:</p>
            
            <form id="form" method="post" action="./api/post/check_api.php">
                <input id="searchbox" name="key" type="text">
                
                <button id="enter"><i class="fas fa-door-open"></i> Submit</button>
            </form>
        </div>
        
        <span class="line"></span>
    </div>
</body>
</html>