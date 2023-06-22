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
            
        <section class="d-flex justify-content-around" style="margin-top: 6%">
            <div class="row">
                <?php 
                include "connect.php";
                $msg="";
                    $apprenants = $conn->query("SELECT * FROM apprenant");
                    $apprenant = $apprenants->fetchAll();

                    foreach($apprenant as $row){
                        echo '
                                <div class="col">
                            <div class="card" style="width: 15rem; text-align: center; border-style: none; background-color: #F9F6F2; padding: 5%; margin: 4%">
                                <div class="card-body">
                                <a href="detail_apprenant.php?id='.$row['id_apprenant'].'"><img src="img/'.$row['photo'].'" style="width: 45%;" alt="..."></a>
                                    <h5 class="card-title" style="padding-top: 5%; color: black;">'.$row['prenom'].' '.$row['nom'].'</h5>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                ?>
            </div>
        </section>
<!-- Button trigger modal -->
        <button type="button" class="btn" style="float: right; margin: 3%; background-color: #9A722C; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter un apprenant
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un apprenant</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post"  enctype="multipart/form-data">
                            <div class="row mb-4">
                                <label for="nom" class="col-sm-3 col-form-label">Nom:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="nom" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="prenom" class="col-sm-3 col-form-label">Prénom:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="prenom" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="age" class="col-sm-3 col-form-label">Âge:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="age" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="num_tuteur" class="col-sm-3 col-form-label">Numéro de tuteur:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="num_tuteur" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="cin" class="col-sm-3 col-form-label">CIN du tuteur:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="cin" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="lien" class="col-sm-3 col-form-label">Lien du tuteur:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="lien" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="adresse" class="col-sm-3 col-form-label">Adresse:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="adresse" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="type" class="col-sm-3 col-form-label">Type:</label>
                                <div class="col-sm-8">
                                    <select class="form-select" style="background-color: #F9F4E7" name="type" aria-label="Default select example">
                                        <option selected></option>
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
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="etat_inscription" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="exclus" class="col-sm-3 col-form-label">Exclus:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="exclus" class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="penalites_admin" class="col-sm-3 col-form-label">pénalités administratives:</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: #F9F4E7" class="form-control w-100" name="penalites_admin" class="form-control" >
                                </div>
                            </div>
                           
                            
                            <div class="row mb-4"
                                style="display:flex; flex-direction:row;margin-top:30px; justify-content: center;">
                                

                                <button type="submit" class="btn"
                                    style="background-color: #9A722C; border:none; color:white; width: 35%;" class="text-center
                                                            text-muted mt-5 mb-0" style="margin: 1%px; "
                                    name="envoyer">Ajouter</button>

                                

                            </div>
                           <?php echo $msg ?>

                        </form>
            </div>
           
            </div>
        </div>
        </div>

        <?php 
            if(isset($_POST['envoyer'])){
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
                if(empty($nom) || empty($prenom) || empty($age) || empty($num_tuteur) || empty($cin) || empty($lien) || empty($adresse) || empty($type) || empty($etat_inscription) || empty($exclus) ||empty($penalites_admin)){
                    $msg= "Veuillez remplir tous les champs";
                }else{
                    $sql = "INSERT INTO `apprenant`(`nom`, `prenom`, `age`, `numero_tuteur`, `CIN_tuteur`, `lien_tuteur`, `adresse`, `type`, `penalites_admin`, `photo`, `exclus`, `etat_inscription`) VALUES ('$nom','$prenom','$age','$num_tuteur','$cin','$lien','$adresse','$type','$penalites_admin','$image','$exclus','$etat_inscription')";
                    $conn->exec($sql);
                }
            }
        ?>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>