<div class="container">
    <div class="col-sm-4">
        <h2>Daftar Kota</h2>
        <div id="treeview2"></div>
    </div>
</div>
<script>
    var defaultData = [
        <?php
        $instalasi = $this->Modelservices->instalasiGetAll();
        foreach ($instalasi as $key => $value) {
            $unit = $this->Modelservices->unitGetInstalasi_id($value['id']);
            echo "{text: '$value[NAMA_UNIT_LAYANAN]',
            tags: ['" . count($unit) . "'],
            nodes: [
               ";
            foreach ($unit as $key2 => $value2) {
                $ruangan = $this->Modelservices->ruanganGetUnit_id($value2['id']);
                echo "{
                     text: '$value2[RUANGAN]',
                     tags: ['" . count($ruangan) . "'],
                     nodes: [
                           ";
                foreach ($ruangan as $key3 => $value3) {
                    echo "{text: '$value3[nama]'},";
                }
                echo "
                     ]
                     },";
            }
            echo "]},";
        }
        ?>
    ];
    $('#treeview2').treeview({
        levels: 1,
        showTags: true,
        data: defaultData
    });
</script>