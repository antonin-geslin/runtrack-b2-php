<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <table>
    <thead>
    <tr>    
        <th>name</th>
        <th>capacity</th>
        <th>is full ?</th>
    </tr>
    </thead>
    <tbody>
    <?php
    function find_all_students_grades() : array {
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("SELECT room.name, room.capacity FROM room");
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    $rooms = find_all_students_grades();
    foreach ($rooms as $room) {
            echo '<tr>';
            echo '<td>'.$room['name'].'</td>';
            echo '<td>'.$room['capacity'].'</td>';
            echo '<td>'.$grade['name'].'</td>';
            echo '</tr>';
        }
    ?>
    <tbody>
</table>  
</body>
</html>