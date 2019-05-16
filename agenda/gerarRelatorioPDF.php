<?php

    require_once ('fpdf/fpdf.php');
    require_once ('Classes/ContatoDAO.php');
    require_once ('Classes/TelefoneDAO.php');
    require_once ('Classes/Telefone.php');
    require_once ('Classes/UsuarioDAO.php');
    require_once ('Classes/Usuarios.php');

    $pdf = new FPDF();
    $usuario = new UsuarioDAO(new Usuarios());
    $contato = new Contatos();
    $meu_contato = new ContatoDAO($contato);
    $meu_telefone = new TelefoneDAO(new Telefone());

    $title = 'Lista de Contatos';
    $pdf->SetTitle($title);

    $usuarioDono = $usuario->find($_SESSION['id']);

    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(40,10,utf8_decode('Contatos de '.$usuarioDono["nome"]),0,0,"c");
    $pdf->Ln(15);

    $pdf->SetFont('Arial',"B",10);
    $pdf->Cell(40,7,"Nome",1,0,"C");
    $pdf->Cell(60,7,"Email",1,0,"C");
    $pdf->Cell(30,7,"Data de Nasc.",1,0,"C");
    // $pdf->Cell(30,7,"Telefone",1,0,"C");
    $pdf->Cell(30,7,"Tipo",1,0,"C");
    $pdf->Ln();

    $pdf->SetFont('Arial',"",10);
    
    $telefones = "";

    foreach($meu_contato->findAllCompleto($_SESSION['id']) as $key => $value):
        foreach($meu_telefone->findAllTelefone($value->id) as $key => $telefoneDoBanco):
            $telefones = $telefones . $telefoneDoBanco->numero . " / ";
        endforeach;
        $pdf->Cell(40,7,utf8_decode($value->nome),1,0,"C");
        $pdf->Cell(60,7,utf8_decode($value->email),1,0,"C");
        $pdf->Cell(30,7,utf8_decode($value->dtnasc),1,0,"C");
        $pdf->Cell(30,7,utf8_decode($value->tipo),1,0,"C");
        $pdf->Ln();
        $pdf->Cell(160,7,utf8_decode($telefones),1,0,"C");
        $pdf->Ln();
        $telefones = "";    
    endforeach;

$pdf->Output();

?>
