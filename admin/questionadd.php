<?php
session_start();
require("../database.php");
include("header.php");
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
extract($_POST);

echo "<BR>";
if (!isset($_SESSION["alogin"]))
{
	echo "<br><h2><div  class=head1>You are not Logged In Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1><u>Add Question</u></h3>";
if (isset($_POST["submit"]) && $_POST["submit"] == 'Save' || isset($_POST["testid"]) && strlen($_POST["testid"]) > 0) {
    extract($_POST);
mysql_query("insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
echo "<p align=center>Question Added Successfully.</p>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter The Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Option1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Option2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Option3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Option4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter Correct Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>
<form name="form1" method="post" onSubmit="return check();">
  <table width="80%"  border="0" align="center">
    <tr>
      <td width="24%" height="32"><div align="left"><strong>Select Test Name </strong></div></td>
      <td width="1%" height="5">  
      <td width="75%" height="32"><select name="testid" id="testid">
<?php
$rs=mysql_query("Select * from mst_test order by test_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
        <td>&nbsp;</td>
	    <td><textarea name="addque" cols="60" rows="2" id="addque" placeholder = "Enter New Question"></textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Option1 </strong></div></td>
      <td>&nbsp;</td>
      <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85" placeholder="Enter 1st Option"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Option2 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85" placeholder="Enter 2nd Option"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Option3 </strong></td>
      <td>&nbsp;</td>
      <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85" placeholder = "Enter 3rd Option"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Option4</strong></td>
      <td>&nbsp;</td>
      <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85" placeholder = "Enter 4th Option"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Correct Answer </strong></td>
      <td>&nbsp;</td>
      <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="50" placeholder="Enter Correct Option Number"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>