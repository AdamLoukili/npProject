<?php 
    session_start();
	include 'header.php';
	/* API */ 
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://animenewsnetwork.p.rapidapi.com/api.xml?anime=~a", /*api.xml?anime=~ / reports.xml?id=155&type=anime&nlist=50 */
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"x-rapidapi-host: animenewsnetwork.p.rapidapi.com",
			"x-rapidapi-key: 86296cf3d7mshb0c29553f77555dp1c94bajsn018ea3159b95"
		),
		header("Access-Control-Allow-Origin: *"),
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0),
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
	?>
		<section class="newsMan">
		  <?php echo $response; ?>
		</section>
	<?php
	}
	?>
 <!-- ---------------------- This Is Footer Part -------------------- -->
    <?php include 'footer.php'; ?>
