<?php
require_once './config/db.php';
if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("select ak.* 
                          from akademik_konsentrasi as ak inner JOIN akademik_prodi as ap
                          WHERE ak.konsentrasi_id = $id");
    $sql->execute();
    $row = $sql->fetch();
    $data = $pdo->prepare("select * from akademik_prodi");
    $data->execute();
//buat sebuah array untuk menampung data yg akan ditampilkan
    $jenjang = array('d1','d2','d3','d4','s1');
    $semester = array('1','2','3','4','5','6','7','8');

    if (isset($_POST['simpan'])){
        $prodi = $_POST['prodi'];
        $konsentrasi = $_POST['konsentrasi'];
        $ketua = $_POST['ketua'];
        $jenjang = $_POST['jenjang'];
        $smt = $_POST['semester'];
        $gelar = $_POST['gelar'];
        $kode = $_POST['kd_nmr'];

        $sql = $pdo->prepare("update akademik_konsentrasi set nama_konsentrasi=:konsentrasi,ketua=:ketua,jenjang=:jenjang,
                               jml_semester=:smt,kode_nomor=:kode,gelar=:gelar,prodi_id=:prodi WHERE konsentrasi_id=:id");
        $sql->bindParam(':konsentrasi',$konsentrasi);
        $sql->bindParam(':ketua',$ketua);
        $sql->bindParam(':jenjang',$jenjang);
        $sql->bindParam(':smt',$smt);
        $sql->bindParam(':kode',$kode);
        $sql->bindParam(':gelar',$gelar);
        $sql->bindParam(':prodi',$prodi);
        $sql->bindParam(':id',$id);
        $sql->execute();
        echo "<script>window.location='?page=konsentrasi'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Konsentrasi
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form method="post" action="" role="form">
                            <div class="row">
                                <div class="col-sm-9">
                            <table>
                                <tr>
                                    <td class="col-sm-3" style="padding: 12px">Nama Prodi</td>
                                    <td class="col-sm-3" style="padding: 12px">
                                            <select name="prodi" id="" class="form-control">
                                                <?php while($data2 = $data->fetch()){
                                                    $list_prodi = $data2['nama_prodi'];
                                                    $id = $data2['prodi_id']
                                                    ?>
                                                <option class="form-control" value="<?php echo $id ?>" <?php echo($id==$row['prodi_id'])?'selected':'' ?> ><?php echo strtoupper($list_prodi) ?></option>
                                                <?php } ?>
                                            </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3" style="padding: 12px">Nama Konsentrasi</td>
                                    <td class="col-sm-3" style="padding: 12px">
                                            <input type="text" name="konsentrasi" class="form-control" value="<?php echo $row['nama_konsentrasi']?>" required>
                                            <input type="hidden" name="id" value="<?php echo $row['konsentrasi_id']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3" style="padding: 12px">Ketua</td>
                                    <td class="col-sm-3" style="padding: 12px">
                                            <input type="text" name="ketua" class="form-control" value="<?php echo $row['ketua'] ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <div class="col-sm-9">
                                        <div class="col-sm-3">
                                            <td class="col-sm-3" style="padding: 12px">Jenjang</td>
                                                <td class="col-sm-3" style="padding: 12px">
                                                    <select name="jenjang" class="form-control" id="">
                                                        <?php foreach($jenjang as $a){ ?>
                                                            <option class="form-control" value="<?php echo $a ?>" <?php echo($a==$row['jenjang'])?'selected':'' ?> ><?php echo strtoupper($a) ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </div>
                                            <div class="col-sm-3">
                                                <td class="col-sm-3" style="padding: 12px">Semester</td>
                                                <td class="col-sm-3" style="padding: 12px">
                                                        <select name="semester" class="form-control" id="">
                                                            <?php foreach($semester as $b){ ?>
                                                                <option class="form-control" value="<?php echo $b ?>" <?php echo($b==$row['jml_semester'])?'selected':'' ?> ><?php echo strtoupper($b) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                </td>
                                            </div>
                                    </div>
                                </tr>
                                <tr>
                                    <td class="col-sm-3" style="padding: 12px">Gelar</td>
                                    <td class="col-sm-3" style="padding: 12px">
                                            <input type="text" name="gelar" class="form-control" value="<?php echo $row['gelar'] ?>" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3" style="padding: 12px">Kode Nomor</td>
                                    <td class="col-sm-3" style="padding: 12px">
                                            <input type="text" name="kd_nmr" class="form-control" value="<?php echo $row['kode_nomor'] ?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3" style="padding: 12px;">
                                        <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">
                                        <a href="?page=konsentrasi" class="btn btn-sm btn-warning">Batal</a>
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
<?php }else if (isset($_GET['tambah_data'])){
    $jenjang = array('d1','d2','d3','d4','s1');
    $semester = array('1','2','3','4','5','6','7','8');

    $prodi = $pdo->prepare("select * from akademik_prodi");
    $prodi->execute();

    if (isset($_POST['simpan'])){
        $prodi = $_POST['prodi'];
        $konsentrasi = $_POST['konsentrasi'];
        $ketua = $_POST['ketua'];
        $jenjang = $_POST['jenjang'];
        $smt = $_POST['semester'];
        $gelar = $_POST['gelar'];
        $kode = $_POST['kd_nmr'];
        $sql = $pdo->prepare("insert into akademik_konsentrasi (nama_konsentrasi, ketua, jenjang, jml_semester, kode_nomor, gelar, prodi_id)
                              VALUES (:konsentrasi,:ketua,:jenjang,:semester,:kode,:gelar,:prodi)");
        $sql->bindParam(':konsentrasi',$konsentrasi);
        $sql->bindParam(':ketua',$ketua);
        $sql->bindParam(':jenjang',$jenjang);
        $sql->bindParam(':semester',$smt);
        $sql->bindParam(':kode',$kode);
        $sql->bindParam(':gelar',$gelar);
        $sql->bindParam(':prodi',$prodi);
        $sql->execute();
        echo "<script>window.location='?page=konsentrasi'</script>";
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Tambah Data Konsentrasi
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form method="post" action="" role="form">
                            <div class="row">
                                <div class="col-sm-9">
                                    <table>
                                        <tr>
                                            <td class="col-sm-3" style="padding: 12px">Nama Prodi</td>
                                            <td class="col-sm-3" style="padding: 12px">
                                                <select name="prodi" id="" class="form-control">
                                                    <?php while($data2 = $prodi->fetch()){
                                                        $list_prodi = $data2['nama_prodi'];
                                                        $id = $data2['prodi_id']
                                                        ?>
                                                        <option class="form-control" value="<?php echo $id ?>"><?php echo strtoupper($list_prodi) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3" style="padding: 12px">Nama Konsentrasi</td>
                                            <td class="col-sm-3" style="padding: 12px">
                                                <input type="text" name="konsentrasi" class="form-control" value="" required>
                                                <input type="hidden" name="id" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3" style="padding: 12px">Ketua</td>
                                            <td class="col-sm-3" style="padding: 12px">
                                                <input type="text" name="ketua" class="form-control" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Jenjang</td>
                                                    <td class="col-sm-3" style="padding: 12px">
                                                        <select name="jenjang" class="form-control" id="">
                                                            <?php foreach($jenjang as $a){ ?>
                                                                <option class="form-control" value="<?php echo $a ?>"><?php echo strtoupper($a) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Semester</td>
                                                    <td class="col-sm-3" style="padding: 12px">
                                                        <select name="semester" class="form-control" id="">
                                                            <?php foreach($semester as $b){ ?>
                                                                <option class="form-control" value="<?php echo $b ?>"><?php echo strtoupper($b) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3" style="padding: 12px">Gelar</td>
                                            <td class="col-sm-3" style="padding: 12px">
                                                <input type="text" name="gelar" class="form-control" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3" style="padding: 12px">Kode Nomor</td>
                                            <td class="col-sm-3" style="padding: 12px">
                                                <input type="text" name="kd_nmr" class="form-control" value="" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3" style="padding: 12px;">
                                                <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary">
                                                <a href="?page=konsentrasi" class="btn btn-sm btn-warning">Batal</a>
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

<?php }else if(isset($_GET['delete'])) {

    $id = base64_decode($_GET['delete']);
    $sql = $pdo->prepare("delete from akademik_konsentrasi where konsentrasi_id = $id ");
    $sql->execute();
    echo "<script>window.location='?page=konsentrasi'</script>";

}else{ ?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Konsentrasi
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=konsentrasi&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Konsentrasi</th>
                            <th>Nama Prodi</th>
                            <th>Ketua</th>
                            <th>Jenjang, Semester</th>
                            <th>Gelar</th>
                            <th style="text-align: center">Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = $pdo->prepare("select ak.*,ap.nama_prodi 
                                              from akademik_konsentrasi as ak inner JOIN akademik_prodi as ap
                                              WHERE ap.prodi_id = ak.prodi_id order by nama_konsentrasi");
                        $sql->execute();
                        $no = 1;
                        while($row = $sql->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo strtoupper($row['nama_konsentrasi'])  ?></td>
                            <td><?php echo strtoupper($row['nama_prodi']) ?></td>
                            <td><?php echo strtoupper($row['ketua']) ?></td>
                            <td><?php echo strtoupper($row['jenjang']).', '.$row['jml_semester'].' Semester' ?></td>
                            <td><?php echo strtoupper($row['gelar']) ?></td>
                            <td style="text-align: center;;">
                                <a class="btn btn-sm  btn-primary" title="Edit Data" href="?page=konsentrasi&edit=<?php echo base64_encode($row['konsentrasi_id'])?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm  btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')" title="Hapus Data" href="?page=konsentrasi&delete=<?php echo base64_encode($row['konsentrasi_id'])?>"><i class="fa fa-trash-o"></i></a>
                            </td>
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