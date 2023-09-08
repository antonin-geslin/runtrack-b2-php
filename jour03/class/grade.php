<?php 

    require_once './class/student.php';
    class Grade {
        private int $id;
        private int $room_id;
        private string $name;
        private DateTime $year;


        function __construct(int $id = 1, $room_id = 1, string $name = "grade", ?DateTime $year = null){
            $this->id = $id;
            $this->room_id = $room_id;
            $this->name = $name;
            if ($year === null) {
                $this->year = new DateTime("2023-09-08");
            } else {
                $this->year = $year;
            }
        }

        function getId(): ?int {
            return $this->id;
        }

        function setId(int $id){
            $this->id = $id;
        }

        function getRoomId(): ?int {
            return $this->room_id;
        }

        function setRoomId(int $room_id){
            $this->room_id = $room_id;
        }

        function getName(): ?string {
            return $this->name;
        }

        function setName(string $name){
            $this->name = $name;
        }

        function getYear(): ?DateTime {
            return $this->year;
        }

        function setYear(DateTime $year){
            $this->year = $year;
        }


        function getStudents(): ?array {
            $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
            $requete = $bdd->prepare("SELECT * FROM student WHERE grade_id = :grade_id");
            $requete->bindParam(':grade_id', $this->id);
            $requete->execute();
            $students = $requete->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($students as $student) {
                $student['birthdate'] = new DateTime($student['birthdate']);
                $data = new Student($student['id'], $student['grade_id'], $student['email'], $student['fullname'], $student['birthdate'], $student['gender']);
                $result[] = $data;  
            }
            return $result;
        }

    }
?>