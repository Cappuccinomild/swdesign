<html>
   <head>
      <title>Connect to MariaDB Server</title>
   </head>

   <body>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '1234';
         $conn = new mysqli($dbhost, $dbuser, $dbpass, 'test');

         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }

         echo 'Connected successfully';
         mysql_close($conn);
      ?>
   </body>
</html>
