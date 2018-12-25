<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3><b>Tambah Dongeng</b></h3>
                        <?php
    if($status == 0){
        echo '<script>alert("kolom tidak boleh kosong !");</script>'; 
    }
    ?>
                    <div class="box-tools">
                        <br><a class="btn btn-sm btn-primary" href="<?php echo site_url('produk')?>" ><i class="fa fa-long-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            <!-- box-success -->
        </div>
        <!-- col -->
     
<!-- <?php echo $this->session->flashdata('pesan'); ?>
<?php echo form_open_multipart('produk/upload');?>
  <div class="form-group">
    <label for="exampleFormControlFile1">Pilih gambar</label>
    <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
  </div>
   <div class="form-group">
   <button type="submit" class="btn btn-primary">Upload</button>
  </div>
<?php echo form_close();?>
 -->
                <?php foreach($percobaan as $pc){ ?>
                <!-- <form  action="<?php echo site_url('produk/edit_process/'.$pc['id_produk'].'') ?>" method="post"> -->
                	
                  <?php echo form_open_multipart('produk/edit_process/'.$pc['id_produk'].'');?>
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group">
                                    <h5><b>Nama Dongeng</b></h5>
                                        <input type="text" name="judul_produk" placeholder="-- Nama Produk --" value="<?php echo $pc['nama_produk'];?>" title="Masukkan Judul produk" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                        <h5><b>Deskripsi</b></h5>
                                            <textarea name="deskripsi" title="Masukkan Deskripsi tentang produk" rows="3" cols="35" style="width: 100%;" class="ckeditor" id="ckedtor" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="-- Deskripsi Project --"><?php echo $pc['deskripsi'];?></textarea>
                                    </div>
                                <div class="form-group">
                                    <h5><b>Terbitan Tahun</b></h5><b><input type="text" name="Rp." value="Rp." disabled style="width: 6%;"></b><input style="width: 94%;" type="number" name="harga" value="<?php echo $pc['harga'];?>" title="Masukkan Jumlah Uang" data-inputmask="'alias': 'numeric', 'groupSeparator':'.', 'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'prefix': ' ', 'placeholder': '0'" data-mask required>
                                </div>
                            </div>
                        </div>
                    </div>
                                    <div class="col-md-6">
                                        <div class="box box-success">
                                            <div class="box-body" style="width: 100%; height: 63px;">
                                                <center><h5><b>Upload Gambar Produk</b></h5></center>
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="box">
                                            <div class="box-body">
                                                <div class="form-group" style="overflow: scroll; width: 100%; height: 160px;">
                                                    <div class="col-md-6">    
                                            <div class="box-body">
                                                <label for="exampleFormControlFile1">Pilih gambar</label>
                                                <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
                                                <input type="hidden" name="old" value="<?php echo $pc['foto'];?>">
                                                <input type="hidden" name="id_produk" value="<?php echo $pc['id_produk'];?>">
                                                <?php echo '<img src="'.base_url('assets/image') . '/' . $pc['foto'].'" height="80" width="80">'; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="col-md-14">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group">
                                <br>
                                        <center>
                                            <button type="submit" class="btn btn-success" id="kirim">Simpan</button>                         
                                            <button type="reset" value="reset" name="reset" class="btn btn-danger">Reset</button>
                                        </center>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                  <!-- </form> -->
<?php echo form_close();?>
            </div>  