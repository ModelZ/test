
<?php 
session_start();
include "connectdb.php"; 
?>
<!DOCTYPE html5>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/chatworld.css">
<meta  charset="utf-8" />
<title>Chat World</title>
<style type="text/css">
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.icon{
	cursor: pointer;
}

/* Modal Content */
.modal-content {
    background-color: #d8d8d8;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<script>
	
	function subm(){
			var chatw = document.getElementById("chatw");
	  		setTimeout("chatw.value = '';",100);  
	}
	function subm2(){
			var val = document.getElementById("val");
	  		setTimeout("val.value = '';",10);
			var modal = document.getElementById('myModal');  
			modal.style.display = "none";
	}
	/*
	function enter(){
		var chatw = document.getElementById("chatw");
		console.log(chatw.value);
	}*/
</script>
</head>
<body background="imgweb/bg2.png">

<?php 
	
	if(!isset($_SESSION['acc_id'])){
		echo "<meta http-equiv=refresh content=0;url=index.php>";
		die();
	}
	date_default_timezone_set('Asia/Bangkok');
	$time = date("H:i:s");
	$_SESSION['time'] = $time;
	$acc_id = $_SESSION['acc_id'];
	
	

	$chcolor = rand(1,5);
	/*$bgcolor = rand(1,5);*/
	  switch($chcolor){
		case 1: $chcolor = "#33ff66"; //สีเขียวอ่อน
			break;
		case 2: $chcolor = "#ffff99"; //สีเหลืองอ่อน
			break;
		case 3: $chcolor = "#0066ff"; //สีน้ำเงินอ่อน
			break;
		case 4: $chcolor = "#ff66ff"; //สีชมพูอ่อน
			break;
		case 5: $chcolor = "#ff9966"; //สีส้มอ่อน
			break;
		}
		
		/*switch($bgcolor){
		case 1: $bgcolor = "#33ff66"; //สีเขียวอ่อน
			break;
		case 2: $bgcolor = "#ffff99"; //สีเหลืองอ่อน
			break;
		case 3: $bgcolor = "#409fed"; //สีน้ำเงินอ่อน
			break;
		case 4: $bgcolor = "#ff66ff"; //สีชมพูอ่อน
			break;
		case 5: $bgcolor = "#ff9966"; //สีส้มอ่อน
			break;
		}*/


?>
<table width="1300" align="center" height="700" style="background-color:#ffffcc;">
	<tr height="10%">
    
    	<td height="10%" width="6%">
        	<table cellpadding="2" height="100%" width="100%"> <tr> <td align="center">
         <img src="<?php echo $_SESSION['img_pf']; ?>" width="100" height="100" class="img-circle">
         	</td> </tr> </table> 
        </td>
        
        <td height="10%" width="30%">
        	<table align="center" height="100%" width="100%">
            	<tr>
                	<td>
                    	<p class="name">ชื่อ : <?php  
									if(strlen($_SESSION['name'])> 25){
										echo substr($_SESSION['name'],0,25).'...';
									}else{
										echo $_SESSION['name'];
									}
								?>
                        </p>
                    </td>
                
                </tr>
                
                <tr>
                	<td>
                    	<p class="name">สถานะ : <?php  
									if(strlen($_SESSION['status'])> 25){
										echo substr($_SESSION['status'],0,25).'...';
									}else{
										echo $_SESSION['status'];
									}
								?>
                        </p>
                    </td>
                
                </tr>
            
            </table>

        </td>
        
        <td height="10%" width="25%">
        <table align="center" height="100%" width="100%">
            	<tr>
                	<td>
                    	<p class="name">(ใช้แอดเพื่อน)&nbsp;&nbsp;ID : <?php echo $_SESSION['id']; ?> </p>
                    </td>
                
                </tr>
                
                <tr>
                	<td>
                    	<p class="name">จำนวนเพื่อน </p>
                    </td>
                
                </tr>
            
          </table>
            
        </td>
        
        <td height="10%" width="15%">
        <p> <a href="editpf.php" class="go"> ตั้งค่าโปรไฟล์  </a></p>
        <p> <a href="logout.php" class="go">ออกจากระบบ</a> </p>
        </td>
    
    </tr>
    
  <tr height="5%">
    	<td colspan="4">
    	<table width="100%" height="100%" cellpadding="5" style="background-color:#00FFFF;">
        	<tr>
            	<td width="15%" height="100%" align="center"><a href="chatworld.php" class="go">แชทโลก</a></td>
   			  <td width="15%" height="100%" align="center"><p class="name">เพื่อน</p></td>
   			  <td width="15%" height="100%" align="center"><p class="name">แชท</p></td>
       		  <td width="15%" height="100%" align="center"><p class="name">เพื่มเพื่อน</p></td>
       		  <td width="15%" height="100%" align="center"><p class="name">โปรไฟล์  </p></td>
              <td width="15%" height="100%" align="center"><p class="name"> หน้าหลัก </p></td>
        	</tr>
        </table>
        </td>

  </tr>
    
    <tr height="65%">
    	<td colspan="4">
        
    	<table width="100%" height="100%"> 
        	<tr>
                
                <td width="60%">
                	<table width="100%" height="100%" style="background-color:<?php echo $chcolor; ?>;">
                    	<tr>
                        
                        	<td align="center" height="80%">
                            	<table width="688px" height="100%">
                                	<tr>
                                    	<td width="100%">
                                        Chatworld
                                        </td>
                                    </tr>
                                    
                                    
                                	<tr>
                                    	<td width="100%" height="90%" colspan="2">
                                        
                                       		
                                          <table width="100%" height="100%"> 
                                            <tr>
                                                <td width="100%" height="80%"> 
                                    
                                    	
									<iframe src="iframecw.php" width="100%" height="100%" name="mbody"></iframe>          
                                      
                                   					</td>
                                                </tr>
                                            </table>
                                        
                                        </td>
                                    </tr>
                                </table>
                          
									
	       
								
                            </td>		
                        
                        </tr>
                        
                        <form action="inputchatworld.php" method="post" target="mbody" onSubmit="subm();">
                         <tr>
                         	<td align="center" height="15%">
                        	<table height="100%" width="90%">
                            	<tr>
                                    <td align="right" height="100%" width="60%">
<textarea name="chatw" class="no" placeholder="กรุณาพิมพ์ข้อความ" rows="2" required id="chatw" style="background-color:#e0e0eb;">
</textarea>
                                    </td>
                                    
                                    <td height="100%" width="40%" valign="top">
										<table height="100%" width="100%">
											<tr>
												<td align="bottom">
                                        <input type="submit" align="middle" value="ส่ง" style="width:50px;height:50px;"/>
						 </form>

										<a id="myBtn1" title="สติ้กเกอร์"><img src="imgweb/stk.png" align="top" class="icon"></a>
										<a id="myBtn" title="รูปภาพ"><img src="imgweb/imgicon.png" align="center" class="icon"></a>
										<!-- Trigger/Open The Modal -->
											
											<!-- The Modal -->
											<div id="myModal" class="modal">
											  <!-- Modal content -->
											  <div class="modal-content">
												<span class="close">&times;</span>
												<h1>ใส่รูปภาพ</h1>
												<h3>กรุณาใส่ภาพไม่ต่ำกว่า200x200px</h3>
		<form action="inputchatworld.php" enctype="multipart/form-data" method="post" target="mbody" onSubmit="subm2();">
													<input type="file" title="img" name="image" id="val" required/>
													<input type="submit" value="ส่ง" name="upload" />
													<input type="hidden" value="123" name="op" />
		</form>
											  </div>
											  <script>
												// Get the modal
													var modal = document.getElementById('myModal');
													
													// Get the button that opens the modal
													var btn = document.getElementById("myBtn");
													
													// Get the <span> element that closes the modal
													var span = document.getElementsByClassName("close")[0];
													
													// When the user clicks the button, open the modal 
													btn.onclick = function() {
														modal.style.display = "block";
													} 
													// When the user clicks on <span> (x), close the modal
													span.onclick = function() {
														modal.style.display = "none";
													}
													
													// When the user clicks anywhere outside of the modal, close it
													window.onclick = function(event) {
														if (event.target == modal) {
															modal.style.display = "none";
														}
													}
											</script>
											</div>
											
											<?php
									 
											
											
										
											
											
											
											?>
											

											<div id="myModal1" class="modal">
											  <!-- Modal content -->
											  <div class="modal-content">
												<span class="close">&times;</span>
												
													<center><h1>สติ้กเกอร์</h1></center>
												<?php include "connectdb.php";
													$up = mysqli_query($sqli,"select stk_id from sticker");
														while($row = mysqli_fetch_array($up)){
															$stk_id = $row['stk_id'];
														echo "
												<a href='inputchatworld.php?stk_name=<img src=sticker/$stk_id.png>' target='mbody' onClick='closer();'><img src='sticker/$stk_id.png' height=150 width=150 onClick='closer();'></a>
															 ";
													}
												?>
											  </div>
											  <script>
												// Get the modal
													var modal1 = document.getElementById('myModal1');
													
													// Get the button that opens the modal
													var btn1 = document.getElementById("myBtn1");
													
													// Get the <span> element that closes the modal
													var span1 = document.getElementsByClassName("close")[1];
													// When the user clicks the button, open the modal 
													btn1.onclick = function() {
														modal1.style.display = "block";
													}

													function closer(){
														modal1.style.display = "none";
													}
													
													// When the user clicks on <span> (x), close the modal
													span1.onclick = function() {
														modal1.style.display = "none";
													}
													
													// When the user clicks anywhere outside of the modal, close it
													window.onclick = function(event) {
														if (event.target == modal1) {
															modal1.style.display = "none";
														}
													}
											</script>
											</div>
										</td>
									</tr>
								</table>
                                    </td>
                            	</tr>
                            </table>
                            </td>
                        </tr>
                       
                        
                        
                    </table>
                
                </td>
                
                <td width="40%">
                
                
                
                
                
                <table width="100%" height="100%" style="background-color:<?php echo $chcolor; ?>;">
                                <tr>
                                    <td width="100%" height="10%" align="center">
                                    <?php include "function.php"; ?>
                                         <table width="100%" height="100%">
                                            <tr>
                                                <td align="center" height="50%" valign="bottom">
                                                
 <font class="head">บัญชีที่ Online</font>
 <?php echo space(5);?>
 <font class="head">จำนวน : <?php if(!isset($_SESSION['counton'])){echo 1;}else{echo $_SESSION['counton'];}echo space(2);?>คน</font>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td align="left" height="50%" valign="bottom">
                                     
                                                     ค้นหาชื่อเพื่อน :&nbsp;<input type="search" required />                
                                                </td>
                                            </tr>
                                       </table>
                                       <hr>
                                    
                                    </td>
                                </tr>
                                <tr>
                                	<td width="100%" height="75%">
                                    	<iframe src="iframeonlw.php" width="100%" height="100%"></iframe> 
                                    </td>
                                </tr>
                                <tr>
                                	<td width="100%" height="10%">
                                    dsdsdsdsd
                                    </td>
                                </tr>
            </table>
                
                
                
  
                  
                
                </td>

            </tr>
        
        </table>
        
    	</td>
    </tr>


</body>
</html>


