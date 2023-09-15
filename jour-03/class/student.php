<?php 
    class Student {
        private int $id;
        private int $grade_id;
        private string $email;
        private string $fullname;
        private DateTime $birthdate;
        private string $gender;


        function __construct(int $id = 2, int $grade_id = 2, string $email = "student@laplateforme.io", string $fullname = "student", ?DateTime $birthdate = null, string $gender = ""){
            $this->id = $id;
            $this->grade_id = $grade_id;
            $this->email = $email;
            $this->fullname = $fullname;
            if ($birthdate === null) {
                // Créez un objet DateTime par défaut si $birthdate est null
                $this->birthdate = new DateTime("2023-09-08");
            } else {
                $this->birthdate = $birthdate;
            }
            $this->gender = $gender;
        }


        public function getId(): ?int {
            return $this->id;
        }

        public function setId(int $id){
            $this->id = $id;
        }

        public function getGradeId(): ?int {
            return $this->grade_id;
        }

        public function setGradeId(int $grade_id) {
            $this->grade_id = $grade_id;
        }

        public function getEmail(): ?string {
            return $this->email;
        }

        public function setEmail(string $email) {
            $this->email = $email;
        }

        public function getFullname(): ?string {
            return $this->fullname;
        }

        public function setFullname(string $fullname) {
            $this->fullname = $fullname;
        }

        public function getBirthdate(): ?DateTime {
            return $this->birthdate;
        }

        public function setBirthdate(DateTime $birthdate) {
            $this->birthdate = $birthdate;
        }

        public function getGender(): ?string {
            return $this->gender;
        }

        public function setGender(string $gender) {
            $this->gender = $gender;
        }
    }

?>