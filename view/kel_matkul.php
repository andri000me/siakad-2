<?php
require_once './config/db.php';

if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $a = $pdo->prepare("select * from makul_kelompok WHERE kelompok_id = $id");
    $a->execute();
    $b=$a->fetch();

    if (isset($_POST['save'])){
        $kode = $_POST['kd_kel'];
        $nama = $_POST['nm_kel'];
        $sql = $pdo->prepare("update makul_kelompok set kode_kelompok=:kode,nama=:nama WHERE kelompok_id=:id");
        $sql->bindParam(':kode',$kode);
        $sql->bindParam(':nama',$nama);
        $sql->bindParam(':id',$id);
        $sql->execute();
        echo "<script>window.location='?page=kel_matkul'</script>";
    }
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Kelompok Mata Kuliah
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td style="padding: 12px;" class="col-sm-2">Kode</td>
                                            <td style="padding: 12px;" class="col-sm-6">
                                                <input name="kd_kel" required class="form-control" type="text" value="<?php echo $b['kode_kelompok'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-2">Nama Kelompok Mata Kuliah</td>
                                            <td style="padding: 12px;" class="col-sm-6">
                                                <input class="form-control" required type="text" name="nm_kel" value="<?php echo $b['nama'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px;" class="col-lg-3">
                                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                                                <a href="?page=kel_matkul" class="btn btn-sm btn-warning">Batal</a>
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

<?php }elseif(isset($_GET['tambah_data'])) {
    if (isset($_POST['save'])) {
        $kode = $_POST['kd_kel'];
        $nama = $_POST['nm_kel'];
        $sql = $pdo->prepare("INSERT INTO makul_kelompok (kode_kelompok, nama)VALUES (:kode,:nama)");
        $sql->bindParam(':kode', $kode);
        $sql->bindParam(':nama', $nama);
        $sql->execute();
        echo "<script>window.location='?page=kel_matkul'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Tambah Data Kelompok Mata Kuliah
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <table>
                                        <tr>
                                            <td style="padding: 12px;" class="col-sm-2">Kode</td>
                                            <td style="padding: 12px;" class="col-sm-6">
                                                <input name="kd_kel" required class="form-control" type="text" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-2">Nama Kelompok Mata Kuliah</td>
                                            <td style="padding: 12px;" class="col-sm-6">
                                                <input class="form-control" required type="text" name="nm_kel" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px;" class="col-lg-3">
                                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                                                <a href="?page=kel_matkul" class="btn btn-sm btn-warning">Batal</a>
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
<?php }elseif(isset($_GET['delete'])) {
$id = base64_decode($_GET['delete']);
$sql = $pdo->prepare("delete from makul_kelompok where kelompok_id = $id");
$sql->execute();
echo "<script>window.location='?page=kel_matkul'</script>";

}else{?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Prodi
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=kel_matkul&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Kelompok Mata Kuliah</th>
                            <th style="text-align: center">Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $tau_ah = $pdo->prepare("select * from makul_kelompok ORDER BY kode_kelompok");
                        $tau_ah->execute();
                        $no = 1;
                        while($wkwk = $tau_ah->fetch()){ ?>
                            <tr class="">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo strtoupper($wkwk['kode_kelompok']) ?></td>
                                <td><?php echo strtoupper($wkwk['nama']) ?></td>
                                <td style="text-align: center;"><a title="Edit Data" href="?page=kel_matkul&edit=<?php  echo base64_encode($wkwk['kelompok_id']) ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button></a>
                               <a title="Hapus Data" onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=kel_matkul&delete=<?php echo base64_encode($wkwk['kelompok_id']) ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php } ?>