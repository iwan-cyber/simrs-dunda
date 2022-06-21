<div class="card card-info card-outline">
    <div class="card-header">
    <h3 class="card-title">Daftar Permintaan Pada Tanggal <input type="date" id="tanggal_permintaan" value="<?= $tglOrder; ?>"></h3>
        <!--div class="card-tools">
            <button type="button" class="btn btn-danger btn-xs" id="btnrefresh" title="Refresh data item">
                <i class="fas fa-refresh"></i> Refresh Nama Item
            </button>
        </div--><!-- card-tools -->
  
    </div><!-- /.card-header -->
    <div class="card-body">

        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Item</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    $rincianPermintaan = new RincianPermintaan($connect);
                    $rincian = $rincianPermintaan->get($notrans);

                    if(empty($rincian['DATA']))
                    {
                        echo '<tr><td colspan="3">Tidak Ada Data<td></tr>';
                    }
                    else
                    {
                        // var_dump($rincian['DATA']);
                        $urut = 0;
                        $tr = '';

                        foreach ($rincian['DATA'] as $key => $value) 
                        {

                            ++$urut;
                            $tr .= "<tr>
                                        <td>{$urut}</td>
                                        <td>{$value['nama_item']}</td>
                                        <td>{$value['jumlah']}</td>
                                        <td>{$value['satuan']}</td>
                                    </tr>";
                        }

                        echo $tr;
                    }

                    
    

                ?>
                
            </tbody>
        </table>




    

  </div><!-- card-body -->

</div><!-- card -->