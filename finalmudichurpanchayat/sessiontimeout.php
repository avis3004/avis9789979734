 <?PHP
  
  if (isset($_SESSION['username']))
  {
   $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost/avis9789979734/finalmudichurpanchayat/startfile.php'>Login here</a>";
        }
		else { 
        
        }
  }
  
  ?>