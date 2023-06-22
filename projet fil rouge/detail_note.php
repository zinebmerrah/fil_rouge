<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d78c31e99a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <title>tableau de bord</title>
</head>
<body>
    <!--main-->
   <aside>
     <img src="img/Mosque (3) 1 (1).png"  style="padding-top: 4%" alt="">
        <ul>
            <li> <a href="index.php"><h4>Tableau de bord</h4></a></li>
            <li> <a href="apprenant.php"><h4>Apprenants</h4></a></li>
            <li> <a href="evaluation.php"><h4>Evaluation</h4></a></li>
        </ul>

    </aside>
    <main>
        <?php 
            include "connect.php";

            if(isset($_POST['rechercher'])){
                
                $annee= $_POST['annee'];
                
                

                // Récupérer la valeur sélectionnée dans le formulaire
                $selectedOption = $_POST['nom'];

                // Diviser la valeur pour obtenir l'ID, le nom et le prénom séparément
                list($id_apprenant, $nom, $prenom) = explode('|', $selectedOption);

                // Utiliser les valeurs récupérées dans votre logique de traitement
                echo "ID Apprenant : " . $id_apprenant;
                echo "Nom : " . $nom;
                echo "Prénom : " . $prenom;








                $sql = "SELECT 
                    MAX(CASE WHEN MONTH(e.date) = 10 THEN e.note END) AS Oct,
                    MAX(CASE WHEN MONTH(e.date) = 11 THEN e.note END) AS Nov,
                    MAX(CASE WHEN MONTH(e.date) = 12 THEN e.note END) AS Déc,
                    MAX(CASE WHEN MONTH(e.date) = 1 THEN e.note END) AS Jan,
                    MAX(CASE WHEN MONTH(e.date) = 2 THEN e.note END) AS Fév,
                    MAX(CASE WHEN MONTH(e.date) = 3 THEN e.note END) AS Mars,
                    MAX(CASE WHEN MONTH(e.date) = 4 THEN e.note END) AS Avril,
                    MAX(CASE WHEN MONTH(e.date) = 5 THEN e.note END) AS Mai,
                    MAX(CASE WHEN MONTH(e.date) = 6 THEN e.note END) AS Juin,
                    MAX(CASE WHEN MONTH(e.date) = 7 THEN e.note END) AS Juillet
                FROM
                    apprenant a
                LEFT JOIN
                    evaluation e ON a.id_apprenant = e.id_apprenant
                WHERE a.id_apprenant = $id_apprenant
                GROUP BY
                    a.id_apprenant";

                $result = $conn->query($sql);


                $row = $result->fetch(PDO::FETCH_ASSOC);
                $oct = $row['Oct'];
                $nov = $row['Nov'];
                $dec = $row['Déc'];
                $jan = $row['Jan'];
                $feb = $row['Fév'];
                $mar = $row['Mars'];
                $apr = $row['Avril'];
                $may = $row['Mai'];
                $jun = $row['Juin'];
                $jul = $row['Juillet'];
        ?>

        <h2 style="color: #A37D3D; margin: 5%"><?php echo $nom ?></h2>
<?php }elseif(isset($_GET['id'])){
    $id= $_GET['id'];

    $query = "SELECT  prenom FROM apprenant WHERE id_apprenant ='$id'";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $nom_prenom = $stmt->fetch(PDO::FETCH_COLUMN);

                $sql = "SELECT 
                    MAX(CASE WHEN MONTH(e.date) = 10 THEN e.note END) AS Oct,
                    MAX(CASE WHEN MONTH(e.date) = 11 THEN e.note END) AS Nov,
                    MAX(CASE WHEN MONTH(e.date) = 12 THEN e.note END) AS Déc,
                    MAX(CASE WHEN MONTH(e.date) = 1 THEN e.note END) AS Jan,
                    MAX(CASE WHEN MONTH(e.date) = 2 THEN e.note END) AS Fév,
                    MAX(CASE WHEN MONTH(e.date) = 3 THEN e.note END) AS Mars,
                    MAX(CASE WHEN MONTH(e.date) = 4 THEN e.note END) AS Avril,
                    MAX(CASE WHEN MONTH(e.date) = 5 THEN e.note END) AS Mai,
                    MAX(CASE WHEN MONTH(e.date) = 6 THEN e.note END) AS Juin,
                    MAX(CASE WHEN MONTH(e.date) = 7 THEN e.note END) AS Juillet
                FROM
                    apprenant a
                LEFT JOIN
                    evaluation e ON a.id_apprenant = e.id_apprenant
                WHERE a.id_apprenant = $id
                GROUP BY
                    a.id_apprenant";

                $result = $conn->query($sql);


                $row = $result->fetch(PDO::FETCH_ASSOC);
                $oct = $row['Oct'];
                $nov = $row['Nov'];
                $dec = $row['Déc'];
                $jan = $row['Jan'];
                $feb = $row['Fév'];
                $mar = $row['Mars'];
                $apr = $row['Avril'];
                $may = $row['Mai'];
                $jun = $row['Juin'];
                $jul = $row['Juillet'];
                ?>
                        <h2 style="color: #A37D3D; margin: 5%"><?php echo $nom_prenom?></h2>

<?php
} ?>
        <section style="background-color: #FEFDFB; border-radius: 1%; width: 85%; margin: 2%; margin-left: 7%">
        <form method="post"  action="detail_note.php?id=<?php echo $id_apprenant ?>">
                            <div class="row mb-4">
                                <label for="oct" class="col-sm-3 col-form-label">Oct:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="oct" value="<?php echo $oct; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="nov" class="col-sm-3 col-form-label">Nov:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="nov" value="<?php echo $nov; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="des" class="col-sm-3 col-form-label">Dés:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="des" value="<?php echo $dec; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="jan" class="col-sm-3 col-form-label">Jan:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="jan" value="<?php echo $jan; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="fev" class="col-sm-3 col-form-label">Février:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="fev" value="<?php echo $feb; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="mars" class="col-sm-3 col-form-label">Mars:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="mars" value="<?php echo $mar; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="april" class="col-sm-3 col-form-label">Avril:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="april" value="<?php echo $apr; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="may" class="col-sm-3 col-form-label">Mai:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="may" value="<?php echo $may; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="juin" class="col-sm-3 col-form-label">Juin:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="juin" value="<?php echo $jun; ?>" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="juillet" class="col-sm-3 col-form-label">Juillet</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="juillet" value="<?php echo $jul; ?>" class="form-control" >
                                </div>
                            </div>
                           
                            
                            <div class="row mb-4"
                                style="display:flex; flex-direction:row;margin-top:30px; justify-content: center;">
                                
                                <input type="hidden" value="<?php echo $id_apprenant ?>" name="id">
                                <button type="submit" class="btn"
                                    style="background-color: #9A722C; border:none; color:white; width: 35%;" class="text-center
                                                            text-muted mt-5 mb-0" style="margin: 1%px; "
                                    name="update">Modifier</button>

                                

                            </div>

                        </form>

                        <?php

