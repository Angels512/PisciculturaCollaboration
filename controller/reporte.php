<?php
	require('../public/fpdf183/fpdf.php');

	$cultivo = $_POST["id_cultivo"];
	$formato = $_POST["id_formato"];
	date_default_timezone_set("America/Bogota");
	$fecha = date("d/m/Y");

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
		$pdf->Cell(25,10,$fecha,0,1,'C');

	//Si el formato es igual a 1(biometrias) realizar el reprote respectivo
	if($formato==1){
		$pdf->setXY(73,55); //coordenadas informacion del formato
		$pdf->Cell(100,10,utf8_decode('Formato: Biometrías de crecimiento'),0,0,'C');

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
            $pdf->Cell(95, 12, utf8_decode('Número de organismos'), '1', 0, 'C',true);
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
		$pdf->Cell(90,10,utf8_decode('Formato: Tabla de Alimentación'),0,0,'C');

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
            $pdf->Cell(95, 12, utf8_decode('Número de organismos'), '1', 0, 'C',true);
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
	}else if($formato==3){
		$pdf->setXY(73,55); //coordenadas informacion del formato
		$pdf->Cell(90,10,utf8_decode('Formato: Temperatura del Agua'),0,0,'C');

		require ('../config/cn.php');

		$consulta = "SELECT AVG(grados1) prom_grados1,
		AVG(grados2) prom_grados2,
		AVG(grados3) prom_grados3
		FROM tempagua
		WHERE id_cultivo = $cultivo;";
		$resultado = $mysqli->query($consulta);
		$consulta1 = "SELECT grados1, COUNT(grados1) AS total_grados1 FROM tempagua WHERE id_cultivo = $cultivo GROUP BY grados1 ORDER BY grados1 DESC LIMIT 1;";
		$consulta2 = "SELECT grados2, COUNT(grados2) AS total_grados2 FROM tempagua WHERE id_cultivo = $cultivo GROUP BY grados2 ORDER BY grados2 DESC LIMIT 1;";
		$consulta3 = "SELECT grados3, COUNT(grados3) AS total_grados3 FROM tempagua WHERE id_cultivo = $cultivo GROUP BY grados3 ORDER BY grados3 DESC LIMIT 1;";
		$resultado1 = $mysqli->query($consulta1);
		$resultado2 = $mysqli->query($consulta2);
		$resultado3 = $mysqli->query($consulta3);

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
			$pdf->Cell(95, 12, 'Grados 1', '1', 0, 'C',true);
            $pdf->Cell(95, 12,number_format($row['prom_grados1'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Grados 2', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_grados2'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Grados 3', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_grados3'],0), '1', 1, 'C',true);
		}

		$pdf->Output();

	}else if($formato==4){
		$pdf->setXY(73,55); //coordenadas informacion del formato
		$pdf->Cell(99,10,utf8_decode('Formato: Temperatura del Ambiente'),0,0,'C');

		require ('../config/cn.php');

		$consulta = "SELECT AVG(grados1) prom_grados1,
		AVG(grados2) prom_grados2,
		AVG(grados3) prom_grados3
		FROM tempambiente
		WHERE id_cultivo = $cultivo;";
		$resultado = $mysqli->query($consulta);
		$consulta1 = "SELECT grados1, COUNT(grados1) AS total_grados1 FROM tempambiente WHERE id_cultivo = $cultivo GROUP BY grados1 ORDER BY grados1 DESC LIMIT 1;";
		$consulta2 = "SELECT grados2, COUNT(grados2) AS total_grados2 FROM tempambiente WHERE id_cultivo = $cultivo GROUP BY grados2 ORDER BY grados2 DESC LIMIT 1;";
		$consulta3 = "SELECT grados3, COUNT(grados3) AS total_grados3 FROM tempambiente WHERE id_cultivo = $cultivo GROUP BY grados3 ORDER BY grados3 DESC LIMIT 1;";
		$resultado1 = $mysqli->query($consulta1);
		$resultado2 = $mysqli->query($consulta2);
		$resultado3 = $mysqli->query($consulta3);

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
			$pdf->Cell(95, 12, 'Grados 1', '1', 0, 'C',true);
            $pdf->Cell(95, 12,number_format($row['prom_grados1'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Grados 2', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_grados2'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Grados 3', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_grados3'],0), '1', 1, 'C',true);
		}

		$pdf->Output();

	}else if($formato==5){
		$pdf->setXY(73,55); //coordenadas informacion del formato
		$pdf->Cell(105,10,utf8_decode('Formato: Parametros Fisico-Quimicos'),0,0,'C');

		require ('../config/cn.php');

		$consulta = "SELECT AVG(rango_amonio) prom_rango_amonio,
		AVG(rango_nitrito) prom_rango_nitrito,
		AVG(rango_nitrato) prom_rango_nitrato,
		AVG(rango_ph) prom_rango_ph,
		AVG(cant_melaza) prom_cant_melaza,
		AVG(porc_agua) prom_porc_agua
		FROM parametrosfq
		WHERE id_cultivo = $cultivo;";
		$resultado = $mysqli->query($consulta);
		$consulta1 = "SELECT rango_amonio, COUNT(rango_amonio) AS total_rango_amonio FROM parametrosfq WHERE id_cultivo = $cultivo GROUP BY rango_amonio ORDER BY rango_amonio DESC LIMIT 1;";
		$consulta2 = "SELECT rango_nitrito, COUNT(rango_nitrito) AS total_rango_nitrito FROM parametrosfq WHERE id_cultivo = $cultivo GROUP BY rango_nitrito ORDER BY rango_nitrito DESC LIMIT 1;";
		$consulta3 = "SELECT rango_nitrato, COUNT(rango_nitrato) AS total_rango_nitrato FROM parametrosfq WHERE id_cultivo = $cultivo GROUP BY rango_nitrato ORDER BY rango_nitrato DESC LIMIT 1;";
		$consulta4 = "SELECT rango_ph, COUNT(rango_ph) AS total_rango_ph FROM parametrosfq WHERE id_cultivo = $cultivo GROUP BY rango_ph ORDER BY rango_ph DESC LIMIT 1;";
		$consulta5 = "SELECT cant_melaza, COUNT(cant_melaza) AS total_cant_melaza FROM parametrosfq WHERE id_cultivo = $cultivo GROUP BY cant_melaza ORDER BY cant_melaza DESC LIMIT 1;";
		$consulta6 = "SELECT porc_agua, COUNT(porc_agua) AS total_porc_agua FROM parametrosfq WHERE id_cultivo = $cultivo GROUP BY porc_agua ORDER BY porc_agua DESC LIMIT 1;";
		$resultado1 = $mysqli->query($consulta1);
		$resultado2 = $mysqli->query($consulta2);
		$resultado3 = $mysqli->query($consulta3);
		$resultado3 = $mysqli->query($consulta4);
		$resultado3 = $mysqli->query($consulta5);
		$resultado3 = $mysqli->query($consulta6);

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
			$pdf->Cell(95, 12, 'Rango de Amonio', '1', 0, 'C',true);
            $pdf->Cell(95, 12,number_format($row['prom_rango_amonio'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Rango de Nitrito', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_rango_nitrito'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Rango de Nitrato', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_rango_nitrato'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Rango de ph', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_rango_ph'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Cant de Melaza', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_cant_melaza'],0), '1', 1, 'C',true);
			$pdf->Cell(95, 12, 'Porcentaje de Agua', '1', 0, 'C',true);
            $pdf->Cell(95, 12, number_format($row['prom_porc_agua'],0), '1', 1, 'C',true);
		}

		$pdf->Output();

	}else{
		echo 'Reporte no generado';
	}


?>