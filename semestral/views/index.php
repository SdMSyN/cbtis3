<?php
include ('header.php');
include('../config/conexion.php');
include('../config/variables.php');
?>

<title><?= $tit; ?></title>
<meta name="author" content="Luigi Pérez Calzada (GianBros)" />
<meta name="description" content="Descripción de la página" />
<meta name="keywords" content="etiqueta1, etiqueta2, etiqueta3" />
</head>
<body>
<?php
include ('navbar_admin.php');

$optTurno = '<option></option>';
$sqlGetTurno = "SELECT DISTINCT turno FROM $tAlums ";
$resGetTurno = $con->query($sqlGetTurno);
while($rowGetTurno = $resGetTurno->fetch_assoc()){
    $optTurno .= '<option value="'.$rowGetTurno['turno'].'">'.$rowGetTurno['turno'].'</option>';
}

$optSem = '<option></option>';
$sqlGetSem = "SELECT DISTINCT semestre FROM $tAlums ";
$resGetSem = $con->query($sqlGetSem);
while($rowGetSem = $resGetSem->fetch_assoc()){
    $optSem .= '<option value="'.$rowGetSem['semestre'].'">'.$rowGetSem['semestre'].'</option>';
}

$optEsp = '<option></option>';
$sqlGetEsp = "SELECT DISTINCT carrera FROM $tAlums ";
$resGetEsp = $con->query($sqlGetEsp);
while($rowGetEsp = $resGetEsp->fetch_assoc()){
    $optEsp .= '<option value="'.$rowGetEsp['carrera'].'">'.$rowGetEsp['carrera'].'</option>';
}

$optSex = '<option></option>';
$sqlGetSex = "SELECT DISTINCT sexo FROM $tAlums ";
$resGetSex = $con->query($sqlGetSex);
while($rowGetSex = $resGetSex->fetch_assoc()){
    $optSex .= '<option value="'.$rowGetSex['sexo'].'">'.$rowGetSex['sexo'].'</option>';
}

?>

    <div class="container">
        <h1 class="page-header">Números</h1>

        <div class="row">
            <form id="frm_filtro" method="post" action="" class="form-horizontal">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="turno">Turno</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="turno" name="turno"><?=$optTurno;?></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="sem">Semestre</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="sem" name="sem"><?=$optSem;?></select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="esp">Especialidad</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="esp" name="esp"><?=$optEsp;?></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="sex">Sexo</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="sex" name="sex"><?=$optSex;?></select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-offset-5 col-sm-7">
                    <button type="button" id="btnfiltrar" class="btn btn-success">Filtrar <span class="glyphicon glyphicon-filter"></span></button>
                    <a href="javascript:;" id="btncancel" class="btn btn-default">Todos</a>
                </div>
            </form>

        </div>

        <h2 class="sub-header">Lista de Aspirantes</h2>
        <p class="msg"></p>
        <div class="table-responsive">
            <table class="table table-striped" id="data">
                <thead>
                    <tr>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>


    <script type="text/javascript">
        var ordenar = '';
        $(document).ready(function () {
            //Ordenamiento
            filtrar();
            function filtrar() {
                $.ajax({
                    type: "POST",
                    data: $("#frm_filtro").serialize() + ordenar,
                    url: "../controllers/read_num_alums.php",
                    success: function (msg) {
                        console.log(msg);
                        $("#data tbody").html(msg);
                        var msg = jQuery.parseJSON(msg);
                        if(msg.error == 0){
                            $("#data tbody").html("");
                            var newRow = '<tr><td>'+msg.dataRes+'</td></tr>';
                            $(newRow).appendTo("#data tbody");
                        }else{
                            var newRow = '<tr><td>'+msg.msgErr+'</td></tr>';
                            $("#data tbody").html(newRow);
                        }
                    }
                });
            }

            //Ordenar ASC y DESC header tabla
            $("#data th span").click(function () {
                if ($(this).hasClass("desc")) {
                    $("#data th span").removeClass("desc").removeClass("asc");
                    $(this).addClass("asc");
                    ordenar = "&orderby=" + $(this).attr("title") + " asc";
                } else {
                    $("#data th span").removeClass("desc").removeClass("asc");
                    $(this).addClass("desc");
                    ordenar = "&orderby=" + $(this).attr("title") + " desc";
                }
                filtrar();
            });

            //Ordenar por formulario
            $("#btnfiltrar").click(function () {
                filtrar();
                //alert("y ahora?");
            });

            // boton cancelar
            $("#btncancel").click(function () {
                $("#frm_filtro #turno").val('');
                $("#frm_filtro #sem").val('');
                $("#frm_filtro #esp").val('');
                $("#frm_filtro #sex").val('');
                filtrar()
            });


        });
    </script>
    <?php
include ('footer.php');
?>