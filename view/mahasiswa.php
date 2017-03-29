<script>
    $(document).ready(function(){
        loadjurusan();
    });
</script>

<script>
    $(document).ready(function(){
        $("#id_prodi").change(function(){
            loadjurusan()
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#id_konsentrasi").change(function(){
            loadmahasiswa();
        });
    });
</script>
<?php
require_once './config/db.php';
//combo prodi
$sql_prodi = $pdo->prepare("select nama_prodi,prodi_id from akademik_prodi ORDER BY nama_prodi ASC ");
$sql_prodi->execute();
//combo konsentrasi

?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel panel-primary">
            <header class="panel-heading">
                Data Mahasiswa
            </header>
            <div class="panel-body">
                <div class="col-sm-9">
                    <div class="adv-table editable-table">
                        <div class="clearfix"></div>
                            <div class=""></div>
                                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Gender</th>
                                        <th>Alamat</th>
                                        <th style="text-align: center">Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <?php $a='sdsdsd'; ?>
                                        <td style="text-align: center;"><a title="Edit Data" href="?page=mahasiswa&edit=<?php echo base64_encode($a) ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button></a>
                                            <a title="Hapus Data" onclick="return confirm('Yakin ingin hapus data ini?')" href="?page=kel_matkul&delete="><button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="adv-table editable-table">
                        <div class="clearfix"></div>
                        <br>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <tr>
                                    <td style="background-color: #428bca;color: white;border-color: #428bca">Prodi</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="prodi" id="prodi">
                                            <?php while ($p = $sql_prodi->fetch()){ ?>
                                            <option id="id_prodi" class="form-control" value="<?php echo $p['prodi_id']?>"><?php echo strtoupper($p['nama_prodi']) ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #428bca;color: white;border-color: #428bca">Konsentrasi</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="konsentrasi" id="konsen" class="form-control">
                                            <option id="id_konsentrasi" class="form-control" value=""></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #428bca;color: white;border-color: #428bca">Tahun Angkatan</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="thn_angkatan" id="thn_angkatan" class="form-control">
                                            <option class="form-control" value=""></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="?page=mahasiswa&tambah_data" class="btn btn-primary">Input Data</a>
                                    </td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>