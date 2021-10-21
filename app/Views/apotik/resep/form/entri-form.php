<tfoot>

    <form id="form_entry">
        <tr>
            <td>
                <div class="input-group input-group-sm">
                  <select class="form-control form-control-sm select" id="NAMA_ITEM">
                    <?php echo $optItem; ?>
                  </select>

                  <?php 

                  if($_SESSION['UNIT'] == 'OKB') { ?>


                  <div class="btn-group">
                    <button type="button" class="btn btn-info btn-flat btn-xs">Paket</button>
                    <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon btn-xs" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <?php echo $data_paket; ?>
                    </div>
                  </div>

                <?php } ?>

                </div>
            </td>

            <td>
                <input type="text" class="input-text" size="5" style="background: white" name="STOCK" id="STOCK" value="0"/>
            </td>
            
            <td>
                <input type="text" class="input-text uang"  size="7" style="background: white" id="HARGA" name="HARGA" value="0"readonly="readonly"/>
            </td>

            <td>
                <input type="text" class="input-text" size="4" name="JUMLAH" id="JUMLAH" value="0"/>
            </td>

            <td>
                <input type="text" class="input-text uang" size="7" style="background: white" readonly="readonly"
                id="SUBTOTAL"name="SUBTOTAL" value="0"/>
            </td>
            
            <td>
                <button type="button" class="btn btn-xs btn-primary hapus btn-block" id="btnadd" onClick="Entri.add()">
                  TAMBAH
                </button>
            </td>

        </tr>

    </form>

</tfoot>
