var page = require('webpage').create();

page.onResourceReceived = function(response) {
    if (response.stage !== "end") return;
    console.log('Response (#' + response.id + ', stage "' + response.stage + '"): ' + response.url);
};
page.onResourceRequested = function(requestData, networkRequest) {
    console.log('Request (#' + requestData.id + '): ' + requestData.url);
};
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

page.open("https://gst.customs.gov.my/tap/_/#1", function(status){
    page.evaluate(function(){
        
        var e = document.createEvent('MouseEvents');
        e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        document.querySelector("a#cl_b-i").dispatchEvent(e);
    });
	
	setTimeout(function(){

		page.evaluate(function(){
			
			var e = document.createEvent('MouseEvents');
			e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
			document.querySelector("input#d-8").dispatchEvent(e);
		
			setTimeout(function(){
				
				var e = document.createEvent('MouseEvents');
				e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
				document.querySelector("input#d-9").dispatchEvent(e);   

				setTimeout(function(){
					
					document.getElementById("d-9").focus();
					document.getElementById("d-9").value = "MYDIN"; 

					setTimeout(function(){
					
						document.getElementById("d-7").focus();
						
						setTimeout(function(){
					
							document.getElementById("d-7").focus();
					
						}, 1000);
					
					}, 1000);
				   
				}, 1000);

			}, 1000);
			
		});

 }, 10000);
 
	setTimeout(function(){
			var fs = require('fs');
			var path = 'gstscrape.html' 
			var content = page.content;
			fs.write(path,content,'w')
			phantom.exit()   
	}, 15000);





});