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
         $apprenants_count = $conn->query("SELECT COUNT(*) FROM apprenant");
         $apprenant_count = $apprenants_count->fetchColumn();
          
         $revenus_month = $conn->query("SELECT montant FROM suivie_financière WHERE type= 'revenus' AND MONTH(date) = MONTH(CURRENT_DATE)");
         $revenu_month = $revenus_month->fetchColumn(); 

         $revenus_annee = $conn->query("SELECT SUM(montant) FROM suivie_financière WHERE type= 'revenus' AND YEAR(date) = YEAR(CURRENT_DATE)");
         $revenu_annee = $revenus_annee->fetchColumn();
        ?>
         <section class="d-flex justify-content-evenly">
            <div class="card" style="width: 19rem; background-color: #DFB257; margin-top: 2%">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $apprenant_count; ?></h5><br>
                    <h6 class="card-subtitle mb-2 " style="color: #417359;">Apprenants</h6>
                </div>
            </div>

            <div class="card" style="width: 19rem; background-color: #CABB31; margin-top: 2%">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $revenu_month ?>DH</h5><br>
                    <h6 class="card-subtitle mb-2 " style="color: #417359;">Revenus par mois</h6>
                </div>
            </div>

            <div class="card" style="width: 19rem; background-color: #C87F3C; margin-top: 2%">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $revenu_annee ?>DH</h5><br>
                    <h6 class="card-subtitle mb-2 " style="color: #417359;">Revenus par année</h6>
                </div>
            </div>
        </section>

        <section class="d-flex justify-content-around" style="margin-top: 6%">
    <div class="row">
        <?php 
        
            $apprenants = $conn->query("SELECT * FROM apprenant WHERE etat_inscription = 'non payée' ORDER BY date_inscription DESC LIMIT 8");
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

    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>