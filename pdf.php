<?php
    // error_reporting(E_ALL);
    include("koneksiodbc.php"); 
    // require_once('PHPExcel/Classes/PHPExcel/IOFactory.php');
    require_once('PHPExcel/Classes/PHPExcel.php');
    // include("PHPExcel/Classes/PHPExcel/Writer/Excel2007.php");
    ini_set('max_execution_time', '1000000');

    $rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;
    $rendererLibrary = 'mPDF5.4';
    $rendererLibraryPath = dirname(__FILE__).'/'. $rendererLibrary;

    // // We'll be outputting an excel file
    // header('Content-type: application/pdf');

    // // It will be called file.xls
    // header('Content-Disposition: attachment; filename="file.pdf"');

    // GET
    $email = $_GET['email'];
    $nama = $_GET['nama'];
    $tgl = $_GET['tgl'];

    //create PHPExcel object
    $excel = new PHPExcel();

    //coloring cell
    function cellColor($cells,$color) {
        global $excel;
        if ($color != "") {
            $excel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => $color,
                )
            ));
        }
    }

    // give borders
    function giveBorders($cells) {
        global $excel;
        $excel->getActiveSheet()->getStyle($cells)->applyFromArray(array(
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ),
                'vertical' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                ),
                'horizontal' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        ));
    }

    // give borders top
    function giveBordersTop($cells) {
        global $excel;
        $excel->getActiveSheet()->getStyle($cells)->getBorders()->getTop()->applyFromArray(
            array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,
                'color' => array(
                    'rgb' => '000000'
                )
            )
        );
    }

    $excel->setActiveSheetIndex(0);

    $excel->getActiveSheet()
            ->setCellValue('A1', 'HASIL TEST KRAEPLIN (BAGIAN 1)')
            ->setCellValue('A2', 'NAMA : '.$nama.', TANGGAL : '.date('d M Y', strtotime($tgl)));
    
    // SET FONT
    $excel->getActiveSheet()->getStyle('A1:I2')->applyFromArray(array(
        'font' => array(
            'size' => '14',
        )
    ));

    cellColor('K2', "d3d3d3");
    giveBorders('K2');
    $excel->getActiveSheet()->setCellValue('L2', "SOAL");
    cellColor('M2', "F1EB9C");
    giveBorders('M2');
    $excel->getActiveSheet()->setCellValue('N2', "JAWABAN");

    $letter = 'A';
    $letterjawaban = 'B';
    $sql = "SELECT * FROM PUB.kraplin WHERE nkolom <= 20 AND cemail = '$email' AND cnama = '$nama' ORDER BY nkolom asc WITH(NOLOCK)";
    $res = odbc_exec($conn, $sql);
    while ($data = odbc_fetch_array($res)) {
        $verticalcount = 82;
        $counter = 0;
        $soal = explode(",", $data['csoal']);
        $jawaban = explode(",", $data['cjawaban']);
        $kunci = explode(",", $data['ckunci']);
        while($verticalcount >= 4) {
            $excel->getActiveSheet()->setCellValue($letter.$verticalcount, $soal[$counter]);
            cellColor($letter.$verticalcount, "d3d3d3");
            cellColor($letterjawaban.$verticalcount, "F1EB9C");

            if ($counter == 9) {
                giveBordersTop($letter.$verticalcount);
                giveBordersTop($letterjawaban.$verticalcount);
            }
            $verticalcount--;

            if ($verticalcount >= 4) {
                cellColor($letter.$verticalcount, "d3d3d3");
            }
            if ($counter < 39) {
                $excel->getActiveSheet()->getStyle($letterjawaban.$verticalcount)->getAlignment()->setHorizontal('left');
                cellColor($letterjawaban.$verticalcount, "F1EB9C");
                if ($jawaban[$counter] != 's') {
                    $excel->getActiveSheet()->setCellValue($letterjawaban.$verticalcount, $jawaban[$counter]);
                    if ($jawaban[$counter] != $kunci[$counter]) {
                        cellColor($letterjawaban.$verticalcount, "E07171");
                    }
                }
            }
            $counter++;
            $verticalcount--;
        }
        $letter++;
        $letter++;
        $letterjawaban++;
        $letterjawaban++;
    }

    $excel->createSheet();
    $excel->setActiveSheetIndex(1);

    $excel->getActiveSheet()
        ->setCellValue('A1', 'HASIL TEST KRAEPLIN (BAGIAN 2)')
        ->setCellValue('A2', 'NAMA : '.$nama.', TANGGAL : '.date('d M Y', strtotime($tgl)));

    // SET FONT
    $excel->getActiveSheet()->getStyle('A1:I2')->applyFromArray(array(
        'font' => array(
            'size' => '14',
        )
    ));

    $letter = 'A';
    $letterjawaban = 'B';
    $sql = "SELECT * FROM PUB.kraplin WHERE nkolom > 20 AND cemail = '$email' AND cnama = '$nama' ORDER BY nkolom asc WITH(NOLOCK)";
    $res = odbc_exec($conn, $sql);
    while ($data = odbc_fetch_array($res)) {
        $verticalcount = 82;
        $counter = 0;
        $soal = explode(",", $data['csoal']);
        $jawaban = explode(",", $data['cjawaban']);
        $kunci = explode(",", $data['ckunci']);
        while($verticalcount >= 4) {
            $excel->getActiveSheet()->setCellValue($letter.$verticalcount, $soal[$counter]);
            cellColor($letter.$verticalcount, "d3d3d3");
            cellColor($letterjawaban.$verticalcount, "F1EB9C");

            if ($counter == 19 && $data['nkolom'] < 31) {
                giveBordersTop($letter.$verticalcount);
                giveBordersTop($letterjawaban.$verticalcount);
            }
            else if ($counter == 29 && $data['nkolom'] >= 31) {
                giveBordersTop($letter.$verticalcount);
                giveBordersTop($letterjawaban.$verticalcount);
            }
            $verticalcount--;

            if ($verticalcount >= 4) {
                cellColor($letter.$verticalcount, "d3d3d3");
            }

            if ($counter < 39) {
                $excel->getActiveSheet()->getStyle($letterjawaban.$verticalcount)->getAlignment()->setHorizontal('left');
                cellColor($letterjawaban.$verticalcount, "F1EB9C");
                if ($jawaban[$counter] != 's') {
                    $excel->getActiveSheet()->setCellValue($letterjawaban.$verticalcount, $jawaban[$counter]);
                    if ($jawaban[$counter] != $kunci[$counter]) {
                        cellColor($letterjawaban.$verticalcount, "E07171");
                    }
                }
            }
            $counter++;
            $verticalcount--;
        }
        $letter++;
        $letter++;
        $letterjawaban++;
        $letterjawaban++;
    }

    /*Rename sheet*/
    // $excel->getActiveSheet()->setTitle('Emplyoee profile');

    if (!PHPExcel_Settings::setPdfRenderer(
		$rendererName,
		$rendererLibraryPath
	)) {
        die(
            'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
            '<br />' .
            'at the top of this script as appropriate for your directory structure'
        );
    }


    // Redirect output to a client’s web browser (PDF)
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment;filename="01simple.pdf"');
    header('Cache-Control: max-age=0');

    // write the result to a file
    $file = PHPExcel_IOFactory::createWriter($excel, 'PDF');
    $file->save('php://output');
