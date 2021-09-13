<?php
    require_once "../../../controlador/usuarios.php";
    require_once "../../../modelo/usuarios.php";
    
    //aca generamos certificado

    class generarCertificado{
        public $dni;
        public function generar(){
            $usuario = controladorUsuarios::leerUsuario($this->dni);
            require_once ('./tcpdf_include.php'); //modificar ruta 
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false );
            $pdf -> startPageGroup();
            $pdf -> AddPage();
            $html = '
                <<<EOF
                    <span>$usuario[Nombres]</span><br>
                    <span>$usuario[Apellido]</span><br>
                    <span>$usuario[Email]</span><br>
                    <span>$usuario[DNI]</span>
            EOF ';
            // $pdf -> generarCertificado($html, false, false, false, false, '');
            // $pdf-> writeHTML(false, false, '', $pdf, 0, 1, 0, false, '', false);
            $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
            ob_end_clean();
            $pdf -> Output("certificado.pdf",'D');
        } 
    }
$certificado = new generarCertificado();
    $certificado -> dni = $_GET ['dni'];
    $certificado -> generar();
    ob_end_clean();