<?php
	require('../../public/fpdf183/fpdf.php');

	date_default_timezone_set("America/Bogota");
	$fecha = date("d/m/Y");

	$pdf = new FPDF();
	$pdf->Addpage();

    //HEADER del reporte
		// Logo
		$pdf->Image('../../public/img/logo3.png',15,8,40);
		// Arial bold 15
		$pdf->SetFont('Arial','B',14);
		// Movernos a la derecha
		$pdf->Cell(60);
		// Título
		$pdf->setXY(80,20);//coordenadas del titulo principal
		$pdf->Cell(80,10,'REPORTE DE PROVEEDORES',0,1,'C');
		$pdf->setXY(79,35);//coordenadas para la fecha
		$pdf->Cell(20,9,'Fecha: ',0,0,'C');
		$pdf->Cell(25,10,$fecha,0,1,'C');
		$pdf->setXY(79,45);//coordenadas para la fecha
		$pdf->Cell(85,10,'Proveedores activos en el sistema.',0,0,'C');


		require ('../../config/cn.php');

		$consulta = "SELECT * FROM proveedor WHERE est=1;";
		$resultado = $mysqli->query($consulta);

		//establecer nuevas coordenadas de contenido
        $pdf->setXY(10,70);

        //fuente para los contenidos con(fuente, tipo(B,I), tamaño)
        $pdf->SetFont('Arial','B',14);
        //color de celda formato rgb
        $pdf->SetFillColor(34, 54, 137);
        //color de la letra formato rgb
        $pdf->SetTextColor(255, 255, 255);
        //agregamos una celda con (ancho,alto,texto,borde(T-B-R-L o 0-1), Ubicacion proxima celda, alineación, si se desea rellenar o no la celda)
        $pdf->Cell(40,13,'Nombre',1,0,'C',true);
        $pdf->Cell(65,13,utf8_decode('Dirección'),1,0,'C',true);
		$pdf->Cell(30,13,utf8_decode('Teléfono'),1,0,'C',true);
		$pdf->Cell(55,13,'Correo',1,1,'C',true);
        $pdf->SetFillColor(220, 220, 220);

		// Recorre cada una de las filas de la tabla
		while ($row = $resultado->fetch_assoc()){

			$pdf->SetFont('Arial','',12);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(40, 12, $row['nombre_emp'], '1', 0, 'C',true);
            $pdf->Cell(65, 12,$row['direccion_emp'], '1', 0, 'C',true);
            $pdf->Cell(30, 12,$row['telefono_emp'], '1', 0, 'C',true);
            $pdf->Cell(55, 12,$row['correo_emp'], '1', 1, 'C',true);
		}

		$pdf->Output();

?>