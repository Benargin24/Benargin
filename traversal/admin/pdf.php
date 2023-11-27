<?php

function generateRow(){
	require('connection.php');
		$contents = '';
	 	
		$res=$con->query("select * from `tb_insert`");
		
			while($row=$res->fetch_assoc())
			{
			
			$image=$row['Image'];
                      
	      	
			$contents .= '
			<tr>
				
				<td>'.$row['Guide_Name'].'</td>
				<td>'.$row['Age'].'</td>
				<td>'.$row['Address'].'</td>
				<td>'.$row['Phone_Number'].'</td>
				<td>'.$row['Email'].'</td>
				<td>'.$row['Gender'].'</td>
				<td><img src="images/'.$image.'" width="50" height="50"></td>
				
			</tr>
			';
		}

		
		return $contents;
	}
		

	
	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
      
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = '';  
    $content .= '
      	

      		
      	<table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
         	
			<th>Guide Name</th>
			<th>Age</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Image</th>
			
			
           </tr>  
      ';  
   $content .= generateRow(); 
    $content .= '</table>';  
    $pdf->writeHTML($content);  
    $pdf->Output('Report.pdf', 'I');

?>