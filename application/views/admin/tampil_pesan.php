
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
                    <h3 class="box-title">Tabel Data Akun</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td width="10%" align="middle"><b>No</b></td>
                                <td width="10%" align="middle"><b>Id Pengirim</b></td>
                                <td width="20%" align="middle"><b>Nama Pengirim</b></td>
                                <td width="50%" align="middle"><b>Keluhan</b></td>
                            </tr>

                            <?php
                            foreach($pesan as $pc){
                            // {foreach $get as $result}
                        echo '<tr>';
                        echo '<td align="middle">'.$no++.'</td>';
                            echo '<td align="middle">'.$pc['id_akun'].'</td>';
                            echo '<td align="middle">'.$pc['nama_lengkap'].'</td>';
                            echo '<td align="middle">'.$pc['keluhan'].'</td>';
                             echo '<td align="middle">
                                    <a href="'.site_url('akun/delete_akun/'.$pc['id_akun'].'') .'" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-book" title="Delete"></i> Delete</a></td>';
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

