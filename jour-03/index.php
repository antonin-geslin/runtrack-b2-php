<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once './class/student.php';
    require_once './class/grade.php';
    require_once './class/room.php';
    require_once './class/floor.php';
    include 'functions.php';

    $student = new Student(1, 1, "email@email.com", "Terry Cristinelli", new DateTime("1990-01-18"), "male");

    $student2 = new Student();

    $grade = new Grade(1, 8, "Bachelor 1", new DateTime("2023-09-08"));

    $room = new Room(1, 1, "RDC Food And Drinks", 90);

    $floor = new Floor(1, "RDC", 0);

    $grade = findOneGrade(2);

    $students = $grade->getStudents();

    foreach ($students as $student) {
        echo $student->getFullname() . "<br>";
        echo $grade->getName() . "<br><br>";
    }


    $floor = findOneFloor(1);
    $rooms = $floor->getRooms();

    foreach ($rooms as $room) {
        echo $room->getName() . "<br>";
        echo $floor->getName() . "<br><br>";
    }


    $room = findOneRoom(8);

    $grades = $room->getGrades();

    foreach ($grades as $grade) {
        echo $grade->getName() . "<br>";
        echo $room->getName() . "<br><br>";
    }

?>