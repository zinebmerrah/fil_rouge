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
$msg= "";
$id = $_GET['id'];
$apprenants_detail = $conn->query("SELECT * FROM apprenant WHERE id_apprenant = '$id'");
$apprenant_detail = $apprenants_detail->fetch();

// Supprimer l'apprenant
if(isset($_POST['supprimer'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM apprenant WHERE id_apprenant = '$id'";
    $conn->exec($sql);
    header("Location: apprenant.php");
    exit();
}
?>

<section style="text-align: center; background-color: #FEFDFB; padding: 5%; margin: 2%;">
    <img src="img/<?php echo $apprenant_detail['photo'] ?>" style="width: 15%; " alt="...">
    <h4 style="margin: 2%"><?php echo $apprenant_detail['prenom'] ?> <?php echo $apprenant_detail['nom'] ?> (<?php echo $apprenant_detail['id_apprenant'] ?>)</h4>
    <div class="d-flex justify-content-evenly">
        <div style="background-color: #F2EFE7; padding: 3%; border-radius: 2%; text-align: start; width: 40%">
            <p>Âge: <?php echo $apprenant_detail['age'] ?></p>
            <p>Numéro du tuteur: <?php echo $apprenant_detail['numero_tuteur'] ?></p>
            <p>CIN du tuteur: <?php echo $apprenant_detail['CIN_tuteur'] ?></p>
            <p>Lien du tuteur: <?php echo $apprenant_detail['lien_tuteur'] ?></p>
            <p>Adresse: <?php echo $apprenant_detail['adresse'] ?></p>
        </div>
        <div style="background-color: #F2EFE7; padding: 3%; border-radius: 2%; text-align: start; width: 40%">
            <p>Type: <?php echo $apprenant_detail['type'] ?></p>
            <p>Exclus: <?php echo $apprenant_detail['exclus'] ?></p>
            <p>Pénaltés administratives: <?php echo $apprenant_detail['penalites_admin'] ?></p>
            <p>Date d'inscription: <?php echo $apprenant_detail['date_inscription'] ?></p>
            <p>Etat d'inscription: <?php echo $apprenant_detail['etat_inscription'] ?></p>
        </div>
    </div>
</section>
<?php  echo $msg;?>
<div class="d-flex justify-content-end">
    <button type="button" class="btn"  style="float: right; margin: 3%; background-color: #9A2C2C; color: white; " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Supprimer
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmation de suppression</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cet apprenant ?
                </div>
                <div class="modal-footer">
                    <form method="post" action="detail_apprenant.php?id=<?php echo $id ?>">
                        <input type="hidden" value="<?php echo $apprenant_detail['id_apprenant'] ?>" name="id">
                        <button type="submit" class="btn" name="supprimer" style="background-color: #9A2C2C; color: white;">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


        
        <!-- Button trigger modal -->
            <button type="button" class="btn" style="float: right; margin: 3%; background-color: #9A722C; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    modifier les informations
            </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier les informations</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="detail_apprenant.php?id=<?php echo $id ?>" enctype="multipart/form-data">
    <div class="row mb-4">
        <label for="nom" class="col-sm-3 col-form-label">Nom:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['nom'] ?>" class="form-control w-100" name="nom">
        </div>
    </div>

    <div class="row mb-4">
        <label for="prenom" class="col-sm-3 col-form-label">Prénom:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['prenom'] ?>" class="form-control w-100" name="prenom">
        </div>
    </div>

    <div class="row mb-4">
        <label for="age" class="col-sm-3 col-form-label">Âge:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['age'] ?>" class="form-control w-100" name="age">
        </div>
    </div>

    <div class="row mb-4">
        <label for="num_tuteur" class="col-sm-3 col-form-label">Numéro de tuteur:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['numero_tuteur'] ?>" class="form-control w-100" name="num_tuteur">
        </div>
    </div>

    <div class="row mb-4">
        <label for="cin" class="col-sm-3 col-form-label">CIN du tuteur:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['CIN_tuteur'] ?>" class="form-control w-100" name="cin">
        </div>
    </div>

    <div class="row mb-4">
        <label for="lien" class="col-sm-3 col-form-label">Lien du tuteur:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['lien_tuteur'] ?>" class="form-control w-100" name="lien">
        </div>
    </div>

    <div class="row mb-4">
        <label for="adresse" class="col-sm-3 col-form-label">Adresse:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['adresse'] ?>" class="form-control w-100" name="adresse">
        </div>
    </div>

    <div class="row mb-4">
        <label for="type" class="col-sm-3 col-form-label">Type:</label>
        <div class="col-sm-8">
            <select class="form-select" style="background-color: #F9F4E7" name="type" aria-label="Default select example">
                <option selected><?php echo $apprenant_detail['type'] ?></option>
                <option value="interne">Interne</option>
                <option value="externe">Externe</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="image" class="col-sm-3 col-form-label">Photo:</label>
        <div class="col-sm-8">
            <input type="file" name="image" style="background-color: #F9F4E7" class="form-control" id="">
        </div>
    </div>

    <div class="row mb-4">
        <label for="etat_inscription" class="col-sm-3 col-form-label">Etat d'inscription:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['etat_inscription'] ?>" class="form-control w-100" name="etat_inscription">
        </div>
    </div>

    <div class="row mb-4">
        <label for="exclus" class="col-sm-3 col-form-label">Exclus:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['exclus'] ?>" class="form-control w-100" name="exclus">
        </div>
    </div>

    <div class="row mb-4">
        <label for="penalites_admin" class="col-sm-3 col-form-label">Pénalités administratives:</label>
        <div class="col-sm-8">
            <input type="text" style="background-color: #F9F4E7" value="<?php echo $apprenant_detail['penalites_admin'] ?>" class="form-control w-100" name="penalites_admin">
        </div>
    </div>

    <div class="row mb-4" style="display:flex; flex-direction:row;margin-top:30px; justify-content: center;">
        <input type="hidden" value="<?php echo $apprenant_detail['id_apprenant'] ?>" name="id">
        <button type="submit" class="btn" style="background-color: #9A722C; border:none; color:white; width: 35%;  " class="text-center text-muted mt-5 mb-0" style="margin: 1%px; " name="envoyer">Enregistrer les modifications</button>
    </div>
</form>

<?php 
    if(isset($_POST['envoyer'])){
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $num_tuteur = $_POST['num_tuteur'];
        $cin = $_POST['cin'];
        $lien = $_POST['lien'];
        $adresse = $_POST['adresse'];
        $type = $_POST['type'];
        $etat_inscription = $_POST['etat_inscription'];
        $exclus = $_POST['exclus'];
        $penalites_admin = $_POST['penalites_admin'];

        $image = $_FILES['image']['name'];
        $target_dir = "img/";
        
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . "$image");
        if(empty($image)){
            $image = $apprenant_detail['photo'];
        }

        if(empty($nom) || empty($prenom) || empty($age) || empty($num_tuteur) || empty($cin) || empty($lien) || empty($adresse) || empty($type) || empty($etat_inscription) || empty($exclus) ||empty($penalites_admin)){
            $msg= "Veuillez remplir tous les champs";
        }else{
            $sql = "UPDATE `apprenant` SET `nom`='$nom',`prenom`='$prenom',`age`='$age',`numero_tuteur`='$num_tuteur',`CIN_tuteur`='$cin',`lien_tuteur`='$lien',`adresse`='$adresse',`type`='$type',`penalites_admin`='$penalites_admin',`photo`='$image',`exclus`='$exclus',`etat_inscription`='$etat_inscription' WHERE id_apprenant ='$id' ";
            $conn->exec($sql);
            header("Location: apprenant_detail.php?id=".$id."");
        }
    }
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>