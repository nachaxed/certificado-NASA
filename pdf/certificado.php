<?php
    require_once "../../../controlador/usuarios.php";
    require_once "../../../modelo/usuarios.php";
    
    //aca generamos certificado
    require_once ('./tcpdf_include.php');
    
 class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = 'Certificados Space Apps 2021 mailing prueba-05.jpg';
        $this->Image($img_file, 0, 0, 300, 209, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}
    class generarCertificado{
        public $email;
        
        public function generar(){
            $usuario = controladorUsuarios::leerUsuario("Email", $this->email);
            
            
            $pdf = new MYPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false );
           // $pdf -> startPageGroup();
            $pdf -> AddPage('L','A4');
           // $pdf -> SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
           // $pdf -> setHeaderMargin(0);
           // $pdf -> setFooterMargin(0);
           // $pdf -> setPrintFooter(false);
           // $pdf -> setImageScale(PDF_IMAGE_SCALE_RATIO);
           // $pdf -> Image('Certificados Space Apps 2021 mailing prueba-05.jpg', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);   
            
            $html = //escribir el pdf aca, para que se genere el nombre tenemos que hace $usuario[Nombres] $usuario[Apellido]  
             <<<EOF
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="">
                    <title>certificado NASA</title>
                </head>
                <body>
                    <h1 style="position:relative;top:120px;"> Presentamos este reconocimiento a: </h1>
                    <p></p>
                    <span style="display:none; position:relative;">$usuario[Nombres]</span>
                    <span style="display:none;position:relative;">$usuario[Apellido]</span>
                        
                </body>
                </html>
            EOF; 

            
              $pdf->writeHTML($html, true, false, true, false, '');
            // $pdf -> generarCertificado($html, false, false, false, false, '');
            //$pdf-> writeHTML(false, false, '', $pdf, 0, 1, 0, false, '', false);
            //$pdf->writeHTML($html, false, false, false, false, ''); 
       
            ob_end_clean();
            $pdf -> Output("certificado-$usuario[DNI].pdf",'I');
        } 
    }
$certificado = new generarCertificado();
    $certificado -> email = $_GET ['email'];
    $certificado -> generar();