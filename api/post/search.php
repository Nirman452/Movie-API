<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.class.php';
include_once '../../model/Post.class.php';

$database = new Database();
$db = $database-> connect();

$post = new Post($db);

if(isset($_POST['data'])){
    $dt = $_POST['data'];

    $result = $post-> read_searchbox($dt);

    $num = $result->rowCount();

    if($num > 0){
        $posts_arr = array();
        $posts_arr['data'] = array();
    
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
            extract($data);

            $posts_item = array(

                'id' => $id,
                'reference_code' => $reference_code,
                'title' => $title,
                'category' => $category,
                'image' => $image,
                'year_created' => $year_created
            );

            array_push($posts_arr['data'], $posts_item);
        }

        echo json_encode($posts_arr);

    }else{
        echo json_encode(
            array('message' => 'No results found!')
        );
    }
}