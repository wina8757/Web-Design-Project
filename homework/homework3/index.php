<!DOCTYPE html>
<html>
    <head>
        <title> Quiz</title>
    </head>
    <body>
         
        <style>
            @import url("css/styles.css");
        </style>
        
        <div id="page-wrap">
            
		<h1><u>HTML Quiz</u></h1>
		
		<form action="inc/functions.php" method="post" id="quiz">
		<label for="fname">First Name:</label>
        <input id="fname" type="text" name="fname" placeholder ="fname" >
        <br/><br/>
        <label for="lname">Last Name :</label>
        <input id="lname" type="text" name="lname" placeholder ="lname" >
        <br/><br/>
        <label for="id">ID number  :</label>
        <input id="id" type="text" name="id" placeholder = "id"  >
        <br/><br/>
        <input id="male" type="checkbox" name="gender" value="male" placeholder ="male">
        <label for="male">Male</label>
        <input id="female" type="checkbox" name="gender" value="female" placeholder ="female">
        <label for="female">Female</label>
        <br/><br/>
        
		<!--<form action="inc/functions.php" method="post" id="quiz">-->
            <ol>
                
                
                <li>
                
                    <h3>CSS Stands for...</h3>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Computer Styled Sections </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) Cascading Style Sheets</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) Crazy Solid Shapes</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) None of the above</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>What HTML Form method should be used when submitting confidential information?</h3>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) GET</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) POST</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) Password</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) Encrypted</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Who is making the Web standards?</h3>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) Mozilla</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) The World Wide Web Consortium</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Google</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) Microsoft</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Choose the correct HTML element to define important text</h3>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="A" />
                        <label for="question-4-answers-A">A) Strong</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="B" />
                        <label for="question-4-answers-B">B) important </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="C" />
                        <label for="question-4-answers-C">C) i </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="D" />
                        <label for="question-4-answers-D">D) b </label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Which HTML attribute specifies an alternate text for an image, if the image cannot be displayed?</h3>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="A" />
                        <label for="question-5-answers-A">A) title </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="B" />
                        <label for="question-5-answers-B">B) src </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="C" />
                        <label for="question-5-answers-C">C) longdesc </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="D" />
                        <label for="question-5-answers-D">D) alt </label>
                    </div>
                
                </li>
            
            </ol>
            <input type="submit" value="Submit Quiz" />
		    <input type="reset" value="Reset" />

		</form>
	        
	</div>

    <hr id="footer_hr">
        <footer>
            <br />
            <div id="footer_content">
                
            <div id="Img">
                <img  src="img/buddy.png" alt="BUDDY Logo"/>
            </div> 
            
            <div id="Text">
            <link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
             Designed by Jessen.<br />
             <strong>&copy;</strong> 2017 Proved by MY BUDDY<br />
            </div>
            
            </div>
            
        </footer>
    </body>
</html>