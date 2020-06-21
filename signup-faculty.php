<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>


    <link rel="stylesheet" href="fontss/material-icon/css/material-design-iconic-font.min.css">

    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="./php/registerfaculty.php" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="name" id="name" placeholder="Your Name"/>
                        </div>
                       
                        <div class="form-group">
                            <input type="text" class="form-input" name="faculty-id" id="faculty-id" placeholder="Faculty-id"/>
                        </div>
			
			<div class="form-group">
                            <input type="text" class="form-input" name="dep-id" id="dep-id" placeholder="Department-id"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/>
                           
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password" placeholder="Repeat your password"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
<div style="display: none" id="message"><?php if(isset($_GET["message"]))
                                  echo $_GET["message"]; ?>
          
          </div> <br>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login-faculty.php" class="loginhere-link">Login here</a><br><br>
                        Want to go back? <a href ="index.html" class="loginhere-link">Click here</a> 
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    
    <script src="js/mains.js"></script>
</body>
</html>