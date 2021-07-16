<?php
if(isset($_POST['key'])){    //jW27N5bd5IliWveJlimQEJ3sbCCpE3Bv
    $key = $_POST['key'];    //8K5gW0QhaOkfiSgrs45HZO1W43hpYO9u
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://localhost/movie_api/api/post/read.php");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('api_key' => $key)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $server_output = curl_exec($ch);
    curl_close ($ch);
    
    if ($server_output) {
    
        if(json_decode($server_output)->message == 'OK'){
            session_start();
            $_SESSION['logged'] = true;
            setcookie('token', $_POST['key'], time() + (86400 * 30), "/");

            header('Location: ../../pages/app.php');
        }else{

            $message = json_decode($server_output);
            echo $message->message;
        }
    } else { 
        echo "Error: Invalid API key!";
    }
}