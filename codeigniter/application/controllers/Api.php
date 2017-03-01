<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
		echo "in api controller constructor";

		$GLOBALS['data'] = array();
	}

	//en
	//ar

	public function registerUser(){
		$this->load->database();

		$data = $_POST;

		$id = $data['sessionId'];

		$this->db->where('sessionId',$id);
		$q = $this->db->get('register');

		if ($q->num_rows() > 0) 
		{
			$this->db->where('sessionId',$id);
			$this->db->update('register',$data);

			$this->load->library('session');
			$lang = $this->session->userdata('lang');
			
			$q = $this->db->get('register');
			$ret = $q->result();
			$GLOBALS['data'][] = $ret;
			$GLOBALS['data'][] = $this->getListings($lang);

			$this->sendEmail();//send an email
		} else {
			$this->db->set('sessionId', $id);
			$this->db->insert('register',$data);
		}

		$response = array(
		    "register" => array(
							    	"result" => $q
								)
		);

		print_r(json_encode($response));

		return $response;
	}


	public function sendEmail(){

		$email = "";
		$items = "";
		$listings = "";
		$firstname = "";

		if(isset($GLOBALS)){
			//echo "<pre>";
//				print_r($GLOBALS["data"]);
				//print_r($GLOBALS["data"][0][0]->email);
				//print_r($GLOBALS["data"][1]["listings"]);
			//echo "</pre>";

			$email = $GLOBALS["data"][0][0]->email;
			$items = $GLOBALS["data"][0][0]->items;
			$firstname = $GLOBALS["data"][0][0]->firstName;

			$listings = $GLOBALS["data"][1]["listings"];
		}
			
			$items = explode(",", $items);

			$listingsdescription = array_column($listings, 'description', 'id');
			$listingsfulldescription = array_column($listings, 'fulldescription', 'id');
			
			$selectedItems = array();
			foreach ($items as $value) {
				$i = array(
					"id" => $value,
					"description" => $listingsdescription[$value],
					"fulldescription" => $listingsfulldescription[$value],
				);

				$selectedItems[] = $i;
			}

		$to = $email;//'rob.shan.lone@gmail.com';
		$subject = "Thanks for Entering the competition";

		/*
		$htmlContent = '
		    <html>
		    <head>
		        <title>Welcome to CodexWorld</title>
		    </head>
		    <body>
		        <h1>Thanks you for joining with us!</h1>
		        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;">
		            <tr>
		                <th>Name:</th><td>CodexWorld</td>
		            </tr>
		            <tr style="background-color: #e0e0e0;">
		                <th>Email:</th><td>contact@codexworld.com</td>
		            </tr>
		            <tr>
		                <th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td>
		            </tr>
		        </table>
		    </body>
		    </html>';*/

		$htmlContent ='
			<html>
			<head>
			<title>Thankyou for registering with Visit Britain & Qatar Airways</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			</head>
			<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

			<table id="Table_01" width="600" border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
				<tr>
					<td colspan="5" width="600" height="44" style="font-size: 14px; font-family: tahoma, helvetica, sans serif; color: #662046; text-align: center;">
					Thankyou for registering with Visit Britain & Qatar Airways
					</td>
				</tr>
				<tr bgcolor="#662046">
					<td colspan="6" bgcolor="#662046">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_02.png" width="600" height="73" alt=""></td>
				</tr>
				<tr bgcolor="#662046">
					<td colspan="6" bgcolor="#662046">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_03.jpg" width="600" height="202" alt=""></td>
				</tr>
				<tr>
					<td colspan="3">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_04.png" width="33" height="216" alt=""></td>
					<td style="color: #454545; font-size: 16px; text-align: left; font-family: tahoma, helvetica, sans serif; line-height: 20px;">
					Thanks '.$firstname.' for signing up to our newsletter.<br/>
						<br/>
						You’re now in the running to win an exclusive trip to the UK courtsey of<br/>
						Qatar Airlines and Visit Britain.<br/>
						<br/>
						Here are your chosen moments but don’t forget to check out<br/>
						<a href="http://en.omgb.com/" style="text-decoration: underline; font-weight: bold; color: #454545;">VisitBritain.com</a> to discover more unique OMGB experiences.
					
					</td>
					<td colspan="2">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_06.png" width="33" height="216" alt=""></td>
				</tr>
				<tr bgcolor="#662046">
					<td colspan="6" bgcolor="#662046">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_07.png" width="600" height="99" alt=""></td>
				</tr>
				<tr bgcolor="#662046">
					<td bgcolor="#662046">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_08.png" width="1" height="3" alt=""></td>
					<td bgcolor="#662046">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_09.png" width="29" height="3" alt=""></td>
					<td bgcolor="#662046" colspan="3">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_10.png" width="541" height="3" alt=""></td>
					<td bgcolor="#662046">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_11.png" width="29" height="3" alt=""></td>
				</tr>';

			foreach ($selectedItems as $val) {
				$htmlContent .='<tr>
					<td colspan="6" bgcolor="#662046" style="color:#ffffff; font-size: 14px; line-height: 23px; font-family: tahoma, helvetica, sans serif; padding: 0 30px 0 30px;">
					<br/>
					<span style="font-size: 28px; font-weight: bold; line-height: 33px; color:#ffffff;">'.$val["description"].'</span>
					<br/>
					<span style="color:#ffffff;">'.$val["fulldescription"].'</span>
					<br/>
					<img src="http://discoverbritainnow.com/assets/images/assets/square/'.$val["id"].'.jpg" width="100px">
					</td>
				</tr>';				
			}

			/*

					<img src="http://discoverbritainnow.com/assets/images/assets/square/'.$val["id"].'.jpg" width="100px">
			*/


			$htmlContent .='<tr>
					<td colspan="6">
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/email_template_13.png" width="600" height="73" alt=""></td>
				</tr>
				<tr>
					<td>
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/spacer.gif" width="1" height="1" alt=""></td>
					<td>
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/spacer.gif" width="29" height="1" alt=""></td>
					<td>
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/spacer.gif" width="3" height="1" alt=""></td>
					<td>
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/spacer.gif" width="534" height="1" alt=""></td>
					<td>
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/spacer.gif" width="4" height="1" alt=""></td>
					<td>
						<img src="http://www.inflectordct.com/email/visit_britain/qatar/confirmation/en/spacer.gif" width="29" height="1" alt=""></td>
				</tr>
			</table>
			<!-- End Save for Web Slices -->
			</body>
			</html>';


		// Set content-type header for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// Additional headers
		$headers .= 'From: Visit Britain<sender@example.com>' . "\r\n";
		//$headers .= 'Cc: welcome@example.com' . "\r\n";
		//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

		// Send email
		
		if(mail($to,$subject,$htmlContent,$headers)):
		    $successMsg = 'Email has sent successfully.';
		else:
		    $errorMsg = 'Email sending fail.';
		endif;
		

	}


	public function getListings($lang){
		 
		$this->load->database();
	
		$sql = "SELECT * FROM listings ORDER BY markerSize ASC";

		/*	
		$sql = "SELECT 
			AVG(`160812 - land registry avg soldprice jan 2010 - mar 2016`.`Value`) AS 'average'
			FROM
			`160812 - land registry avg soldprice jan 2010 - mar 2016`
			WHERE `160812 - land registry avg soldprice jan 2010 - mar 2016`.`Area` LIKE ?
			AND `160812 - land registry avg soldprice jan 2010 - mar 2016`.`Property` = ?
			AND `160812 - land registry avg soldprice jan 2010 - mar 2016`.`Year` = ?
			GROUP BY `160812 - land registry avg soldprice jan 2010 - mar 2016`.Property,`160812 - land registry avg soldprice jan 2010 - mar 2016`.Year
			ORDER BY
			`160812 - land registry avg soldprice jan 2010 - mar 2016`.Property ASC";

		*/

		//$query = $this->db->query($sql, array("%".$postcode."%", $propertyshort, $year));

		$query = $this->db->query($sql, array());

		//name the resource
		$results = array();

		foreach ($query->result_array() as $row){
			$id = $row['id'];

			if($lang == "ar"){
				$description = $row['roll-over-description-arabic'];
				$fulldescription = $row['full-description-arabic'];
				$shortdescription = $row['short-description-arabic'];
			}else{
				$description = $row['roll-over-description-english'];
				$fulldescription = $row['full-description-english'];
				$shortdescription = $row['short-description-english'];
			}

			$results[] = array(
			 	"id" => $id,
			 	"description" => $description,
			 	"fulldescription" => $fulldescription,
			 	"shortdescription" => $shortdescription,
			 	"location" => $row['location'],
			 	"posx" => $row['posx'],
			 	"posy" => $row['posy'],
			 	"markerSize" => $row['markerSize']
			);
		}

		$response = array(
			"listings" => $results
		);


		//if called directly print out the response
		//if($this->is_called_via_master($this)){
			print_r(json_encode($response));
		//}

		//return response
		return $response;
	}

	/*
	public function index()
	{
		$this->load->view('welcome_message');
	}
	*/
}