<?php include ("../template/header.php");?>

<?php
  echo "<center><b>".$message."</b></center><br><br>";
?>
<div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-lg-8">
                <div class="logmod">
                    <div class="logmod__wrapper">
                        <div class="logmod__container">
                            <ul class="logmod__tabs">
                                
                                <li data-tabtar="lgm-2" class="current"><a href="#">with Patient ID</a></li>
                                <li data-tabtar="lgm-1"><a href="#">without Patient ID</a></li>
                            </ul>
                            <div class="logmod__tab-wrapper">
                                <div class="logmod__tab lgm-1">
                                    <div class="logmod__heading">
                                        <span class="logmod__heading-subtitle">Have you filled the Registration form <strong>to book an appointment?</strong></span>
                                    </div>
                                    <form  method="post">
                                        <div class="logmod__form">
                                            <div class="simform">
                                                <div class="sminputs">
                                                    <div class="input full">
                                                        <label class="string optional" for="user-name">User ID *</label>
                                                        <input name="Email_ID" type="text" maxlength="15" id="Email_ID" style="text-transform: uppercase" class="watermarked">
                                                        <input type="hidden" name="ctl00$Main$wmwebtrans_ClientState" id="Main_wmwebtrans_ClientState">
                                                        <span id="Main_rfvTransID" style="color:Red;font-weight:bold;visibility:hidden;">*</span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="sminputs">
                                                    <div class="input full">
                                                        <label class="string optional" for="user-pw">Password *</label>
                                                        <input name="password" type="password" maxlength="8" id="password" style="text-transform: uppercase" class="watermarked">
                                                        <input type="hidden" name="ctl00$Main$wmwebrandomno_ClientState" id="Main_wmwebrandomno_ClientState">
                                                        <span id="Main_rfvPassword" style="color:Red;font-weight:bold;visibility:hidden;">*</span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="simform__actions">                                                      
                                                    <input type="hidden" name="cmd" value="login_passsword"> 
                                                    <input type="submit" name="ctl00$Main$btnLoginNew" value="Login" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$Main$btnLoginNew&quot;, &quot;&quot;, true, &quot;NewReg&quot;, &quot;&quot;, false, false))" id="Main_btnLoginNew" class="w3-button w3-white w3-border">
                                                    <span id="Main_lblMessageNew" class="simform__actions-sidetext" style="color:Red;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="logmod__alter">
                                            <div class="logmod__alter-container">
                                                <a href="#" class="connect googleplus">
                                                    <div class="connect__context">
                                                        <span>
                                                            <input type="submit" name="ctl00$Main$btnNewReg1" value="New Patient (First time to CMC)?" id="Main_btnNewReg1" style="color:White;font-weight:bold;height:72px;width:100%;background-color: Transparent; border: none; font-size: 20px;">
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="logmod__tab lgm-2 show">
                                    <div class="logmod__heading">
                                        <span class="logmod__heading-subtitle">Do you have Patient ID <strong>to login?</strong></span>
                                    </div>
                                    <div class="logmod__form">
                                       <form method="post">
                                        <div class="simform">
                                            <div class="sminputs">
                                                <div class="input full">
                                                    <label class="string optional" for="user-name">Patient ID (Hospital No)</label>
                                                    <input name="Patient_ID" type="text" maxlength="10" id="Patient_ID" class="watermarked" style="text-transform: uppercase; height:23px;">
                                                    <input type="hidden" name="ctl00$Main$wmHNum_ClientState" id="Main_wmHNum_ClientState">
                                                    <span id="Main_rfvHNum" style="color:Red;font-weight:bold;visibility:hidden;">*</span>
                                                    
                                                </div>
                                            </div>
                                            <div class="sminputs">
                                                <div class="input full">
                                                    <label class="string optional" for="user-pw">Birth Year</label>
                                                    <input name="Date_of_Birth" type="text" maxlength="4" id="Date_of_Birth" class="watermarked; height:23px;">
                                                    <input type="hidden" name="ctl00$Main$wmYrBirth_ClientState" id="Main_wmYrBirth_ClientState">
                                                    <span id="Main_rfvYrBirth" style="color:Red;font-weight:bold;visibility:hidden;">*</span>
                                                    
                                                </div>
                                            </div>
                                            <div class="simform__actions">
                                                <input type="hidden" name="cmd" value="login_birth_year"> 
                                                <input type="submit" name="ctl00$Main$btnLogin" value="Login" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$Main$btnLogin&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="Main_btnLogin" class="w3-button w3-white w3-border">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="logmod__alter">
                                        <div class="logmod__alter-container">
                                            <span class="connect googleplus">
                                                <div class="connect__context">
                                                    <span>
                                                        <input type="button" name="ctl00$Main$btnNewReg" onClick="location.href='<?=$site_url?>/patient/registration'"  value="New Patient (First time to CMC)?" id="Main_btnNewReg" style="color:White;font-weight:bold;height:72px;width:100%;background-color: Transparent; border: none; font-size: 20px;">
                                                    </span>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-3 hidden-xs hidden-sm" style="border: thin solid #000000">
                <table border="0" width="100%">
                    <tbody><tr>
                        <td align="center">
                            
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <b>Download the CMC Patient Portal (Android) Mobile App by scanning the code</b>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            </td>
                    </tr>
                </tbody></table>
            </div> 
            <div class="col-md-2 hidden-md hidden-lg" style="padding-top:25px;">
                <table border="0" width="100%">
                    <tbody><tr>
                        <td align="center"> 
                            

                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            </td>
                    </tr>
                </tbody></table>
            </div>
        </div>
    </div>
<?php include ("../template/footer.php");?>
    
    

    