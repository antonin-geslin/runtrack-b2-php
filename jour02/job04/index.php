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
        <th>email</th>
        <th>fullname</th>
        <th>grade_name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    function find_all_students_grades() : array {
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("SELECT student.email, student.fullname, grade.name FROM student INNER JOIN grade ON student.grade_id = grade.id");
        $requete->execute();
        $result = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    $grades = find_all_students_grades();
    foreach ($grades as $grade) {
            echo '<tr>';
            echo '<td>'.$grade['email'].'</td>';
            echo '<td>'.$grade['fullname'].'</td>';
            echo '<td>'.$grade['name'].'</td>';
            echo '</tr>';
        }
    ?>
    <tbody>
</table>  
</body>
</html>