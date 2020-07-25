<?php
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Data Room Active');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();
if (count($active) > 0) {
    $i = 0;
    $html = '<h3>Data Room</h3>
            <br>
                        <table bgcolor="#666666" border="1" cellpadding="3">
                            <tr bgcolor="#FF9100" color="#ffffff">
                                <th width="5%" align="center">No</th>
                                <th width="15%" align="center">Room</th>
                                <th width="15%" align="center">Name Room</th>
                                <th width="15%" align="center">Booking Code</th>
                                <th width="15%" align="center">Name Customer</th>
                                <th width="13%" align="center">Checkin</th>
                                <th width="13%" align="center">Checkout</th>
                                <th width="9%" align="center">Night</th>
                            </tr>';
    foreach ($active as $row) {
        $i++;
        $html .= '<tr bgcolor="#ffffff">
                                <td align="center">' . $i . '</td>
                                <td align="center"><img src="' . base_url() . 'uploads/' . $row['image'] . '" width="200" alt=""></td>
                                <td align="center">' . $row['nama_kamar'] . '</td>
                                <td align="center">' . $row['nomor_pesanan'] . '</td>
                                <td align="center">' . $row['nama_customer'] . '</td>
                                <td align="center">' . $row['checkin'] . '</td>
                                <td align="center">' . $row['checkout'] . '</td>
                                <td align="center">' . $row['durasi'] . '</td>
                            </tr>';
    }
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('data_room_active.pdf', 'I');
} else {
    $i = 0;
    $html = '<h3>Data Room</h3>
                <table bgcolor="#666666" border="1" cellpadding="3">
                    <tr bgcolor="#FF9100" color="#ffffff">
                        <th width="15%" align="center">Room</th>
                        <th width="15%" align="center">Name Room</th>
                        <th width="15%" align="center">Booking Code</th>
                        <th width="15%" align="center">Name Customer</th>
                        <th width="15%" align="center">Checkin</th>
                        <th width="15%" align="center">Checkout</th>
                        <th width="10%" align="center">Night</th>
                    </tr>';

    $i++;
    $html .= '<tr bgcolor="#ffffff">
                    <td align="center" colspan="7">No Room Data</td>
            </tr>';
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('data_room_active.pdf', 'I');
}
