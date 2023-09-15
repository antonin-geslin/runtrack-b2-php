<?php 

    require_once './class/grade.php';
    class Room {
        private int $id;
        private int $room_id;
        private string $name;
        private int $capacity;


        function __construct(int $id = 1, int $room_id = 1, string $name = "room", int $capacity = 0){
            $this->id = $id;
            $this->room_id = $room_id;
            $this->name = $name;
            $this->capacity = $capacity;
        }

        function getId(): ?int {
            return $this->id;
        }

        function setId(int $id) {
            $this->id = $id;
        }

        function getRoomId(): ?int {
            return $this->room_id;
        }

        function setRoomId(int $room_id) {
            $this->room_id = $room_id;
        }

        function getName(): ?string {
            return $this->name;
        }

        function setName(string $name) {
            $this->name = $name;
        }

        function getCapacity(): ?int {
            return $this->capacity;
        }

        function setCapacity(int $capacity) {
            $this->capacity = $capacity;
        }

        function getGrades(): ?array {
            $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
            $requete = $bdd->prepare("SELECT * FROM grade WHERE room_id = :room_id");
            $requete->bindParam(':room_id', $this->id);
            $requete->execute();
            $grades = $requete->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($grades as $grade) {
                $grade['year'] = new DateTime($grade['year']);
                $data = new Grade($grade['id'], $grade['room_id'], $grade['name'], $grade['year']);
                $result[] = $data;  
            }
            return $result;
        }
    }

?>