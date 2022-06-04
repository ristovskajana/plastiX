<style type="text/css" media="screen">
	
html, body{
	height: 100%;
	width: 100%;
	font-family: "Poppins", sans-serif;
	color: #222;
}

h2, .text-info{
	color: #0e6929!important;
}

.btn-primary {
    color: #fff;
    background-color: #0e6929;
    border-color: #6a9e79;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0e6929;
    border-color: #6a9e79;
}

a{
	color: #0e6929;
}

</style>

<?php

echo "Hello <b id='welcome'><i>" .$pass['UName'] . " " . $pass['USurname']. "</i> !</b>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

$load = "<a href = " . base_url() . "index.php/Profile_actors/index_actors>here</a>";
echo "To continue press " . $load;
