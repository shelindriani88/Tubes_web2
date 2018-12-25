
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3><b>Kirim Pesan</b></h3>

                    <div class="box-tools">
            
                    </div>
                </div>
            </div>
            <!-- box-success -->
        </div>
        <!-- col -->
     
    <?php
    if($st == 1){
        echo '<script>alert("Pesan berhasil dikirim");</script>'; 
    }
    ?>     
                  <form method="post" action="Contact/kirim" >
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="form-group">
                                        <h5><b>keluhan</b></h5>
                                            <textarea name="keluhan" title="Ceritakan keluhan yang anda alami ketika menggunakan aplikasi ini" rows="3" cols="35" style="width: 100%;" class="ckeditor" id="ckedtor" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="-- Ceritakan keluhan yang anda alami ketika menggunakan aplikasi ini --"></textarea>
                                            <?php 
                                            $id_akun = $this->session->userdata("id_akun");
                                            echo '<input type="hidden" value="'.$id_akun.'"name="id_akun" class="form-control" required>';

                                            ?>
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
<?php echo form_close();?>
                <!-- </form> -->
            </div>  
