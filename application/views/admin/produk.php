
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-search"></i> Pencarian</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" action="{$config->site_url('initiation/initiation/search_process')}" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="project_title" class="col-sm-2 control-label">Keyword</label>
                                <div class="col-sm-4">
                                    <input type="text" title="Masukkan Nama Project" name="project_title" value="" class="form-control" id="project_title" placeholder="">
                                </div>
                                <div class="col-sm-2">
                                <select name="filter" min="0" max="40" class="form-control" widht='100px'>
                                    <option value="" >- Select Filter -</option>
                                    <option value='project_title'>Project Title</option>
                                    <option value='client_id'>Client Name</option>
                                    <option value='start_date'>Date/Year</option>
                                </select>
                                </div>
                                    <button type="submit" value="Reset" name="save" class="btn btn-danger">Reset</button>&nbsp;&nbsp;
                                    <button type="submit" value="Cari" name="save" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data produk</h3>
                    <div class="box-tools">
                        <a class="btn btn-sm btn-success" href="<?php echo site_url('produk/tambah_produk') ?>" ><i class="fa fa-plus"></i> Tambah Data</a>
                     
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td width="3%" align="middle"><b>No</b></td>
                                <td width="18%" align="middle"><b>Nama Produk</b></td>
                                <td width="13%" align="middle"><b>Deskripsi</b></td>
                                <td width="10%" align="middle"><b>Harga</b></td>
                                <td width="10%" align="middle"><b>Foto</b></td>
                                <td width="18%" align="middle"><b>Action</b></td>
                            </tr>

                            <?php
                            foreach($percobaan as $pc){
                            // {foreach $get as $result}
                        echo '<tr>';
                            echo '<td align="middle">'.$no++.'</td>';
                            echo '<td align="middle">'.$pc['nama_produk'].'</td>';
                            echo    '<td align="middle">'.$pc['deskripsi'].'</td>';
                            echo    '<td align="middle">'.$pc['harga'].'</td>';
                            echo    '<td align="middle"><img src="'.base_url('assets/image') . '/' . $pc['foto'].'" height="80" width="80"/></td>';
                             echo '<td align="middle">
                                    <a href="'.site_url('produk/edit_produk/'.$pc['id_produk'].'') .'" class="btn btn-xs btn-primary" title="Edit"><i class="fa fa-pencil" title="Edit"></i> Edit</a>
                                    <a href="'.site_url('produk/delete_produk/'.$pc['id_produk'].'') .'" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-book" title="Delete"></i> Delete</a></td>';
                        echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>

