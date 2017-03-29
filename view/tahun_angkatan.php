<?php
require_once './config/db.php';
if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("select * from student_angkatan WHERE  angkatan_id = $id");
    $sql->execute();
    $a = $sql->fetch();

    $status = array('y'=>'OPEN','n'=>'CLOSED');

    if (isset($_POST['save'])){
        $ket = $_POST['ket'];
        $status = $_POST['status'];
        $sql = $pdo->prepare("update student_angkatan set keterangan=:ket,aktif=:aktif WHERE angkatan_id=:id");
        $sql->bindParam(':ket',$ket);
        $sql->bindParam(':aktif',$status);
        $sql->bindParam(':id',$id);
        $sql->execute();
        echo "<script>window.location='?page=tahun_angkatan'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Tahun Angakatan
                </header>
                <div class="cleaerfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="col-sm-6">
                                <table>
                                    <tr>
                                        <td style="padding: 15px" class="col-sm-3">Tahun Angkatan</td>
                                        <td style="padding: 15px;" class="col-sm-3">
                                            <input type="text" class="form-control" name="ket" value="<?php echo $a['keterangan'] ?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 15px;" class="col-sm-3">Status</td>
                                        <td style="padding: 15px;" class="col-sm-3">
                                            <select name="status" class="form-control">
                                                <?php foreach($status as $f=>$g){ ?>
                                                <option value="<?php echo $f ?>" <?php echo($f==$a['aktif'])?'selected':''?> class="form-control"><?php echo $g ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 15px" class="col-sm-3">
                                            <input type="submit" class="btn btn-sm btn-primary" name="save" value="Simpan">
                                            <a href="?page=tahun_angkatan" class="btn btn-sm btn-warning">Batal</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }elseif(isset($_GET['tambah_data'])) {
    $status = array('y'=>'OPEN','n'=>'CLOSED');

    if(isset($_POST['save'])){
        $ket = $_POST['ket'];
        $status = $_POST['status'];
        $sql = $pdo->prepare("insert into student_angkatan (keterangan, aktif) VALUES (:ket,:aktif)");
        $sql->bindParam(':ket',$ket);
        $sql->bindParam(':aktif',$status);
        $sql->execute();
        echo "<script>window.location='?page=tahun_angkatan'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Tambah Data Tahun Angakatan
                </header>
                <div class="cleaerfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="col-sm-6">
                                <table>
                                    <tr>
                                        <td style="padding: 15px" class="col-sm-3">Tahun Angkatan</td>
                                        <td style="padding: 15px;" class="col-sm-3">
                                            <input type="text" class="form-control" name="ket" value="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 15px;" class="col-sm-3">Status</td>
                                        <td style="padding: 15px;" class="col-sm-3">
                                            <select name="status" class="form-control">
                                                <?php foreach($status as $f=>$g){ ?>
                                                    <option value="<?php echo $f ?>" class="form-control"><?php echo $g ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 15px" class="col-sm-3">
                                            <input type="submit" class="btn btn-sm btn-primary" name="save" value="Simpan">
                                            <a href="?page=tahun_angkatan" class="btn btn-sm btn-warning">Batal</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }elseif(isset($_GET['delete'])) {
    $id = base64_decode($_GET['delete']);
    $menunggu = $pdo->prepare("delete from student_angkatan WHERE angkatan_id = $id ");
    $menunggu->execute();
    echo "<script>window.location='?page=tahun_angkatan'</script>";
}else{
?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Tahun Angkatan
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=tahun_angkatan&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tahun Angkatan</th>
                            <th>Status</th>
                            <th style="text-align: center">Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = $pdo->prepare("select * from student_angkatan");
                        $sql->execute();
                        $no=1;
                        while($a=$sql->fetch()){
                        ?>
                        <tr class="">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $a['keterangan'] ?></td>
                            <td><?php echo($a['aktif']=='y')?'OPEN':'CLOSED'?></td>
                            <td style="text-align: center;"><a title="Edit Data" href="?page=tahun_angkatan&edit=<?php echo base64_encode($a['angkatan_id']) ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button></a>
                                <a title="Hapus Data" onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=tahun_angkatan&delete=<?php echo base64_encode($a['angkatan_id']) ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
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