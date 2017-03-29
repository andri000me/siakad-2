<style>
    .kesatu{
        color: red;
    }
    .kedua {
        color: blue;
    }
</style>
<script>
    function klik() {
        $('.kesatu').toggleClass('kedua')
    }
</script>
<?php
require_once './config/db.php';
if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("select * from app_gedung where gedung_id = $id");
    $sql->execute();
    $row = $sql->fetch();

    if (isset($_POST['id'])){
        $gedung = $_POST['gedung'];
        $sql = $pdo->prepare("update app_gedung set nama_gedung=:nama where gedung_id=:id");
        $sql->bindParam(':nama',$gedung);
        $sql->bindParam(':id',$id);
        $sql->execute();
        echo "<script>window.location='?page=gedung'</script>";
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Gedung
                </header>
                <div class="clearfix">
                <div class="panel-body">
                        <form action="" method="post" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td style="padding: 12px" class="col-lg-6">Nama Gedung</td>
                                            <td style="padding: 12px" class="col-lg-6">
                                                <input type="hidden" name="id" value="<?php echo base64_decode($_GET['edit_gedung'])?>">
                                                <input type="text" class="form-control" id="Gedung" value="<?php echo $row['nama_gedung']; ?>" name="gedung" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-lg-6">
                                                <button name="simpan" type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                <a href="?page=gedung" class="btn btn-sm btn-warning">Batal</a>
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
<?php }elseif(isset($_GET['delete'])) {
    $id = base64_decode($_GET['delete']);
    $sql = $pdo->prepare("delete from app_gedung where gedung_id =:id");
    $sql->bindParam(':id',$id);
    $sql->execute();
    echo "<script>window.location='?page=gedung'</script>";
}elseif(isset($_GET['tambah_data'])) {
    if (isset($_POST['gedung'])) {
        $gedung = $_POST['gedung'];
        $update = $pdo->prepare("INSERT INTO app_gedung (nama_gedung)VALUES(:nama_gedung)");
        $update->bindParam(':nama_gedung', $gedung);
        $update->execute();
        echo "<script>window.location='?page=gedung'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-primary">
                    <header class="panel-heading">
                        Edit Data Gedung
                    </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post" role="form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td style="padding: 12px" class="col-lg-6">Nama Gedung</td>
                                            <td style="padding: 12px" class="col-lg-6">
                                                <input type="hidden" name="id" value="">
                                                <input type="text" class="form-control" id="Gedung" value="" name="gedung" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-lg-6">
                                                <button name="simpan" type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                <a href="?page=gedung" class="btn btn-sm btn-warning">Batal</a>
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
<?php } else {
?>

<div class="row">
    <div class="col-sm-12">

        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Gedung
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=gedung&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                            <button onclick="klik()">tes</button>
                            <p class="kesatu">Ini cuma tes</p>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th>Nama Gedung</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                <?php
                $sql = $pdo->prepare("select * from app_gedung ORDER BY nama_gedung ASC ");
                $sql->execute();
                $no = 1;
                while ($row = $sql->fetch()) {
                    ?>
                    <tr class="">
                        <td style="text-align: center;;"><?php echo $no++ ?></td>
                        <td class=""><?php  echo $row['nama_gedung'] ?></td>
                        <td style="text-align: center;"><a href="?page=gedung&edit=<?php echo base64_encode($row['gedung_id'])?>"><button class="btn btn-sm btn-block btn-primary"><i class="fa fa-pencil"></i></button></a></td>
                        <td style="text-align: center;"><a href="?page=gedung&delete=<?php echo base64_encode($row['gedung_id'])?>" onclick="return confirm('Yakin ingin hapus data ini?')"><button class="btn btn-sm btn-block btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
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