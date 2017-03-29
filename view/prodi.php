<?php
require_once './config/db.php';
if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("select * from akademik_prodi where prodi_id = $id");
    $sql->execute();
    $row = $sql->fetch();

    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $ketua = $_POST['ketua'];
        $nomor = $_POST['nmr_izin'];
        $sql = $pdo->prepare("update akademik_prodi set nama_prodi=:nama,ketua=:ketua,no_izin=:nomor WHERE prodi_id =:id");
        $sql->bindParam(':nama',$nama);
        $sql->bindParam(':ketua',$ketua);
        $sql->bindParam(':nomor',$nomor);
        $sql->bindParam(':id',$id);
        $sql->execute();
        echo "<script>window.location='?page=prodi'</script>";
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Prodi
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form method="post" action="" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">Nama Prodi</td>
                                            <td class="col-lg-6" style="padding: 12px">
                                                    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_prodi'] ?>" required>
                                                    <input type="hidden" name="id" value="<?php echo $row['prodi_id'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">Nama Ketua</td>
                                            <td class="col-lg-6" style="padding: 12px">
                                                        <input type="text" name="ketua" class="form-control" value="<?php echo $row['ketua'] ?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">Nomor Izin</td>
                                            <td class="col-lg-6" style="padding: 12px">
                                                    <input type="text" name="nmr_izin" class="form-control" value="<?php echo $row['no_izin'] ?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">
                                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                                                <a href="?page=prodi" class="btn btn-sm btn-warning">Batal</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php }else if(isset($_GET['tambah_data'])){
    if (isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $ketua = $_POST['ketua'];
        $nomor = $_POST['nmr_izin'];
        $sql = $pdo->prepare("insert into akademik_prodi (nama_prodi, ketua, no_izin) VALUES (:nama,:ketua,:nomor)");
        $sql->bindParam(':nama',$nama);
        $sql->bindParam(':ketua',$ketua);
        $sql->bindParam(':nomor',$nomor);
        $sql->execute();
        echo "<script>window.location='?page=prodi'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Tambah Data Prodi
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form method="post" action="" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">Nama Prodi</td>
                                            <td class="col-lg-6" style="padding: 12px">
                                                <input type="text" name="nama" class="form-control" value="" required>
                                                <input type="hidden" name="id" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">Nama Ketua</td>
                                            <td class="col-lg-6" style="padding: 12px">
                                                <input type="text" name="ketua" class="form-control" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">Nomor Izin</td>
                                            <td class="col-lg-6" style="padding: 12px">
                                                <input type="text" name="nmr_izin" class="form-control" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-6" style="padding: 12px">
                                                <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">
                                                <a href="?page=prodi" class="btn btn-sm btn-warning">Batal</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php }else if(isset($_GET['delete'])){
    $id = base64_decode($_GET['delete']);
    $sql = $pdo->prepare("delete from akademik_prodi where prodi_id =:id");
    $sql->bindParam(':id',$id);
    $sql->execute();
    echo "<script>window.location='?page=prodi'</script>";
}else{
?>
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
                            <a href="?page=prodi&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Prodi</th>
                            <th>Nomor Izin</th>
                            <th>Nama Ketua Prodi</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = $pdo->prepare("select * from akademik_prodi ORDER BY nama_prodi");
                        $sql->execute();
                        $no=1;
                        while($row = $sql->fetch()){
                        ?>
                        <tr class="">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo strtoupper($row['nama_prodi'])?></td>
                            <td><?php echo strtoupper($row['no_izin']) ?></td>
                            <td><?php echo strtoupper($row['ketua'])?></td>
                            <td style="text-align: center;"><a href="?page=prodi&edit=<?php echo base64_encode($row['prodi_id'])?>"><button class="btn btn-sm btn-block btn-primary"><i class="fa fa-pencil"></i></button></a></td>
                            <td style="text-align: center;"><a onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=prodi&delete=<?php echo base64_encode($row['prodi_id'])?>"><button class="btn btn-sm btn-block btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
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