<?php session_start();

	if(isset($_SESSION['acc_id'])){

	 if($_SESSION['acc_id'] != NULL){
		 header("location:chatworld.php");
	 }
	}

?>
<!DOCTYPE HTML5>
<html>
<head>

<title>MMM Chat</title>
<link rel="shortcut icon" href="imgweb/reg2.png">
<style type="text/css">

p.login{
	color:#00FFFF;
	font-size:24px;
	font-weight:bolder;
	}
td.res{
	font-size:36px; 
	color:#006;
	font-weight:bolder;
}
td.from{
	font-size:20px; 
	color:#999;
	font-weight:bolder;
	font-family:"Tahoma", Times, serif;
}
.head{
	color:#0FF;
	background-color:#306;
	font-size:50px;
	font-weight:bolder;
	font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
}

	
</style>
</head>

<body background="imgweb/bg2.png">
<table width="800px" height="650" align="center" background="imgweb/bg1.jpg" border="0">

<tr> 
	<td height="100" colspan="3">
    <p align="center"> <font class="head">MMM Chat</font></p>
	</td>
</tr>

<tr> 
	<td width="239" height="250">
	 </td> 
	
	<td width="400"> 
		<table width="100%" height="100%" background="imgweb/bglogmain.jpg">
			<tr> 
				<td height="60" align="center" class="res" colspan="2">	Login </td> 
			 </tr>
	
			 



			 <form action="inputlog.php" method="post">
			 <tr> 
				<td width="212" height="60" align="center" class="from">
                	<p>ชื่อผู้ใช้:</p>
                </td>
				

				<td width="176" height="60">
					<input align="left" type="text" name="log_user" width="100px" required placeholder="Username"/>
				</td>
			 </tr> 
			 

			 <tr> 
				<td width="212" height="60" align="center" class="from">
                <p>รหัสผ่าน:</p>
                </td>

				<td width="176" height="60">
                <input name="log_pass" type="password" align="center" width="100px" required placeholder="Password"/>
				</td>
           
			 </tr> 



				
			 <tr >
            
				  <td width="176" height="60" align="center">
                  
                  <input type="submit" formaction="inputlog.php" value="เข้าสู่ระบบ" align="center"/>
                  </form>
                  </td>
             
             
             
					<td width="212" height="60" align="center">    
						
						<a href="register.php"><button>ลงทะเบียน</button></a>                    
               	 	</td> 
             

			 </tr>
            

		</table>
        </td>
	
	 <td width="233" align="right"> </td> 
     
      <tr>
             	<td colspan="3" height="200" align="center">
                	<a href="admin/adminhome.php"><img src="imgweb/admin.png" title="admin"></a>
                </td>
            </tr>
	 
  </tr>
</table>
</body>
</html>
