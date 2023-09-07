<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="tab">
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>grade_id</th>
        <th>email</th>
        <th>fullname</th>
        <th>birthdate</th>
        <th>gender</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        function find_one_student(string $email) : array {
            $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
            $requete = $bdd->prepare("SELECT * FROM student where email = :email");
            $requete->bindParam(':email', $email);
            $requete->execute();
            $result = $requete->fetch();
            return $result;
        }
        $student = find_one_student("dominique.coste@dbmail.com");
        echo '<tr>';
        echo '<td>'.$student['id'].'</td>';
        echo '<td>'.$student['grade_id'].'</td>';
        echo '<td>'.$student['email'].'</td>';
        echo '<td>'.$student['fullname'].'</td>';
        echo '<td>'.$student['birthdate'].'</td>';
        echo '<td>'.$student['gender'].'</td>';
        echo '</tr>';
    ?>
    </tbody>
</table>
</div>
</body>
</html>
