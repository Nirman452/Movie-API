<?php 
class Post{
    private $conn;
    private $table = 'all_movies';

    public $id;
    public $reference_code;
    public $title;
    public $category;
    public $image;
    public $year_created;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read_api($key){
        $query = "SELECT * FROM token_info WHERE token=? ";

        $stmt = $this-> conn->prepare($query);
        $stmt -> bindParam(1, $key);
        $stmt-> execute();

        return $stmt;
    }

    public function update_api($key){
        $query = "UPDATE token_info SET hit_count = hit_count+1 WHERE token=? ";

        $stmt = $this-> conn->prepare($query);
        $stmt -> bindParam(1, $key);
        $stmt-> execute();

        return $stmt;
    }

    public function read_all(){
        $query = "SELECT * FROM $this->table";

        $stmt = $this-> conn->prepare($query);
        $stmt-> execute();

        return $stmt;
    }

    public function read_searchbox($id)
    {
        $query = "SELECT * FROM $this->table WHERE title LIKE '$id%'";

        $stmt = $this-> conn->prepare($query);
        $stmt-> execute();

        return $stmt;

    }



    public function read_single(){
        $query = "SELECT * FROM $this->table WHERE title=? ";

        $stmt = $this-> conn->prepare($query);
        $stmt -> bindParam(1, $this->title);
        $stmt-> execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this-> id = $row['id'];
        $this-> reference_code = $row['reference_code'];
        $this-> title = $row['title'];
        $this-> category = $row['category'];
        $this-> image = $row['image'];
        $this-> year_created = $row['year_created'];
    }
}
?>