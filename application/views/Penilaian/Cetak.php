<?php 
       

        $pdf = new FPDF('L','mm','A4');
        // $pdf = new FPDF('L','mm',[130,160]);
        $pdf->AddFont('bookman','','bookman-old-style.php');
        // $pdf->AddFont('tahoma','B','tahomabd.php');
        // $pdf->AddFont('tahoma','','tahoma.php');
        // $pdf->AddFont('bookatik','B','book-antiqua.php');
        $pdf->SetTitle('Hasil Penilaian Magang');
    
    // function date_lengkap($date)
	// {
	// 	$tgl = date_create($date);
	// 	return date_format($tgl, "d M Y");
	// }

    $bulan_skrg = date("m");
        if($bulan_skrg == 01){
            $bulan_string = "Januari";
        } elseif ($bulan_skrg == 02){
            $bulan_string = "Februari";
        } elseif ($bulan_skrg == 03){
            $bulan_string = "Maret";
        } elseif ($bulan_skrg == 04){
            $bulan_string = "April";
        } elseif ($bulan_skrg == 05){
            $bulan_string = "Mei";
        } elseif ($bulan_skrg == 06){
            $bulan_string = "Juni";
        } elseif ($bulan_skrg == 07){
            $bulan_string = "Juli";
        } elseif ($bulan_skrg == '08'){
            $bulan_string = "Agustus";
        } elseif ($bulan_skrg == '09'){
            $bulan_string = "September";
        } elseif ($bulan_skrg == '10'){
            $bulan_string = "Oktober";
        } elseif ($bulan_skrg == '11'){
            $bulan_string = "Nopember";
        } else {
            $bulan_string = "Desember";
    }

        // foreach ($data as $row) {
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        // $pdf->SetFont('Times','B',16);
        // mencetak string
        // foreach ($data as $row){
            
        // }
        
    
        $pdf->Image('assets/1.png',23,11,15);
        
        $pdf->Ln(7);
        $pdf->SetFont('arial','B',13);
        $pdf->Cell(30,0,'','0','0','L',false);
        $pdf->Cell(0,1,'Hasil Penilaian Magang','0','1','L',false);

        $pdf->Ln(4);
        $pdf->SetFont('arial','B',13);
        $pdf->Cell(30,0,'','0','0','L',false);
        $pdf->Cell(0,1,'Fakultas Ilmu Kesehatn Universitas Ibrahimy','0','1','L',false);
        
        $pdf->Line(10,26,280,26);
        $pdf->Line(10,26.5,280,26.5); 
        
        $pdf->SetLineWidth(0.1);
        $pdf->Ln(9);
        
        // $pdf->Ln(8);
        // $pdf->SetFont('arial','B',11);
        // $pdf->Cell(45,0,'','0','0','L',false);
        // $pdf->Cell(0,1,'','0','1','L',false);

        $pdf->Ln(3);
        $pdf->SetFont('arial','B',10);
        // $pdf->Cell(5,5,'','0','0','L',false);
        $pdf->Cell(10,5,'No',1,'0','C',false);
        $pdf->Cell(30,5,'Nama Lengkap ',1,'0','C',false);
        $pdf->Cell(25,5,'Nilai Bulan 1',1,'0','C',false);
        $pdf->Cell(25,5,'Nilai Bulan 2',1,'0','C',false);
        $pdf->Cell(25,5,'Nilai Bulan 3',1,'0','C',false);
        $pdf->Cell(30,5,'Test Mengajar',1,'0','C',false);
        $pdf->Cell(30,5,'Total Nilai',1,'0','C',false);
        $pdf->Cell(30,5,'Keputusan',1,'0','C',false);
        $pdf->Cell(35,5,'Status',1,'0','C',false);
        $pdf->Cell(30,5,'Tgl Menilai',1,0,'C',false);
        // $pdf->Cell(10,5,'Penilai',1,'0','C',false);

        $pdf->Ln(6);
        $pdf->SetFont('arial','',9);
        $no = 1;
        foreach($data as $key) {
            $pdf->Cell(10,5,$no++,1,'0','C',false);
            $pdf->Cell(30,5,$key->nama_pelamar,1,'0','C',false);
            $pdf->Cell(25,5,$key->nilai_bulan1,1,'0','C',false);
            $pdf->Cell(25,5,$key->nilai_bulan2,1,'0','C',false);
            $pdf->Cell(25,5,$key->nilai_bulan3,1,'0','C',false);
            $pdf->Cell(30,5,$key->tes_mengajar,1,'0','C',false);
            $pdf->Cell(30,5,$key->total_nilai,1,'0','C',false);
            $pdf->Cell(30,5,$key->keputusan,1,'0','C',false);
            $pdf->Cell(35,5,$key->status_lanjut,1,'0','C',false);
            $pdf->Cell(30,5,$key->tgl_penilaian,1,'1','C',false);
            // $pdf->Cell(10,5,$key->yang_menilai,1,1,'C',false);
        }
    
       
        $hariini = date('d-M-y');

        $pdf->Ln(9);

        $pdf->SetFont('arial','',11);
        $pdf->Cell(200,0,'','0','0','L',false);
        $pdf->Cell(0,1,'Sukorejo, '.date('d').' '.$bulan_string.' '.date('Y'),'0','1','L',false);
        $pdf->Ln(4);
        $pdf->SetFont('arial','',11);
        $pdf->Cell(200,0,'','0','0','L',false);
        $pdf->Cell(0,1,'Dekan,','0','1','L',false);
        $pdf->Ln(10);
        $pdf->SetFont('arial','',11);
        $pdf->Cell(200,0,'','0','0','L',false);
        $pdf->Cell(0,1,'_____________','0','1','L',false);

       
        $pdf->Output();

?>
