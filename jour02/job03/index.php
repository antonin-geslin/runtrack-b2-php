<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <label for="input-email">Email :</label>
        <input type="email" name="input-email" id="input-email" required><br><br>

        <label for="input-fullname">Nom complet :</label>
        <input type="text" name="input-fullname" id="input-fullname" required><br><br>

        <label for="input-gender">Genre :</label>
        <input type="text" name="input-gender" id="input-gender" required><br><br>

        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" name="input-birthdate" id="input-birthdate" required><br><br>

        <label for="input-grade_id">ID de grade :</label>
        <input type="number" name="input-grade_id" id="input-grade_id" required><br><br>

        <button type="submit" name ="submit">SUBMIT</button>
    </form>
    <?php 
    function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $gradeId){
        $formattedBirthdate = $birthdate->format('Y-m-d');
        $bdd = new PDO('mysql:host=localhost;dbname=lp_official;charset=utf8', 'root', 'root');
        $requete = $bdd->prepare("INSERT INTO student (grade_id, email, fullname, birthdate, gender) VALUES (:grade_id, :email, :fullname, :birthdate, :gender)");
        $requete->bindParam(':email', $email);
        $requete->bindParam(':fullname', $fullname);
        $requete->bindParam(':gender', $gender);
        $requete->bindParam(':birthdate', $formattedBirthdate);
        $requete->bindParam(':grade_id', $gradeId);
        $requete->execute();
        if (!$requete->execute()) {
            print_r($requete->errorInfo());
        }
        
    }

    if (isset($_POST['submit'])) {
        $birthdate = new DateTime($_POST['input-birthdate']);
        insert_student($_POST['input-email'], $_POST['input-fullname'], $_POST['input-gender'], $birthdate, $_POST['input-grade_id']);
    }
    
    ?>
</body>
</html>