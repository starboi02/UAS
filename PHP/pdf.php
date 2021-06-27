<?php

session_start();

if(isset($_POST['download']))
{
    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->setFont("Arial","B",18);
    $pdf->Cell(0,10,"Indian Institute of Information Technology, Allahabad",0,1,'C');
    $pdf->setFont("Arial","",14);
    $pdf->Cell(0,10," Allahabad Devghat, Jhalwa, Prayagraj-211015, U. P. INDIA",0,1,'C');

    $pdf->setFont("Arial","B",16);
    $pdf->Cell(0,10,"Application Form",0,1,'C');
    $pdf->Cell(0,10,"",0,1,'L');

    $pdf->setFont("Arial","B",14);

    $pdf->Cell(90,10,"Application ID: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['ID'],1,1,'C');

    $pdf->Cell(0,10,"",0,1,'L');

    $pdf->setFont("Arial","",14);

    $pdf->Cell(90,10,"Name: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['name'],1,1,'C');

    $pdf->Cell(90,10,"Age: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['age'],1,1,'C');

    $pdf->Cell(90,10,"Gender: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['gender'],1,1,'C');

    $pdf->Cell(90,10,"Address: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['address'],1,1,'C');

    $pdf->Cell(90,10,"Class 10 %: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['class10'],1,1,'C');

    $pdf->Cell(90,10,"Class 12 %: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['class12'],1,1,'C');

    $pdf->Cell(90,10,"Phone No.: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['phone'],1,1,'C');

    $pdf->Cell(90,10,"Email: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['email'],1,1,'C');

    $pdf->Cell(90,10,"Date of Birth: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['dob'],1,1,'C');

    $pdf->Cell(0,10,"",0,1,'C');
    $pdf->setFont("Arial","I",10);
    $pdf->Cell(0,10,"**Kindly download the application form for future reference.**",0,0,'C');
  
    $data = $pdf->output($_SESSION['ID'].".pdf",'D');
}

if(isset($_POST['emailForm']))
{
    require("fpdf/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->setFont("Arial","B",18);
    $pdf->Cell(0,10,"Indian Institute of Information Technology, Allahabad",0,1,'C');
    $pdf->setFont("Arial","",14);
    $pdf->Cell(0,10," Allahabad Devghat, Jhalwa, Prayagraj-211015, U. P. INDIA",0,1,'C');

    $pdf->setFont("Arial","B",16);
    $pdf->Cell(0,10,"Application Form",0,1,'C');
    $pdf->Cell(0,10,"",0,1,'L');

    $pdf->setFont("Arial","B",14);

    $pdf->Cell(90,10,"Application ID: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['ID'],1,1,'C');

    $pdf->Cell(0,10,"",0,1,'L');

    $pdf->setFont("Arial","",14);

    $pdf->Cell(90,10,"Name: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['name'],1,1,'C');

    $pdf->Cell(90,10,"Age: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['age'],1,1,'C');

    $pdf->Cell(90,10,"Gender: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['gender'],1,1,'C');

    $pdf->Cell(90,10,"Address: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['address'],1,1,'C');

    $pdf->Cell(90,10,"Class 10 %: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['class10'],1,1,'C');

    $pdf->Cell(90,10,"Class 12 %: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['class12'],1,1,'C');

    $pdf->Cell(90,10,"Phone No.: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['phone'],1,1,'C');

    $pdf->Cell(90,10,"Email: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['email'],1,1,'C');

    $pdf->Cell(90,10,"Date of Birth: ",1,0,'C');
    $pdf->Cell(90,10,$_SESSION['dob'],1,1,'C');

    $pdf->Cell(0,10,"",0,1,'C');
    $pdf->setFont("Arial","I",10);
    $pdf->Cell(0,10,"**Kindly download the application form for future reference.**",0,0,'C');

    $data = $pdf->output($_SESSION['ID'].".pdf",'F');

    $to = $_SESSION['email']; 
    $from = 'sonkerankush123@gmail.com'; 
    $fromName = 'IIITA Admissions'; 
    $subject = 'Application Form-Regarding';  
    $file = $_SESSION['ID'].".pdf";

    $htmlContent = ' 
        <p>Hey There, Kindly find below the attached PDF file of your application form.</p> '; 
    $headers = "From: $fromName"." <".$from.">";  
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
    if(!empty($file) > 0){ 
        if(is_file($file)){ 
            $message .= "--{$mime_boundary}\n"; 
            $fp =    @fopen($file,"rb"); 
            $data =  @fread($fp,filesize($file)); 
    
            @fclose($fp); 
            $data = chunk_split(base64_encode($data)); 
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
            "Content-Description: ".basename($file)."\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
        } 
    } 
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 

    $mail = @mail($to, $subject, $message, $headers, $returnpath);  
    

}

?>