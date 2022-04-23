<?php
require_once '../conexion.php';
require_once 'fpdf/fpdf.php';
$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Ventas");
$pdf->SetFont('Arial', 'B', 12);
$id = $_GET['v'];
$idcliente = $_GET['cl'];
$tventa = mysqli_query($mysqli, "SELECT * FROM ventas WHERE id = $id");
$totalv = mysqli_fetch_assoc($tventa);
$iduser = $totalv["id_usuario"];
$fechaFactura =date("d-m-Y H:i:s", strtotime($totalv["fecha"]));
//Usuario
$tusuario = mysqli_query($mysqli, "SELECT * FROM tb_usuarios WHERE id = $iduser");
$duser = mysqli_fetch_assoc($tusuario);
$nombreUser = $duser['nombre'];
//End:usuario

$config = mysqli_query($mysqli, "SELECT * FROM configuracion");
$datos = mysqli_fetch_assoc($config);
$clientes = mysqli_query($mysqli, "SELECT * FROM tb_cliente WHERE id = $idcliente");
$datosC = mysqli_fetch_assoc($clientes);
$ventas = mysqli_query($mysqli, "SELECT d.*, p.codigo, p.nombre_pro FROM detalle_venta d INNER JOIN tb_productos p ON d.id_producto = p.id WHERE d.id_venta = $id");
$pdf->Ln(3);

$pdf->Cell(195, 5, utf8_decode($datos['nombre']), 0, 1, 'C');
$pdf->Image("../assets/images/logo.png", 10, 10, 40, 30, 'PNG');
$pdf->Ln(18);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Teléfono: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, $datos['telefono'], 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Dirección: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, utf8_decode($datos['direccion']), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, "Correo: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, utf8_decode($datos['email']), 0, 1, 'L');
/*$nombreUser
$fechaFactura*/
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode("Vendedor: "), 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, utf8_decode($nombreUser), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, "Fecha: ", 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 5, $fechaFactura, 0, 1, 'L');

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Datos del cliente", 1, 1, 'L', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(90, 5, utf8_decode('Nombre'), 0, 0, 'L');
$pdf->Cell(50, 5, utf8_decode('Teléfono'), 0, 0, 'L');
$pdf->Cell(56, 5, utf8_decode('Dirección'), 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90, 5, utf8_decode($datosC['nombre_clie']), 0, 0, 'L');
$pdf->Cell(50, 5, utf8_decode($datosC['celular_clie']), 0, 0, 'L');
$pdf->Cell(56, 5, utf8_decode($datosC['direccion_clie']), 0, 1, 'L');
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Detalle de Producto", 1, 1, 'L', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(14, 5, utf8_decode('N°'), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode('Descripción'), 0, 0, 'L');
$pdf->Cell(25, 5, 'Cantidad', 0, 0, 'L');
$pdf->Cell(32, 5, 'Precio', 0, 0, 'L');
$pdf->Cell(35, 5, 'Total importe.', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$contador = 1;
while ($row = mysqli_fetch_assoc($ventas)) {
    $pdf->Cell(14, 5, $contador, 0, 0, 'L');
    $pdf->Cell(90, 5, $row['nombre_pro'], 0, 0, 'L');
    $pdf->Cell(25, 5, $row['cantidad'], 0, 0, 'L');
    $pdf->Cell(32, 5,  number_format($row['precio']), 0, 0, 'L');
    $pdf->Cell(35, 5, number_format($row['cantidad'] * $row['precio']), 0, 1, 'L');
    $contador++;
}
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(14, 5, utf8_decode(''), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode(''), 0, 0, 'L');
$pdf->Cell(25, 5, '', 0, 0, 'L');
$pdf->Cell(32, 5, 'Total a pagar: ', 0, 0, 'L');
$pdf->Cell(35, 5,  number_format($totalv['total']), 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);


$pdf->Output("ventas.pdf", "I");

?>