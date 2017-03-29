<?php
require_once './config/db.php';
if (isset($_GET['edit'])){
    $id = base64_decode($_GET['edit']);
    $sql = $pdo->prepare("select ad.*,ap.nama_prodi from app_dosen as ad inner join akademik_prodi as ap where dosen_id = $id");
    $sql->execute();
    $row = $sql->fetch();
    $tgl = $row['tanggal_lahir'];

    $agama = $pdo->prepare("select * from app_agama");
    $agama->execute();
    $jk = array(1=>'Laki-Laki',2=>'Perempuan');
    $kawin = array(1=>'Kawin',2=>'Belum Kawin');

    $prodi = $pdo->prepare("select * from akademik_prodi");
    $prodi->execute();


    if (isset($_POST['save'])){
        $nama = $_POST['nm_lengkap'];
        $id_prodi = $_POST['prodi'];
        $nidn = $_POST['nidn'];
        $nip = $_POST['nip'];
        $tmp_lahir = $_POST['tmp_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jenis_kel'];
        $agama = $_POST['agama'];
        $status = $_POST['status'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $email = $_POST['email'];
        $sql = $pdo->prepare("update app_dosen set nama_lengkap=:nama,prodi_id=:prodi_id,nidn=:nidn,nip=:nip,tempat_lahir=:tmp_lahir,tanggal_lahir=:tgl_lahir,
                              gender=:jk,agama_id=:agama,status_kawin=:kawin,alamat=:alamat,hp=:hp,email=:email where dosen_id=:id ");
        $sql->bindParam(':nama',$nama);
        $sql->bindParam(':prodi_id',$id_prodi);
        $sql->bindParam(':nidn',$nidn);
        $sql->bindParam(':nip',$nip);
        $sql->bindParam(':tmp_lahir',$tmp_lahir);
        $sql->bindParam(':tgl_lahir',$tgl_lahir);
        $sql->bindParam(':jk',$jk);
        $sql->bindParam(':agama',$agama);
        $sql->bindParam(':kawin',$status);
        $sql->bindParam(':alamat',$alamat);
        $sql->bindParam(':hp',$hp);
        $sql->bindParam(':email',$email);
        $sql->bindParam(':id',$id);
        $sql->execute();
        echo "<script>window.location='?page=dosen'</script>";

    }
    ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Edit Data Dosen
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-9">
                                    <table>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">Nama Lengkap</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="nm_lengkap" value="<?php echo $row['nama_lengkap'] ?>" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">Prodi</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <select class="form-control" name="prodi" id="">
                                                            <?php while($data = $prodi->fetch()){
                                                                $id = $data['prodi_id'];
                                                                ?>
                                                            <option class="form-control" value="<?php echo $id ?>" <?php echo($id==$row['prodi_id'])?'selected':''?> ><?php echo strtoupper($data['nama_prodi'] ) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">NIDN</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="nidn" value="<?php echo $row['nidn'] ?>" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">NIP</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="nip" value="<?php echo $row['nip'] ?>" class="form-control" required>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Tempat Lahir</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="tmp_lahir" value="<?php echo $row['tempat_lahir'] ?>" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Tanggal Lahir</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="date" name="tgl_lahir" value="<?php echo $row['tanggal_lahir'] ?>" class="form-control" required>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-3">Jenis Kelamin</td>
                                            <td style="padding: 12px" class="col-sm-3">
                                                <select class="form-control" name="jenis_kel" id="">
                                                    <?php foreach ($jk as $a=>$b){ ?>
                                                    <option class="form-control" value="<?php echo $a ?>" <?php echo($a==$row['gender'])?'selected':'' ?>><?php echo $b?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Agama</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                            <select name="agama" id="" class="form-control">
                                                                <?php while ($a = $agama->fetch()){
                                                                    $id = $a['agama_id'];
                                                                    ?>
                                                                    <option class="form-control" value="<?php echo $id ?>" <?php echo($id==$row['agama_id'])?'selected':''?>><?php echo $a['keterangan']?></option>
                                                                <?php } ?>
                                                            </select>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Status</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                            <select name="status" class="form-control" id="">
                                                                <?php foreach($kawin as $a=>$b){ ?>
                                                                <option class="form-control" value="<?php echo $a ?>" <?php echo($a==$row['status_kawin'])?'selected':'' ?>><?php echo $b ?></option>
                                                                <?php } ?>
                                                            </select>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-3">Alamat</td>
                                            <td style="padding: 12px" class="col-sm-3">
                                                <textarea class="form-control" name="alamat" id="" cols="30" rows="2" required><?php echo $row['alamat'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">No. HP</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="hp" class="form-control" value="<?php echo $row['hp'] ?>" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Email</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-3">
                                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Simpan">
                                                <a href="?page=dosen" class="btn btn-sm btn-warning">Batal</a>
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
<?php }else if(isset($_GET['tambah_data'])){
    $prodi = $pdo->prepare("select * from akademik_prodi");
    $prodi->execute();

    $agama = $pdo->prepare("select * from app_agama");
    $agama->execute();

    $jk = array(1=>'Laki-Laki',2=>'Perempuan');
    $kawin = array(1=>'Kawin',2=>'Belum Kawin');

    if (isset($_POST['save'])){
        $nama = $_POST['nm_lengkap'];
        $id_prodi = $_POST['prodi'];
        $nidn = $_POST['ni dn'];
        $nip = $_POST['nip'];
        $tmp_lahir = $_POST['tmp_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jenis_kel'];
        $agama = $_POST['agama'];
        $status = $_POST['status'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $email = $_POST['email'];
        $sql = $pdo->prepare("insert into app_dosen (nama_lengkap, nidn, 
                                                    nip, tempat_lahir, tanggal_lahir, gender, 
                                                    agama_id, status_kawin, alamat, hp, email, prodi_id) VALUES (
                                                    :nama,:nidn,:nip,:tmp_lahir,:tgl_lahir,:jk,:agama,
                                                    :status_kawin,:alamat,:hp,:email,:prodi
                                                    )");
        $sql->bindParam(':nama',$nama);
        $sql->bindParam(':prodi',$id_prodi);
        $sql->bindParam(':nidn',$nidn);
        $sql->bindParam(':nip',$nip);
        $sql->bindParam(':tmp_lahir',$tmp_lahir);
        $sql->bindParam(':tgl_lahir',$tgl_lahir);
        $sql->bindParam(':jk',$jk);
        $sql->bindParam(':agama',$agama);
        $sql->bindParam(':status_kawin',$status);
        $sql->bindParam(':alamat',$alamat);
        $sql->bindParam(':hp',$hp);
        $sql->bindParam(':email',$email);
        $sql->execute();
    }
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <header class="panel-heading">
                    Tambah Data Dosen
                </header>
                <div class="clearfix">
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-9">
                                    <table>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">Nama</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="nm_lengkap" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">Prodi</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <select class="form-control" name="prodi" id="">
                                                        <?php while($data=$prodi->fetch()){ ?>
                                                            <option class="form-control" value="<?php  echo $data['prodi_id'] ?>"><?php echo strtoupper($data['nama_prodi']) ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">NIDN</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="nidn" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td style="padding: 12px" class="col-sm-3" style="padding: 12px">NIP</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="nip" class="form-control" required>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Tempat Lahir</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="tmp_lahir" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Tanggal Lahir</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="date" name="tgl_lahir" class="form-control" required>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-3">Jenis Kelamin</td>
                                            <td style="padding: 12px" class="col-sm-3">
                                                <select class="form-control" name="jenis_kel" id="">
                                                    <?php foreach ($jk as $a=>$b){ ?>
                                                    <option class="form-control" value="<?php echo $a ?>"><?php  echo $b ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Agama</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <select name="agama" id="" class="form-control">
                                                            <?php while($data = $agama->fetch()){ ?>
                                                            <option value="<?php echo $data['agama_id'] ?>"><?php echo strtoupper($data['keterangan']) ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Status</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <select class="form-control" name="status" id="">
                                                            <?php foreach ($kawin as $a=>$b){ ?>
                                                            <option class="form-control" value="<?php echo $a ?>"><?php echo strtoupper($b)?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-3">Alamat</td>
                                            <td style="padding: 12px" class="col-sm-3">
                                                <textarea class="form-control" name="alamat" id="" cols="30" rows="2" required></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <div class="col-sm-9">
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">No. HP</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="hp" class="form-control" required>
                                                    </td>
                                                </div>
                                                <div class="col-sm-3">
                                                    <td class="col-sm-3" style="padding: 12px">Email</td>
                                                    <td style="padding: 12px" class="col-sm-3">
                                                        <input type="text" name="email" class="form-control" required>
                                                    </td>
                                                </div>
                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="padding: 12px" class="col-sm-3">
                                                <input name="save" type="submit" class="btn btn-sm btn-primary" value="Simpan">
                                                <a href="?page=dosen" class="btn btn-sm btn-warning">Batal</a>
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
<?php }elseif(isset($_GET['hapus'])){
    $id = base64_decode($_GET['hapus']);
    $sql = $pdo->prepare("delete from app_dosen where dosen_id = $id ");
    $sql->execute();
    echo "<script>window.location='?page=dosen'</script>";
}else{
?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Dosen
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="btn-group">
                            <a href="?page=dosen&tambah_data" class="btn btn-sm btn-primary">
                                Tambah Data <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th style="text-align: center">Pilihan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = $pdo->prepare("select ad.*,ap.nama_prodi from app_dosen as ad inner join akademik_prodi as ap where ad.prodi_id = ap.prodi_id ORDER BY nama_lengkap ASC ");
                        $sql->execute();
                        $no = 1;
                        while($row = $sql->fetch(PDO::FETCH_ASSOC)){

                            ?>
                        <tr class="">
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nip'] ?></td>
                            <td><?php echo $row['nama_lengkap'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo strtoupper($row['nama_prodi']) ?></td>
                            <td style="text-align: center">
                                <a href="?page=dosen&edit=<?php echo base64_encode($row['dosen_id'])?>" class="btn btn-xs btn-primary" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=dosen&hapus=<?php echo base64_encode($row['dosen_id'])?>" class="btn btn-xs btn-danger" title="Hapus Data"><i class="fa fa-trash-o"></i></a>
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