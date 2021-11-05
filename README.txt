Simone Ocvirk, ocvirks, 400232179
Yiqi Huang, huany132, 400189575

Website URL:	https://18.217.210.172/index.html 
Github:		https://github.com/simoneocvirk/Web-Beginners.git 

INFO FROM PART 1:

We did both add on task 1 and 2. Comments throughout the html files indicate where this is, and the answers to task 2 questions are below.

Add-On Task 2 

i. Describe briefly the different versions of graphics provided in step 2(a); 
	include a sample of HTML code and explain how the different selectors 
	work together.

	The graphics included in our website are the two pictures of a map 
	indicating where Bridges and LaPiazza are on the results_sample page and 
	the image of the map indicating where Bridges is on the individual_sample 
	page. 

	HTML Example:
		<picture>
			<!-- the line below indicates that if the width of the 
				screen is more than 475 pixels which is the size 
				of the larger image, to render the large/more
				 defined image --> 
			<source media="(min-width: 475px)" 
				srcset="src/Bridges2x.png"/> 
			<!-- the line below indicates that if the width of the 
				screen is less than 475 pixeks which is the size 
				of the larger image, to render the smaller/less 
				defined image --> 
			<source media="(max-width: 474px)" 
				srcset="src/Bridges1x.png"/> 
			<!-- the line below is only for older OS versions that 
				are not compatible with the <source> and <picture> 
				tags --> 
			<img src="src/Bridges1x.png"/> 
		</picture>

ii. List three positive goals that can be achieved using HTML5 <picture> and 
	<source> attributes.

	1. Allows for more versatility, by having alternative pictures. 
	2. Can have multiple copies of an image to be switched in an out 
		depending on parameters. 
	3. Saves bandwidth since the correct format for the display is displayed. 


iii. List one negative about using HTML5 <picture> and <source> attributes. 
	How can this negative be mitigated? 

	Does not work on some older OS versions. This negative can be mitigated by 
	a line to enter the image using the <img> tag incase <picture> and <source> 
	are not available on someone's machine.
