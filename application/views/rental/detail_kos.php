<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Kost</h1>
        </div>

        <?php foreach ( $detail as $dt ) : ?>

            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-5">
                            <img width="400" src="<?php echo base_url() . 'assets/upload/' . $dt->gambar ?>">

                        </div>

                        <div class="col-md-7">
                            
                            <table class="table">
                                <tr>
                                    <td>Type Kost</td>
                                    <td>
                                        <?php 
                                            if($dt->kode_type == "KMA"){
                                                echo "Deluxe Room";
                                            }elseif($dt->kode_type == "KMB"){
                                                echo "Superior Room";
                                            }elseif($dt->kode_type == "KMC"){
                                                echo "Standard Room";
                                            }elseif($dt->kode_type == "APA"){
                                                echo "Junior Suite";
                                            }elseif($dt->kode_type == "APB"){
                                                echo "Single Room";
                                            }else{
                                                echo "<span class='text-danger'> Tipe kos belum terdaftar </span>";
                                            }
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo $dt->merk ?></td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $dt->no_plat ?></td>
                                </tr>

                                <tr>
                                    <td>Luas Kamar</td>
                                    <td><?php echo $dt->warna ?></td>
                                </tr>

                                <tr>
                                    <td>Tahun</td>
                                    <td><?php echo $dt->tahun?></td>
                                </tr>

                                <tr>
                                    <td>Harga</td>
                                    <td>Rp. <?php echo number_format($dt->harga,0,',','.') ?></td>
                                </tr>

                                <tr>
                                    <td>Denda</td>
                                    <td>Rp. <?php echo number_format($dt->denda,0,',','.')?></td>
                                </tr>

                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php 
                                            if($dt->status == "0"){
                                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                            }else{
                                                echo "<span class='badge badge-primary'>Tersedia </span>";
                                            }
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>AC</td>
                                    <td>
                                        <?php 
                                            if($dt->ac == "0"){
                                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                            }else{
                                                echo "<span class='badge badge-primary'>Tersedia </span>";
                                            }
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wifi</td>
                                    <td>
                                        <?php 
                                            if($dt->supir == "0"){
                                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                            }else{
                                                echo "<span class='badge badge-primary'>Tersedia </span>";
                                            }
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dapur</td>
                                    <td>
                                        <?php 
                                            if($dt->mp3_player == "0"){
                                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                            }else{
                                                echo "<span class='badge badge-primary'>Tersedia </span>";
                                            }
                                        ?>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kamar Mandi</td>
                                    <td>
                                        <?php 
                                            if($dt->central_lock == "0"){
                                                echo "<span class='badge badge-danger'> Tidak Tersedia </span>";
                                            }else{
                                                echo "<span class='badge badge-primary'>Tersedia </span>";
                                            }
                                        ?>    
                                    </td>
                                </tr>
                            </table>

                            <a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('rental/data_kos') ?>">Kembali</a>
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url('rental/data_kos/update_kos/') . $dt->id_kos ?>">Update</a>
                        </div>

                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </section>
</div>