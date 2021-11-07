<?php
	require('../public/fpdf183/fpdf.php');

	$cultivo = $_POST["id_cultivo"];
	$formato = $_POST["id_formato"];
	$date = date('d/m/Y');

	if(empty($cultivo) || empty($formato)){
		header('Location: error404');exit;
	}

	$pdf = new FPDF();
	$pdf->Addpage();

    //HEADER del reporte
		// Logo
		$pdf->Image('../public/img/logo3.png',15,8,40);
		// Arial bold 15
		$pdf->SetFont('Arial','B',14);
		// Movernos a la derecha
		$pdf->Cell(60);
		// Título
		$pdf->setXY(80,20);//coordenadas del titulo principal
		$pdf->Cell(80,10,'REPORTE GENERAL',0,1,'C');
		$pdf->setXY(80,35);//coordenadas informacion cultivo
		$pdf->Cell(20,10,'Cultivo: ',0,0,'C');
		$pdf->Cell(5,10,$cultivo,0,1,'C');
		$pdf->setXY(79,45);//coordenadas para la fecha
		$pdf->Cell(20,10,'Fecha: ',0,0,'C');
		$pdf->Cell(25,10,$date,0,1,'C');

	//Si el formato es igual a 1(biometrias) realizar el reprote respectivo
	if($formato==1){
		$pdf->setXY(73,55); //coordenadas informacion del formato
		$pdf->Cell(100,10,'Formato: Biometrias de crecimiento',0,0,'C');

		require ('../config/cn.php');

		$consulta = "SELECT AVG(num_organ) prom_num_org,
		AVG(peso_organ) prom_peso_org,
		AVG(peso_biomasa) prom_peso_biomasa,
		AVG(edad_organ) prom_edad_org,
		AVG(crecimiento_organ) prom_crec_org
		FROM biocrecimiento
		WHERE id_cultivo = $cultivo;";
		$resultado = $mysqli->query($consulta);
		$consulta1 = "SELECT color_organ, COUNT(color_organ) AS total_color_organ FROM biocrecimiento WHERE id_cultivo = $cultivo GROUP BY color_organ ORDER BY total_color_organ DESC LIMIT 1;";
		$consulta2 = "SELECT escamas_organ, COUNT(escamas_organ) AS total_escamas_organ FROM biocrecimiento WHERE id_cultivo = $cultivo GROUP BY escamas_organ ORDER BY total_escamas_organ DESC LIMIT 1;";
		$consulta3 = "SELECT compor_organ, COUNT(compor_organ) AS total_compor_organ FROM biocrecimiento WHERE id_cultivo = $cultivo GROUP BY compor_organ ORDER BY total_compor_organ DESC LIMIT 1;";
		$consulta4 = "SELECT ojos_organ, COUNT(ojos_organ) AS total_ojos_organ FROM biocrecimiento WHERE id_cultivo = $cultivo GROUP BY ojos_organ ORDER BY total_ojos_organ DESC LIMIT 1;";
		$resultado1 = $mysqli->query($consulta1);
		$resultado2 = $mysqli->query($consulta2);
		$resultado3 = $mysqli->query($consulta3);
		$resultado4 = $mysqli->query($consulta4);

		//establecer nuevas coordenadas de contenido
        $pdf->setXY(10,80);

        //fuente para los contenidos con(fuente, tipo(B,I), tamaño)
        $pdf->SetFont('Arial','B',14);
        //color de celda formato rgb
        $pdf->SetFillColor(34, 54, 137);
        //color de la letra formato rgb
        $pdf->SetTextColor(255, 255, 255);
        //agregamos una celda con (ancho,alto,texto,borde(T-B-R-L o 0-1), Ubicacion proxima celda, alineación, si se desea rellenar o no la celda)
        $pdf->Cell(95,13,'Campo','TBL',0,'C',true);
        $pdf->Cell(95,13,'Promedio en el cultivo','TBR',1,'C',true);
        $pdf->SetFillColor(220, 220, 220);

		// Recorre cada una de las filas de la tabla
		while ($row = $resultado->fetch_assoc()){

			$pdf->SetFont('Arial','',12);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(95, 12, 'Numero de organismos', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_num_org'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Peso de organismos (gm)', '1', 0, 'C',true);
            $pdf->Cell(95, 12,number_format($row['prom_peso_org'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Peso Biomasa (gm)', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_peso_biomasa'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Edad de organismos (semanas)', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_edad_org'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Crecimiento de organismos (cm)', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_crec_org'],0), '1', 1, 'C',true);
		}
		while ($row = $resultado1->fetch_assoc()){
			$pdf->Cell(95, 12, 'Color de organismos', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['color_organ'], '1', 1, 'C',true);
		}
		while ($row = $resultado2->fetch_assoc()){
			$pdf->Cell(95, 12, 'Escamas de organismos', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['escamas_organ'], '1', 1, 'C',true);
		}
		while ($row = $resultado4->fetch_assoc()){
			$pdf->Cell(95, 12, 'Ojos del organismo', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['ojos_organ'], '1', 1, 'C',true);
		}
		while ($row = $resultado3->fetch_assoc()){
			$pdf->Cell(95, 12, 'Comportamiento de organismos', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['compor_organ'], '1', 1, 'C',true);
		}

		$pdf->Output();

	}else if($formato==2){
		$pdf->setXY(73,55); //coordenadas informacion del formato
		$pdf->Cell(90,10,'Formato: Tabla de Alimentacion',0,0,'C');

		require ('../config/cn.php');

		$consulta = "SELECT AVG(cant_siembra) prom_cant_siembra
		FROM tblalimentacion
		WHERE id_cultivo = $cultivo;";
		$resultado = $mysqli->query($consulta);
		$consultas = "SELECT nombre_clase, COUNT(nombre_clase) nom_produ
		FROM tblalimentacion
		INNER JOIN producto ON tblalimentacion.id_produ = producto.id_produ
		INNER JOIN claseproducto ON producto.id_clase = claseproducto.id_clase
		WHERE id_cultivo=$cultivo
		GROUP BY nombre_clase
		ORDER BY nombre_clase DESC
		LIMIT 1;";
		$resultados = $mysqli->query($consultas);
		$consulta1 = "SELECT porc_proteina, COUNT(porc_proteina) AS total_porc_proteina FROM tblalimentacion WHERE id_cultivo = $cultivo GROUP BY porc_proteina ORDER BY total_porc_proteina DESC LIMIT 1;";
		$consulta2 = "SELECT hora_sum_alim1, COUNT(hora_sum_alim1) AS total_hora_sum_alim1 FROM tblalimentacion WHERE id_cultivo = $cultivo GROUP BY hora_sum_alim1 ORDER BY total_hora_sum_alim1 DESC LIMIT 1;";
		$consulta3 = "SELECT hora_sum_alim2, COUNT(hora_sum_alim2) AS total_hora_sum_alim2 FROM tblalimentacion WHERE id_cultivo = $cultivo GROUP BY hora_sum_alim2 ORDER BY total_hora_sum_alim2 DESC LIMIT 1;";
		$consulta4 = "SELECT hora_sum_alim3, COUNT(hora_sum_alim3) AS total_hora_sum_alim3 FROM tblalimentacion WHERE id_cultivo = $cultivo GROUP BY hora_sum_alim3 ORDER BY total_hora_sum_alim3 DESC LIMIT 1;";
		$resultado1 = $mysqli->query($consulta1);
		$resultado2 = $mysqli->query($consulta2);
		$resultado3 = $mysqli->query($consulta3);
		$resultado4 = $mysqli->query($consulta4);

		//establecer nuevas coordenadas de contenido
        $pdf->setXY(10,80);

        //fuente para los contenidos con(fuente, tipo(B,I), tamaño)
        $pdf->SetFont('Arial','B',14);
        //color de celda formato rgb
        $pdf->SetFillColor(34, 54, 137);
        //color de la letra formato rgb
        $pdf->SetTextColor(255, 255, 255);
        //agregamos una celda con (ancho,alto,texto,borde(T-B-R-L o 0-1), Ubicacion proxima celda, alineación, si se desea rellenar o no la celda)
        $pdf->Cell(95,13,'Campo','TBL',0,'C',true);
        $pdf->Cell(95,13,'Promedio en el cultivo','TBR',1,'C',true);
        $pdf->SetFillColor(220, 220, 220);

		// Recorre cada una de las filas de la tabla
		while ($row = $resultado->fetch_assoc()){

			$pdf->SetFont('Arial','',12);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Cell(95, 12, 'Numero de organismos', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_cant_siembra'],0), '1', 1, 'C',true);
		}
		while ($row = $resultados->fetch_assoc()){
			$pdf->Cell(95, 12, 'Producto suministrado', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['nombre_clase'], '1', 1, 'C',true);
		}
		while ($row = $resultado1->fetch_assoc()){
			$pdf->Cell(95, 12, 'Porcentaje de proteina suministrada (%)', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['porc_proteina'], '1', 1, 'C',true);
		}
		while ($row = $resultado2->fetch_assoc()){
			$pdf->Cell(95, 12, 'Hora suministro alimento #1', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['hora_sum_alim1'], '1', 1, 'C',true);
		}
		while ($row = $resultado3->fetch_assoc()){
			$pdf->Cell(95, 12, 'Hora suministro alimento #2', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['hora_sum_alim2'], '1', 1, 'C',true);
		}
		while ($row = $resultado4->fetch_assoc()){
			$pdf->Cell(95, 12, 'Hora suministro alimento #3', '1', 0, 'C',true);
			$pdf->Cell(95, 12, $row['hora_sum_alim3'], '1', 1, 'C',true);
		}
		$pdf->Output();
	}else{
		echo 'Reporte no generado';
	}


?>