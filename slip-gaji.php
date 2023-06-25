<html>

<head>
    <title>Slip Gaji</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;' onload="javascript:window.print()">
    <?php
    $name = $_GET['nama'];
    $jabatan = $_GET['jabatan'];
    $type = $_GET['type'];
    if ($type === 'guru') {
        $pelajaran = $_GET['pelajaran'];
        $kategori = $_GET['kategori'];
    }
    $jenis_kelamin = $_GET['jk'];
    $waktu = $_GET['tgl'];
    $gaji_pokok = $_GET['gaji_pokok'];
    $tunjangan = $_GET['tunjangan'];
    $bonus = $_GET['bonus'];
    $banyak_lembur = $_GET['banyak'];
    $lembur = $_GET['lembur'];
    $total_gaji = $_GET['total'];

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }
    ?>
    <center>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <span style='font-size:12pt'>
                    <b><?php echo $name ?></b></span></br>
                <?php
                if ($type === 'guru') {
                    echo '<strong>' . $kategori . '</strong></br>';
                } else {
                    echo 'Karyawan <br> ';
                }
                ?>
                <?php echo $jabatan ?>
            </td>
            <td style='vertical-align:top' width='30%' align='left'>
                <b><span style='font-size:12pt'>Slip Gaji</span></b></br>
                <strong>BCA</strong></br>
                Tanggal :<?php echo $waktu ?> </br>
            </td>
        </table>
        <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
            <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                <?php
                if ($type === 'guru') {
                    echo 'Pelajaran : ' . $pelajaran . '</br>';
                }
                ?>
                Jenis Kelamin : <?php echo $jenis_kelamin ?>
            </td>
        </table>

        <h3>Detail Gaji</h3>
        <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

            <tr align='center'>
                <td width='10%'>Gaji Pokok</td>
                <td width='20%'>Tunjangan</td>
                <td width='13%'>Bonus</td>
                <td width='4%'>Banyak Lembur</td>
                <td width='7%'>Total Lembur</td>
                <td width='13%'>Total Gaji</td>
            </tr>
            <tr>
                <td><?php echo $gaji_pokok ?></td>
                <td><?php echo $tunjangan ?></td>
                <td><?php echo $bonus ?> </td>
                <td><?php echo $banyak_lembur ?> </td>
                <td><?php echo $lembur ?> </td>
                <td style='text-align:right'> <?php echo $total_gaji ?> </td>
            </tr>

            <tr>
                <td colspan='5'>
                    <div style='text-align:right'>Total Gaji Guru Adalah : </div>
                </td>
                <td style='text-align:right'> <?php echo $total_gaji ?> </td>
            </tr>
            <tr>
                <td colspan='6'>
                    <div style='text-align:right'>Terbilang : <?php echo terbilang($total_gaji) ?></div>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>