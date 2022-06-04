<style type="text/css" media="screen">
	
html, body{
	height: 100%;
	width: 100%;
	font-family: "Poppins", sans-serif;
	color: #222;
}

h2, .text-info{
	color: #a80808!important;
}

.btn-primary {
    color: #fff;
    background-color: #a80808;
    border-color: #007bff;
}

.btn-primary:hover {
    color: #fff;
    background-color: #a80808;
    border-color: #007bff;
}

a{
	color: #a80808;
}

</style>
<?php

echo "Hello <b id='welcome'><i>" .$pass['UName'] . " </i> !</b>";
echo "<br/>";
echo "<br/>";
echo "<br/>";

$load = "<a href = " . base_url() . "index.php/Profile_employers/index_employers>here</a>";
echo "To continue press " . $load;
