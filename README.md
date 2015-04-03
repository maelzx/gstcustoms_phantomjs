# Malaysia GST Lookup Status Page scraping project (php trigger phantomjs, reponse in json)

Referring to file index.php & ganon.php

1. File ganon.php in call (via include() function) inside index.php - use for parsing html
2. You still need to have PhantomJS installed - no other way, I just know PhantomJS manage to browse and search on get.customs website
3. You call the index.php via http://yourhost/index.php?no=123456A
4. You need the full company no.
5. The php will then generate the JS file.
6. php will trigger the phantomjs with the newly generated js file
7. phantomjs will go and do the search and grab the full page html of the search result
8. coming back to PHP side, ganon will load the html file.
9. we specifically told ganon to grab all the table
10. we put all the data into array
11. we json_encode the array
12. we print out the json_encode var.
13. done.


# Malaysia GST Lookup Status Page scraping project (phantomjs script)

1. You need to have phantomjs install (not covered here)
2. Run the script by invoke the phantomjs command in command line (cmd)

  phantomjs gstcustoms2.js
  
3. Now it will go through the gst lookup status page
4. Automatically search for "MYDIN"
5. Grab all the page content
6. Save as html to the current directory


Reference / Acknowledgement:
1. Initial script was from this page: http://stackoverflow.com/questions/26270852/how-to-wait-for-a-click-event-to-load-in-phantomjs-before-continuing
2. Team JOMWEB Malaysia, should you reading this :P
