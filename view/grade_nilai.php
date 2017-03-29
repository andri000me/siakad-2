<?php
require_once './config/db.php';

if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("select * from app_nilai_grade where nilai_id = $id");
    $sql->execute();
    $a = $sql->fetch();

    if (isset($_POST['save'])){
        $grade = $_POST['grade'];
        $dari = $_POST['dari'];
        $sampai = $_POST['sampai'];
        $ket = $_POST['ket'];
        $b = $pdo->prepare("update app_nilai_grade set grade=:grd,dari=:dri,sampai=:smpai,keterangan=:ket WHERE nilai_id=:id");
        $b->bindParam(':grd',$grade);
        $b->bindParam(':dri',$dari);
        $b->bindParam(':smpai',$sampai);
        $b->bindParam(':ket',$ket);
        $b->bindParam(':id',$id);
        $b->execute();
        echo "<script>window.location='?page=grade_nilai'</script>";
    }
    ?>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Grade Nilai
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td style="padding: 15px" class="col-sm-2">Grade Nilai</td>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="text" class="form-control" name="grade" value="<?php echo $a['grade'] ?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 15px" class="col-sm-2">Dari</td>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="text" class="form-control" name="dari" value="<?php echo $a['dari'] ?>" required>
                                            </td>
                                            <td style="padding: 15px" class="col-sm-2">Sampai</td>
                                            <td style="padding: 15px" class="col-sm-2">
                                                <input type="text" class="form-control" name="sampai" value="<?php echo $a['sampai'] ?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 15px;" class="col-sm-2">Keterangan</td>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="text" class="form-control" name="ket" value="<?php echo $a['keterangan'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                                                <a href="?page=grade_nilai" class="btn btn-sm btn-warning">Batal</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }elseif(isset($_GET['tambah_data'])){
    if (isset($_POST['save'])){
        $grade = $_POST['grade'];
        $dari = $_POST['dari'];
        $sampai = $_POST['sampai'];
        $ket = $_POST['ket'];
        $makan_bang = $pdo->prepare("insert into app_nilai_grade (dari, sampai, grade, keterangan) VALUES (:dari,:sampai,:grade,:keterangan)");
        $makan_bang->bindParam(':dari',$dari);
        $makan_bang->bindParam(':sampai',$sampai);
        $makan_bang->bindParam(':grade',$grade);
        $makan_bang->bindParam(':keterangan',$ket);
        $makan_bang->execute();
        echo "<script>window.location='?page=grade_nilai'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Grade Nilai
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td style="padding: 15px" class="col-sm-2">Grade Nilai</td>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="text" class="form-control" name="grade" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 15px" class="col-sm-2">Dari</td>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="text" class="form-control" name="dari" value="" required>
                                            </td>
                                            <td style="padding: 15px" class="col-sm-2">Sampai</td>
                                            <td style="padding: 15px" class="col-sm-2">
                                                <input type="text" class="form-control" name="sampai" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 15px;" class="col-sm-2">Keterangan</td>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="text" class="form-control" name="ket" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 15px;" class="col-sm-2">
                                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                                                <a href="?page=grade_nilai" class="btn btn-sm btn-warning">Batal</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }elseif(isset($_GET['delete'])){
    $id = base64_decode($_GET['delete']);
    $noob = $pdo->prepare("delete from app_nilai_grade WHERE nilai_id = $id");
    $noob->execute();
    echo "<script>window.location='?page=grade_nilai'</script>";
}else{ ?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Grade Nilai
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=grade_nilai&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Grade</th>
                            <th>Dari</th>
                            <th>Sampai</th>
                            <th>Keterangan</th>
                            <th style="text-align: center">Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $jones = $pdo->prepare("select * from app_nilai_grade ORDER BY grade");
                        $jones->execute();
                        $no = 1;
                        while($a = $jones->fetch()){
                        ?>
                            <tr class="">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $a['grade'] ?></td>
                                <td><?php echo $a['dari'] ?></td>
                                <td><?php echo $a['sampai'] ?></td>
                                <td><?php echo $a['keterangan'] ?></td>
                                <td style="text-align: center;"><a title="Edit Data" href="?page=grade_nilai&edit=<?php echo base64_encode($a['nilai_id']) ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button></a>
                                    <a title="Hapus Data" onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=grade_nilai&delete=<?php echo base64_encode($a['nilai_id']) ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php } ?>