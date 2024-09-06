<?php 
include("assets/includes/mysql.php");
// echo $_POST['ent_nom']."<br>";
// echo $_POST['ent_appat']."<br>";
// echo $_POST['ent_apmat']."<br>";
// echo $_POST['ent_tel']."<br>";
// echo $_POST['ent_mail']."<br>";
// echo $_POST['ent_col']."<br>";
// echo $_POST['ent_cp']."<br>";
// echo $_POST['ent_calle']."<br>";
// echo $_POST['ent_no_ext']."<br>";
// echo $_POST['ent_no_int']."<br>";
// echo $_POST['ent_edo']."<br>";
// echo $_POST['ent_mun'];

// echo $_POST['entadd'];

if($_POST['entadd'] == "100"){

    $sqlEnt = "INSERT INTO entrenadores (ent_nom,ent_appat,ent_apmat,ent_tel,ent_mail,ent_col,
    ent_cp,ent_calle,ent_no_ext,ent_no_int,ent_edo,ent_mun) 
    VALUE ('".$_POST['ent_nom']."','".$_POST['ent_appat']."','".$_POST['ent_apmat']."','".$_POST['ent_tel']."',
    '".$_POST['ent_mail']."','".$_POST['ent_col']."','".$_POST['ent_cp']."','".$_POST['ent_calle']."',
    '".$_POST['ent_no_ext']."','".$_POST['ent_no_int']."','".$_POST['ent_edo']."','".$_POST['ent_mun']."') ";
    $resultent = mysqli_query($conexion, $sqlEnt);
    //echo $sqlEnt;
}
?>
<script lenguage="javascript">
    location.href="trainers.php";
</script>