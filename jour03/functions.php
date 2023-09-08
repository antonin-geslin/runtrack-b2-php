<?php 
    require_once './class/student.php';
    require_once './class/grade.php';
    require_once './class/room.php';
    require_once './class/floor.php';
    
    
    $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');

    function findOneStudent(int $id): Student {
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("SELECT * FROM student WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        $result['birthdate'] = new DateTime($result['birthdate']);
        return new Student($result['id'], $result['grade_id'], $result['email'], $result['fullname'], $result['birthdate'], $result['gender']);
    }
    
    function findOneGrade(int $id): Grade {
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("SELECT * FROM grade WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        $result['year'] = new DateTime($result['year']);
        return new Grade($result['id'], $result['room_id'], $result['name'], $result['year']);
    }
    function findOneFloor(int $id): Floor {
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("SELECT * FROM floor WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        return new Floor($result['id'], $result['name'], $result['level']);
    }

    function findOneRoom(int $id): Room{
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("SELECT * FROM room WHERE id = :id");
        $requete->bindParam(':id', $id);
        $requete->execute();
        $result = $requete->fetch();
        return new Room($result['id'], $result['floor_id'], $result['name'], $result['capacity']);
    }
?>