<section id="content">
    <section class="vbox">
        <header class="header bg-light b-b">
            <p><?php echo isset($breadcrumb) ? $breadcrumb : 'Mahasiswa'; ?></p>
        </header>
        <section class="scrollable padder">
            <div class="m-b-md">
                <h3 class="m-b-none">Data Mahasiswa</h3>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <!-- Form Input Data -->
                <div class="col-sm-6">
                    <section class="panel panel-default pos-rlt clearfix">
                        <header class="panel-heading">
                            <ul class="nav nav-pills pull-right">
                                <li>
                                    <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                                </li>
                            </ul>
                            Tambah Data Mahasiswa
                        </header>
                        <div class="panel-body clearfix">
                            <form class="form-horizontal" action="<?php echo site_url('mahasiswa/tambah_mahasiswa'); ?>" method="post">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">NIM</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="nim" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nama</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Jurusan</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="jurusan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Alamat</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>

                <!-- Tabel Data -->
                <div class="col-sm-12">
                    <section class="panel panel-default">
                        <header class="panel-heading">
                            Daftar Mahasiswa
                        </header>
                        <div class="table-responsive">
                            <table class="table table-striped m-b-none" id="datatables">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mahasiswa as $mhs):
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $mhs->nim; ?></td>
                                            <td><?php echo $mhs->nama; ?></td>
                                            <td><?php echo $mhs->jurusan; ?></td>
                                            <td><?php echo $mhs->alamat; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>

<script type="text/javascript">
    var site = "<?php echo site_url(); ?>";
    window.onload = function() {
        // Initialize DataTables
        $('#datatables').dataTable({
            "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "sPaginationType": "full_numbers",
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }]
        });
    }
</script>