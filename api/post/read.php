<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../config/Database.class.php';
include_once '../../model/Post.class.php';

$database = new Database();
$db = $database-> connect();

$post = new Post($db);

if(isset($_POST['api_key'])){
    $result = $post->read_api($_POST['api_key']);

    $num = $result->rowCount();

    if($num > 0){

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row['status'] == 1){
                if($row['hit_count'] < $row['hit_limit']){
                    $update = $post-> update_api($_POST['api_key']);
                    $json = array('message' => 'OK');
                    $data = json_encode($json);
                    echo $data;
                }else{
                    $json = array('message' => 'Error: You used all of your 1000 API requests!');
                    $data = json_encode($json);
                    echo $data;
                }   
            }else{
                $posts_arr = array();
                $posts_arr['data'] = array();
                $posts_item = array('message' => 'error');
                    
                array_push($posts_arr['data'], $posts_item);
                                            
                echo json_encode($posts_arr);
            }
        }
    }
}


if(isset($_POST['data'])){
    $result = $post->read_api($_POST['data']);

    $num = $result->rowCount();

    if($num > 0){

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row['status'] == 1){
                if($row['hit_count'] < $row['hit_limit']){
                    $update = $post-> update_api($_POST['data']);

                    $result = $post->read_all();

                    $num = $result->rowCount();
                    
                    if($num > 0){
                        $posts_arr = array();
                        $posts_arr['data'] = array();
                    
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                    
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
                }else{
                    $json = array('message' => 'Error: You used all of your 1000 API requests!');
                    $data = json_encode($json);
                    echo $data;
                }
                
            }else{
                echo json_encode(
                    array('message' => 'User deactivated!')
                );
            }
        }
    }
}
?>