<?php

function randomChar()
{
	return uniqid(mt_rand(1000, 9999));
}

$company_no = $_GET['no'];
$filename = randomChar();

$js = "var page = require('webpage').create();

page.onUrlChanged = function(targetUrl) {
    console.log('New URL: ' + targetUrl);
};
page.onLoadFinished = function(status) {
    console.log('Load Finished: ' + status);
};
page.onLoadStarted = function() {
    console.log('Load Started');
};
page.onNavigationRequested = function(url, type, willNavigate, main) {
    console.log('Trying to navigate to: ' + url);
};

page.open('https://gst.customs.gov.my/tap/_/#1', function(status){
    page.evaluate(function(){
        var e = document.createEvent('MouseEvents');
        e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        document.querySelector('a#cl_b-i').dispatchEvent(e);
    });
	
	setTimeout(function(){

		page.evaluate(function(){
			
			var e = document.createEvent('MouseEvents');
			e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
			document.querySelector('input#d-6').dispatchEvent(e);
		
			setTimeout(function(){
				
				var e = document.createEvent('MouseEvents');
				e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
				document.querySelector('input#d-7').dispatchEvent(e);   

				setTimeout(function(){
					
					document.getElementById('d-7').focus();
					
					document.getElementById('d-7').value = '$company_no'; 

					setTimeout(function(){
						
						setTimeout(function(){
					
							document.getElementById('d-9').focus();
					
						}, 1000);
					
					}, 1000);
				   
				}, 1000);

			}, 1000);
			
		});

 }, 1000);
 
	setTimeout(function(){
			var fs = require('fs');
			var path = '$filename.html' 
			var content = page.content;
			fs.write(path,content,'w')
			phantom.exit()   
	}, 6000);

});";

if (file_put_contents($filename.".js",$js))
{
	//execute phantomjs
	exec('phantomjs '.$filename.'.js', $output, $val);

	if (!$val)
	{
		include('ganon.php');

		$html = file_get_dom($filename.".html");

		$output_arr = array();

		foreach($html('td[class]') as $element) {
			$output_arr[] = $element->getPlainText();

		}

		unlink($filename.".html");
		unlink($filename.".js");

		header('Content-Type: application/json');
		print json_encode($output_arr);
	}

}
else
{
	print("unable to generate file");
}

?>