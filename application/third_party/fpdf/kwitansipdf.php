<?php
// require_once APPPATH."/third_party/fpdf/fpdf-1.8.php";
class KWITANSIPDF extends FPDF
{
  public function __construct(){
    parent::__construct();
    // $this->FPDF("P","cm",array(100,150));
  }
  // Page header
  function Header()
  {
  // Logo
      $this->Image(base_url().'assets/logo/logo.png',34,5,30);
      // Arial bold 15
      // Move to the right
      $this->Ln(16.5);
      // Title
    $this->SetFont('Aprille Display Caps SSi','',15);
    $this->Cell(0,5,'KUITANSI PENDAFTARAN SANTRI BARU','0','1','C',false);

    $this->SetFont('Arial','B',10);
    $this->Cell(0,7,'PP SALAFIYAH SYAFI\'IYAH SUKOREJO SITUBONDO','0','1','C',false);

    $this->SetFont('Arial','',9);
    $date = date("Y");
    $now = $date + 1;
    $this->Cell(0,1,'TAHUN PELAJARAN '.$date.'/'.$now,'0','1','C',false);
    // $this->ln(5);
  }

  function garis(){
    $this->SetLineWidth(0.5);
    $this->Line(5,32,94,32);
    $this->SetLineWidth(0);
    $this->Line(5,33,94,33);
  }

  
}
?>