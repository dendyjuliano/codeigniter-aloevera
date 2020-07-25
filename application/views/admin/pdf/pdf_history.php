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
if (count($historydata) > 0) {
	$i = 0;
	$html = '<h3>Data History</h3>
            <br>
                        <table bgcolor="#666666" border="1" cellpadding="1">
                            <tr bgcolor="#FF9100" color="#ffffff">
                                <th width="5%" align="center">No</th>
                                <th width="15%" align="center">Booking Code</th>
                                <th width="15%" align="center">Customer Name</th>
                                <th width="10%" align="center">Checkin</th>
                                <th width="10%" align="center">Checkout</th>
                                <th width="10%" align="center">Night</th>
                                <th width="10%" align="center">Price</th>
                                <th width="15%" align="center">Date</th>
                                <th width="10%" align="center">Image</th>
                            </tr>';
	foreach ($historydata as $row) {
		$i++;
		$html .= '<tr bgcolor="#ffffff">
                                <td align="center">' . $i . '</td>
                                <td align="center">' . $row['nomor_pesanan'] . '</td>
                                <td align="center">' . $row['nama_customer'] . '</td>
                                <td align="center">' . $row['checkin'] . '</td>
                                <td align="center">' . $row['checkout'] . '</td>
                                <td align="center">' . $row['durasi'] . '</td>
                                <td align="center">' . $row['harga'] . '</td>
                                <td align="center">' . strftime("%A %d %B %Y", strtotime($row['tgl_pesanan'])) . '</td>
                                <td align="center"><img src="' . base_url() . 'uploads/' . $row['image'] . '" width="200" alt=""></td>
                            </tr>';
	}
	$html .= '</table>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('data_room_active.pdf', 'I');
} else {
	$i = 0;
	$html = '<h3>Data History</h3>
                <table bgcolor="#666666" border="1" cellpadding="1">
                <tr bgcolor="#FF9100" color="#ffffff">
                    <th width="5%" align="center">No</th>
                    <th width="15%" align="center">Booking Code</th>
                    <th width="15%" align="center">Customer Name</th>
                    <th width="10%" align="center">Checkin</th>
                    <th width="10%" align="center">Checkout</th>
                    <th width="10%" align="center">Night</th>
                    <th width="10%" align="center">Price</th>
                    <th width="15%" align="center">Date</th>
                    <th width="10%" align="center">Image</th>
                </tr>';

	$i++;
	$html .= '<tr bgcolor="#ffffff">
                    <td align="center" colspan="9">No History Data</td>
            </tr>';
	$html .= '</table>';
	$pdf->writeHTML($html, true, false, true, false, '');
	$pdf->Output('data_room_active.pdf', 'I');
}
