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
    <table class="table table-bordered" style="margin: 2%; width: 95%">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom et Prénom</th>
      <th scope="col">Oct</th>
      <th scope="col">Nov</th>
      <th scope="col">Déc</th>
      <th scope="col">Jan</th>
      <th scope="col">Fév</th>
      <th scope="col">Mars</th>
      <th scope="col">Avril</th>
      <th scope="col">Mai</th>
      <th scope="col">Juin</th>
      <th scope="col">Juillet</th>
    </tr>
</thead>
<tbody>
<?php
include "connect.php";
$sql = "SELECT a.id_apprenant AS ID,
    CONCAT(a.nom, ' ', a.prenom) AS `Nom et Prénom`,
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
GROUP BY
    a.id_apprenant";

$result = $conn->query($sql);
foreach ($result as $row) {
    echo "
    <tr>
        <th scope='row'>" . $row['ID'] . "</th>
        <td>" . $row['Nom et Prénom'] . "</td>
        <td>" . $row['Oct'] . "</td>
        <td>" . $row['Nov'] . "</td>
        <td>" . $row['Déc'] . "</td>
        <td>" . $row['Jan'] . "</td>
        <td>" . $row['Fév'] . "</td>
        <td>" . $row['Mars'] . "</td>
        <td>" . $row['Avril'] . "</td>
        <td>" . $row['Mai'] . "</td>
        <td>" . $row['Juin'] . "</td>
        <td>" . $row['Juillet'] . "</td>
    </tr>
    
    ";


}

?>



</table>

<!-- Button trigger modal -->
<button type="button" class="btn" style="float: right; margin: 3%; background-color: #9A722C; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Modifier les notes
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
            // Récupérer les années scolaires
            $query = "SELECT DISTINCT annee_scolaire FROM evaluation";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $annees_scolaires = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Récupérer les noms et prénoms des apprenants
            $query = "SELECT DISTINCT id_apprenant, nom, prenom FROM apprenant";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $apprenants = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            ?>

            <form method="post" action="detail_note.php">
                <div class="row mb-4">
                    <label for="annee" class="col-sm-3 col-form-label">Année scolaire:</label>
                    <div class="col-sm-8">
                        <select class="form-select" style="background-color: #F9F4E7" name="annee" aria-label="Default select example">
                            <option selected></option>
                            <?php foreach ($annees_scolaires as $annee) { ?>
                                <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="nom" class="col-sm-3 col-form-label">Nom:</label>
                    <div class="col-sm-8">
                        <select class="form-select" style="background-color: #F9F4E7" name="nom" aria-label="Default select example">
                            <option selected></option>
                            <?php foreach ($apprenants as $apprenant) { ?>
                                <option value="<?php echo $apprenant['id_apprenant'] . '|'. $apprenant['nom'] . '|' . $apprenant['prenom']; ?>">
                                    <?php echo $apprenant['nom'] . ' ' . $apprenant['prenom']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

               

                <div class="row mb-4" style="display:flex; flex-direction:row;margin-top:30px; justify-content: center;">
                    <button type="submit" class="btn" style="background-color: #9A722C; border:none; color:white; width: 35%;" name="rechercher">
                        Rechercher
                    </button>
                </div>
            </form>



                        
            </div>
           
            </div>
        </div>
        </div>




        
<!-- Button trigger modal -->
<button type="button" class="btn" style="float: right; margin: 3%; background-color: #9A722C; color: white;" data-bs-toggle="modal" data-bs-target="#insertmodal">
        Ajouter des notes
        </button>

        <!-- Modal -->
        <div class="modal fade" id="insertmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <?php
            // Récupérer les années scolaires
            $query = "SELECT DISTINCT annee_scolaire FROM evaluation";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $annees_scolaires = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // Récupérer les noms et prénoms des apprenants
            $query = "SELECT DISTINCT id_apprenant, nom, prenom FROM apprenant";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $apprenants = $stmt->fetchAll(PDO::FETCH_ASSOC);

            
            ?>

            <form method="post" action="ajouter_note.php">
                <div class="row mb-4">
                    <label for="annee" class="col-sm-3 col-form-label">Année scolaire:</label>
                    <div class="col-sm-8">
                        <select class="form-select" style="background-color: #F9F4E7" name="annee" aria-label="Default select example">
                            <option selected></option>
                            <?php foreach ($annees_scolaires as $annee) { ?>
                                <option value="<?php echo $annee; ?>"><?php echo $annee; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="nom" class="col-sm-3 col-form-label">Nom:</label>
                    <div class="col-sm-8">
                        <select class="form-select" style="background-color: #F9F4E7" name="nom" aria-label="Default select example">
                            <option selected></option>
                            <?php foreach ($apprenants as $apprenant) { ?>
                                <option value="<?php echo $apprenant['id_apprenant'] . '|'. $apprenant['nom'] . '|' . $apprenant['prenom']; ?>">
                                    <?php echo $apprenant['nom'] . ' ' . $apprenant['prenom']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

               

                <div class="row mb-4" style="display:flex; flex-direction:row;margin-top:30px; justify-content: center;">
                    <button type="submit" class="btn" style="background-color: #9A722C; border:none; color:white; width: 35%;" name="submit">
                        Rechercher
                    </button>
                </div>
            </form>



                        
            </div>
           
            </div>
        </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>