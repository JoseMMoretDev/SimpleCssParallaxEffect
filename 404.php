<?php
echo "<html><head>";
echo "<title>404 Not Found :D</title>";
echo "<style type='text/css'></style></head><body>";
echo "<h1>Not Found</h1>";
echo "<p>The requested URL ".$_SERVER[REQUEST_URI]." was not found on this server.</p>";
echo "<HR>";
echo '<address>'.$_SERVER['SERVER_SIGNATURE'].'<address>';
http_response_code(404);
?>
</body></html>
