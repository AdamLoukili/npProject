<?php 
    session_start();
    include 'header.php'; 
?>
    
<script>
  fetch("https://animenewsnetwork.p.rapidapi.com/api.xml?anime=1&manga=1&title=1", {
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "animenewsnetwork.p.rapidapi.com",
		"x-rapidapi-key": "86296cf3d7mshb0c29553f77555dp1c94bajsn018ea3159b95"
	}
})
.then(response => {
	console.log(response);
})
.catch(err => {
	console.log(err);
});
</script>
 <!-- ---------------------- This Is Footer Part -------------------- -->
    <?php include 'footer.php'; ?>
    <script scr="js.js"></script>
