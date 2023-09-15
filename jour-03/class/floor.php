<?php 
    class Floor {
        private int $id; 
        private string $name;
        private int $level;

        function __construct(int $id = 1, string $name = "floor", int $level = 0){
            $this->id = $id;
            $this->name = $name;
            $this->level = $level;
        }

        function getId(): ?int {
            return $this->id;
        }

        function setId(int $id){
            $this->id = $id;
        }

        function getName(): ?string {
            return $this->name;
        }

        function setName(string $name){
            $this->name = $name;
        }

        function getLevel(): ?int {
            return $this->level;
        }

        function setLevel(int $level){
            $this->level = $level;
        }

        function getRooms(): ?array {
            $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
            $requete = $bdd->prepare("SELECT * FROM room WHERE floor_id = :floor_id");
            $requete->bindParam(':floor_id', $this->id);
            $requete->execute();
            $rooms = $requete->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($rooms as $room) {
                $data = new Room($room['id'], $room['floor_id'], $room['name'], $room['capacity']);
                $result[] = $data;  
            }
            return $result;
        }
    }

?>