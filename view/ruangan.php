<?php
require_once './config/db.php';
if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("SELECT ar.keterangan,ar.nama_ruangan,ar.kapasitas,ag.nama_gedung,ar.ruangan_id,ar.gedung_id
                                              from app_ruangan as ar inner join app_gedung as ag
                                              WHERE ar.ruangan_id = $id ORDER BY nama_gedung asc");
    $sql->execute();
    $row = $sql->fetch();
    //buat query baru untuk nilai combobox
    $gedung = $pdo->prepare("select * from app_gedung ORDER BY nama_gedung");
    $gedung->execute();

    if (isset($_POST['simpan'])){
        $ruangan = $_POST['ruangan'];
        $gedung = $_POST['gedung'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];
            $sql = $pdo->prepare('update app_ruangan set nama_ruangan=:ruangan,gedung_id=:gedung,kapasitas=:kapasitas,keterangan=:keterangan  WHERE ruangan_id=:id');
            $sql->bindParam(':ruangan',$ruangan);
            $sql->bindParam(':gedung',$gedung);
            $sql->bindParam(':kapasitas',$kapasitas);
            $sql->bindParam(':keterangan',$keterangan);
            $sql->bindParam(':id',$id);
            $sql->execute();
        echo "<script>window.location='?page=ruangan'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Ruangan
                </header>
                <div class="clearfix">
                <div class="panel-body">
                    <form method="post" action="" role="form">
                        <div class="col-lg-12">
                        <table>
                            <tr>
                                <td class="col-lg-6" style="padding: 12px">Nama Ruangan</td>
                                <td class="col-lg-6" style="padding: 12px">
                                        <input type="text" name="ruangan" class="form-control" value="<?php echo $row['nama_ruangan'] ?>" required >
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-6" style="padding: 12px">Gedung</td>
                                <td class="col-lg-6" style="padding: 12px">
                                        <select name="gedung" id="" class="form-control">
                                            <!-- looping untuk tsmpil data select -->
                                            <?php while($data = $gedung->fetch()) {
                                                    $list_gedung = $data['nama_gedung'];
                                                    $id = $data['gedung_id'];
                                                    ?>
                                                    <option class="form-control" value="<?php echo $id ?>" <?php echo($id==$row['gedung_id'])?'selected':'' ?> ><?php echo $list_gedung ?></option>
                                                    <?php } ?>
                                        </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-6" style="padding: 12px">Kapasitas</td>
                                <td class="col-lg-6" style="padding: 12px">
                                        <input type="text" name="kapasitas" class="form-control" value="<?php echo $row['kapasitas'] ?>" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-lg-6" style="padding: 12px">Keterangan</td>
                                <td class="col-lg-6" style="padding: 12px">
                                        <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']?>">
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 12px" class="col-lg-6">
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">
                                    <a href="?page=ruangan" class="btn btn-sm btn-warning">Batal</a>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        </div>
                    </form>
                </div>
                </div>
            </section>
        </div>
    </div>
<?php }elseif(isset($_GET['tambah_data'])){
    $gedung = $pdo->prepare("select * from app_gedung ORDER BY nama_gedung");//Munculkan gedung di combobox
    $gedung->execute();

    if(isset($_POST['save'])) {
        $nama_ruangan = $_POST['ruangan'];
        $id_gedung = $_POST['gedung'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];

        $update1 = $pdo->prepare("INSERT INTO app_ruangan (nama_ruangan, gedung_id, kapasitas, keterangan)
                              VALUES (:nama_ruangan,:gedung_id,:kapasitas,:keterangan)");
        $update1->bindParam(':nama_ruangan', $nama_ruangan);
        $update1->bindParam(':gedung_id', $id_gedung);
        $update1->bindParam(':kapasitas', $kapasitas);
        $update1->bindParam(':keterangan', $keterangan);
        $update1->execute();
        echo "<script>window.location='?page=ruangan'</script>";
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Tambah Data Ruangan
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form method="post" action="" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                <table>
                                    <tr>
                                        <td class="col-lg-6" style="padding: 12px">Nama Ruangan</td>
                                        <td class="col-lg-6" style="padding: 12px">
                                                <input type="text" name="ruangan" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  class="col-lg-6" style="padding: 12px">Gedung</td>
                                        <td  class="col-lg-6" style="padding: 12px">
                                                <select name="gedung" id="" class="form-control">
                                                    <!-- looping untuk tsmpil data select -->
                                                    <?php while($data = $gedung->fetch()) {
                                                        $list_gedung = $data['nama_gedung'];
                                                        $id = $data['gedung_id'];
                                                        ?>
                                                        <option class="form-control" value="<?php echo $id ?>"><?php echo $list_gedung ?></option>
                                                    <?php } ?>
                                                </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  class="col-lg-6" style="padding: 12px">Kapasitas</td>
                                        <td  class="col-lg-6" style="padding: 12px">
                                                <input type="text" name="kapasitas" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td  class="col-lg-6" style="padding: 12px">Keterangan</td>
                                        <td  class="col-lg-6" style="padding: 12px">
                                                <input type="text" name="keterangan" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 12px" class="col-lg-6">
                                            <input type="submit" name="save" value="Simpan" class="btn btn-sm btn-primary">
                                            <a href="?page=ruangan" class="btn btn-sm btn-warning">Batal</a>
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
<?php }elseif(isset($_GET['delete'])){
    $id = base64_decode($_GET['delete']);
    $sql = $pdo->prepare("delete from app_ruangan WHERE ruangan_id = $id");
    $sql->execute();
    echo "<script>window.location='?page=ruangan'</script>";

} else { ?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Ruangan
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=ruangan&tambah_data" class="btn btn-sm btn-primary">
                                 Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Kapasitas</th>
                            <th>Nama Gedung</th>
                            <th>Keterangan</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Hapus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $sql = $pdo->prepare('SELECT ar.keterangan,ar.nama_ruangan,ar.kapasitas,ag.nama_gedung,ar.ruangan_id,ag.gedung_id
                                              from app_ruangan as ar inner join app_gedung as ag
                                              WHERE ar.gedung_id = ag.gedung_id ORDER BY nama_ruangan ASC ');
                        $sql->execute();
                        $no=1;
                        while ($row = $sql->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo strtoupper($row['nama_ruangan'])?></td>
                            <td><?php echo $row['kapasitas'].' Orang' ?></td>
                            <td><?php echo strtoupper($row['nama_gedung'])?></td>
                            <td><?php echo $row['keterangan'] ?></td>
                            <td style="text-align: center;"><a href="?page=ruangan&edit=<?php echo base64_encode($row['ruangan_id'])?>"><button class="btn btn-sm btn-block btn-primary"><i class="fa fa-pencil"></i></button></a></td>
                            <td style="text-align: center;"><a onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=ruangan&delete=<?php echo base64_encode($row['ruangan_id'])?>"><button class="btn btn-sm btn-block btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
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