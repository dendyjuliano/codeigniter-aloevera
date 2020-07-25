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
if (count($customerdata) > 0) {
    $i = 0;
    $html = '<h3>Data Customer</h3>
            <br>
                        <table bgcolor="#666666" border="1" cellpadding="3">
                            <tr bgcolor="#FF9100" color="#ffffff">
                                <th width="5%" align="center">No</th>
                                <th width="35%" align="center">Username</th>
                                <th width="45%" align="center">Name</th>
                                <th width="15%" align="center">Role</th>
                            </tr>';
    foreach ($customerdata as $row) {
        $i++;
        $html .= '<tr bgcolor="#ffffff">
                                <td align="center">' . $i . '</td>
                                <td align="center">' . $row['username'] . '</td>
                                <td align="center">' . $row['nama'] . '</td>
                                <td align="center">' . $row['role'] . '</td>
                            </tr>';
    }
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('data_customer.pdf', 'I');
} else {
    $i = 0;
    $html = '<h3>Data Customer</h3>
                        <table bgcolor="#666666" border="1" cellpadding="3">
                            <tr bgcolor="#FF9100" color="#ffffff">
                                <th width="5%" align="center">No</th>
                                <th width="35%" align="center">Username</th>
                                <th width="45%" align="center">Name</th>
                                <th width="15%" align="center">Role</th>
                            </tr>';

    $i++;
    $html .= '<tr bgcolor="#ffffff">
                    <td align="center" colspan="4">No Customer Data</td>
            </tr>';
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('data_customer.pdf', 'I');
}
