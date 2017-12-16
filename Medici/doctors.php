<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";
?>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <link href="/css/doctors.css" rel="stylesheet">
    <script src="/js/doctors.js"></script>
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
                        <option value="PNEUMOLOGIE">PNEUMOLOGIE</option>
                        <option value="OBSTETRICA-GINECOLOGIE">OBSTETRICA-GINECOLOGIE</option>
                        <option value="ORTOPEDIE-SI-TRAUMATOLOGIE">ORTOPEDIE SI TRAUMATOLOGIE</option>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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