<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";

    $id_session=0;
    $sql = "SELECT id_user FROM users WHERE user_name='".$login_session."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id_session=$row["id_user"];
        }
    }
    if($id_session==0){
        $id_session="";
    }
?>
<html lang="en">

<head>
    <title>Medici</title>
    <meta charset="utf-8">
    <link href="/css/doctors.css" rel="stylesheet">
    <script src="/js/doctors.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container doctors" id="doctorsList">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-1"><h3>Cauta</h3></div>
                <div class="col-sm-6">
                    <select id="profile-country" class="form-control" name="country" onchange="filterFunction(this.value)">
                        <option value="ALL">Specialitate</option>
                        <option value="CHIRURGIE-GENERALA">CHIRURGIE GENERALA</option>
                        <option value="CARDIOLOGIE">CARDIOLOGIE</option>
                        <option value="PNEUMOLOGIE">PNEUMOLOGIE</option>
                        <option value="OBSTETRICA-GINECOLOGIE">OBSTETRICA-GINECOLOGIE</option>
                        <option value="ORTOPEDIE-SI-TRAUMATOLOGIE">ORTOPEDIE SI TRAUMATOLOGIE</option>
                        <option value="CHIRURGIE TORACICA">CHIRURGIE TORACICA</option>
                        <option value="PEDIATRIE">PEDIATRIE</option>
                        <option value="NEONATOLOGIE">NEONATOLOGIE</option>
                        <option value="DERMATOLOGIE">DERMATOLOGIE</option>
                        <option value="GASTROENTEROLOGIE">GASTROENTEROLOGIE</option>
                        <option value="UROLOGIE">UROLOGIE</option>
                    </select>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="profile-region" placeholder="Nume medic..." value="" onkeyup="filterFunction(this.value.toUpperCase())">
                </div>
            </div>
        </div>
        <br>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center" id="modalHeader"></h4>
                    </div>
                    <div class="modal-body" id="modalBody">
                    </div>
                    <div class="modal-footer">
                        <h4 class="text-center" id="modalFooter">
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="/Medici/BackEnd/appointments.php" method="post" style="display: none" id="reservation">
        <input type="text" name="user_name" id="id_user" value="<?php echo $id_session?>" required>
        <input type="text" name="id_doctor" id="id_doctor" value="">
        <input type="text" name="dateAppoiment" id="dateAppoiment" value="">
        <input type="text" name="timeInterval" id="timeInterval" value="">
    </form>
</body>

</html>
<script>
<?php
    $sql="SELECT * FROM doctors";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            create("doctorsList", "<?php echo $row["id_doctor"]?>", "<?php echo $row["grade"]?>", "<?php echo $row["first_name"]?>", "<?php echo $row["last_name"]?>", "<?php echo $row["description"]?>", "<?php echo $row["job_title"]?>");
            <?php
        }
    } else {
        echo "0 results";
    }
?>
</script>