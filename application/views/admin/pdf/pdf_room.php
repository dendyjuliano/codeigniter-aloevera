<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Data Customer');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();
if (count($roomdata) > 0) {
    $i = 0;
    $html = '<h3>Data Room</h3>
            <br>
                        <table bgcolor="#666666" border="1" cellpadding="3">
                            <tr bgcolor="#FF9100" color="#ffffff">
                                <th width="5%" align="center">No</th>
                                <th width="35%" align="center">Category</th>
                                <th width="30%" align="center">Name Room</th>
                                <th width="15%" align="center">Price</th>
                                <th width="15%" align="center">Image</th>
                            </tr>';
    foreach ($roomdata as $row) {
        $i++;
        $html .= '<tr bgcolor="#ffffff">
                                <td align="center">' . $i . '</td>
                                <td align="center">' . $row['nama_kategori'] . '</td>
                                <td align="center">' . $row['nama_kamar'] . '</td>
                                <td align="center">IDR ' . number_format($row['harga'], 0, ',', '.') . '</td>
                                <td align="center"><img src="' . base_url() . 'uploads/' . $row['image'] . '" width="200" alt=""></td>
                            </tr>';
    }
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('data_room.pdf', 'I');
} else {
    $i = 0;
    $html = '<h3>Data Room</h3>
                        <table bgcolor="#666666" border="1" cellpadding="3">
                        <tr bgcolor="#FF9100" color="#ffffff">
                        <th width="5%" align="center">No</th>
                        <th width="35%" align="center">Category</th>
                        <th width="30%" align="center">Name Room</th>
                        <th width="15%" align="center">Price</th>
                        <th width="15%" align="center">Image</th>
                    </tr>';

    $i++;
    $html .= '<tr bgcolor="#ffffff">
                    <td align="center" colspan="4">No Room Data</td>
            </tr>';
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('data_room.pdf', 'I');
}
