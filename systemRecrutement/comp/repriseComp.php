<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo '<script>alert("Session expirée");</script>';
} else {
    include("db_config.php");
    if (isset($_GET['libelleCompetence'])) {
        $competence = $_GET['libelleCompetence'];
            $res = $cnx->exec("UPDATE niveau SET active=true WHERE libelleCompetence='$competence'");
            $res = $cnx->exec("UPDATE competence SET active=true WHERE libelleCompetence='$competence'");
            if ($res != 0) {
                echo "Suppression réussie";
                header("location:afficherCompetence.php");
            } else {
                echo "Suppression échouée";
            }
        
    }
}
?>
