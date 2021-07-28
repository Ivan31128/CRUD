<?php
    include("db.php") ?>
<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <?php session_unset();} ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"
                        placeholder="Nombre de alumno" autofocus>

                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder= "Materia a Inscribir"></textarea>
                    </div>
                    <input type="submit" class="btn btn-succes btn-block" name="save_task" value="Registrar Materia">
                </form>
            </div>

        </div>

        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alumno registrado</th>
                            <th>Materia inscrita</th>
                            <th>Fecha de inscripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_tasks)){ ?>
                        <tr>
                            <td><?php echo $row['title'] ?> </td>
                            <td><?php echo $row['description'] ?> </td>
                            <td><?php echo $row['created_at'] ?> </td>
                            <td> 
                                <a href="edit.php?id=<?php echo $row['id']?>">
                                    Editar
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>">
                                    Eliminar
                                </a>

                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
        </div>
    </div>

</div>

<?php include("includes/footer.php")?>