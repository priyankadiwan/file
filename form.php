
<html>
<head>
<script>
/*
function validateForm() 

{
    var x = document.forms["myForm"]["firstname"].value;
	var y = document.forms["myForm"]["lastname"].value;
	var z = document.forms["myForm"]["email"].value;
	    if (x== "") 
	{
        alert("firstname must be filled out");
        return false;
    }
	
	else if (y== "") 
	{
        alert("lastname must be filled out");
        return false;
    }
	
	else if (z== "") 
	{
        alert("email must be filled out");
        return false;
    }
	else
	{ 
		location.assign("form_link.php");
    } 
}
function validateForm()
 { 
 var x = document.getElementById("firstname").value;
 var y = document.getElementById("lastname").value; 
 var z = document.getElementById("email").value; 
 
 if(x == "")
	{  
		alert("firstname must be filled out");   
		return false;
	}
	 else if(y == "")
	{ 
		 alert("lastname must be filled out");  
		 return false;
	}
	else if(z == "")
	{  
		alert("email must be filled out"); 
		return false; 
	}
	else
	{ 
		//alert("Submitted"); 
		window.location.assign("form_link.php");
		//window.location="form_link.php";
    } 
  }*/
</script>
</head>
<body>
<?php
session_start();
$server="localhost";
$user="root";
$password="";
$database="practise";
$conn=new mysqli($server,$user,$password,$database);
if($conn->connect_error)
{
die("connection failed".$conn->connect_error);

}
else
{
echo "";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['submit']))
	{
	$firstname = $_SESSION['firstname'] = $_POST['firstname'];
	$lastname =	$_SESSION['lastname'] = $_POST['lastname'];
	$password =	$_SESSION['password'] = $_POST['password'];
	$email = $_SESSION['email'] = $_POST['email'];
		
		/*$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$password=$_POST["password"];
		$email=$_POST["email"];
		*/
	$sql = "INSERT INTO abc (firstname, lastname, password , email )
	VALUES ('".$firstname."' , '".$lastname."' , '".$password."' , '".$email."')";
	
	if ($conn->query( $sql)===TRUE)
		{
			Header("location:form_link.php");
		} 
	else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	
	}
}

?>

<form name="myForm"  method="POST" action="<?php echo($_SERVER['PHP_SELF']);?>">
firstname:
<input type="text" name="firstname"><br>
lastname:
<input type="text" name="lastname"><br>
password:
<input type="password" name="password"><br>
email:
<input type="email" name="email"><br>

<input type="submit" name="submit">
</form>
</p>
</body>
</html>