if (isset($_POST['update'])) {
    $idApprenant = $_POST["id"];
    $noteOct = $_POST["oct"];
    $noteNov = $_POST["nov"];
    $noteDec = $_POST["des"];
    $noteJan = $_POST["jan"];
    $noteFev = $_POST["fev"];
    $noteMars = $_POST["mars"];
    $noteAvril = $_POST["april"];
    $noteMai = $_POST["may"];
    $noteJuin = $_POST["juin"];
    $noteJuillet = $_POST["juillet"];

    $sql = "UPDATE evaluation SET
            note = CASE
                WHEN MONTH(date) = 10 THEN :noteOct
                WHEN MONTH(date) = 11 THEN :noteNov
                WHEN MONTH(date) = 12 THEN :noteDec
                WHEN MONTH(date) = 1 THEN :noteJan
                WHEN MONTH(date) = 2 THEN :noteFev
                WHEN MONTH(date) = 3 THEN :noteMars
                WHEN MONTH(date) = 4 THEN :noteAvril
                WHEN MONTH(date) = 5 THEN :noteMai
                WHEN MONTH(date) = 6 THEN :noteJuin
                WHEN MONTH(date) = 7 THEN :noteJuillet
            END
            WHERE id_apprenant = :idApprenant";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':noteOct', $noteOct);
    $stmt->bindParam(':noteNov', $noteNov);
    $stmt->bindParam(':noteDec', $noteDec);
    $stmt->bindParam(':noteJan', $noteJan);
    $stmt->bindParam(':noteFev', $noteFev);
    $stmt->bindParam(':noteMars', $noteMars);
    $stmt->bindParam(':noteAvril', $noteAvril);
    $stmt->bindParam(':noteMai', $noteMai);
    $stmt->bindParam(':noteJuin', $noteJuin);
    $stmt->bindParam(':noteJuillet', $noteJuillet);
    $stmt->bindParam(':idApprenant', $idApprenant);
    
    if ($stmt->execute()) {
        echo "Mise à jour des notes réussie.";
    } else {
        echo "Erreur lors de la mise à jour des notes.";
    }
}
?>

        </section>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>