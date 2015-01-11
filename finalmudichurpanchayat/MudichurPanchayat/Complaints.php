<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Complaints Form</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="calendar.js"></script>
</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Complaints Form</a></h1>
		<form id="form_947102" class="appnitro"  method="post" action="ComplaintInsert.php">
					<div class="form_description">
			<h2>Complaints Form</h2>
			<p>Register your Complaint</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Complaint Type </label>
		<div>
		<select class="element select medium" id="element_1" name="element_1"> 
			<option value="" selected="selected"></option>
<option value="Tap" >Tap</option>
<option value="Street Lights" >Street Lights</option>
<option value="Road" >Road</option>

		</select>
		</div><p class="guidelines" id="guide_1"><small>Register your type of complaint</small></p> 
		</li>

		
		<script type="text/javascript">
		ErrorFlag=0;

		document.getElementById("element_1").onchange = function() {
		var xmlhttp;
		
		var ComplaintTypeObj=document.getElementById("element_1");
		var ComplaintType = ComplaintTypeObj.options[ComplaintTypeObj.selectedIndex].text;
		console.log(ComplaintType);
		if (ComplaintType != "")
		{
		if (window.XMLHttpRequest)
		{
		xmlhttp=new XMLHttpRequest();
		}
		else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		
		var AjaxResponse = (xmlhttp.responseText);
		if ($.isArray(AjaxResponse) || 	AjaxResponse.length)
		{
		var RecordsetArray = jQuery.parseJSON(AjaxResponse);
		ContactPersonName = RecordsetArray.ContactPersonName
		TelephoneNo = RecordsetArray.TelephoneNo
		document.getElementById("element_3_1").value = ContactPersonName
		document.getElementById("element_4").value = TelephoneNo
		}
		else
		{
			alert("Invalid Query");
		}
		}
		};
		xmlhttp.open("GET","/MudichurPanchayat/ComplaintResponse.php?ComplaintType="+encodeURIComponent(ComplaintType),true);
		xmlhttp.send();
		}
		};
		</script>
		
		<li id="li_6">
		<label class="description" for="element_6">Date of Complaint </label>
		<span>
			<input id="element_6_1" name="element_6_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_6_1">DD</label>
		</span>
		<span>
			<input id="element_6_2" name="element_6_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_6_2">MM</label>
		</span>
		<span>
	 		<input id="element_6_3" name="element_6_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_6_3">YYYY</label>
		</span>
	
		<span id="calendar_6">
			<img id="cal_img_6" class="datepicker" src="/MudichurPanchayat/calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_6_3",
			baseField    : "element_6",
			displayArea  : "calendar_6",
			button		 : "cal_img_6",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectEuropeDate
			});
		</script>
		 
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Complaint Description </label>		
		<div>
			<textarea id="element_5" name="element_5" class="element textarea medium" onKeyPress=check_length(this.form); onKeyDown=check_length(this.form)></textarea> 
		</div><p class="guidelines" id="guide_5"><small>Please enter your complaint !</small></p>
		<div id="CharacterCount"></div> 
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Contact Person Name </label>
		<span>
			<input id="element_3_1" name= "element_3_1" class="element text" maxlength="255" size="25" value="" readonly/>
			<!--<label>First</label>-->
		</span>
		<!--<span>
			<input id="element_3_2" name= "element_3_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Last</label>
		</span> -->
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Contact Number </label>
		<div>
			<input id="element_4" name="element_4" class="element text medium" type="text" maxlength="255" value="" readonly/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="947102" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
                               
		</li>
                
                
		
			</ul>
		</form>	
		<div id="footer">
			
		</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	<script language=JavaScript>
<!--
	function check_length(my_form)
	{
		maxLen = 230; // max number of characters allowed
		if (my_form.element_5.value.length >= maxLen) {
			// Alert message if maximum limit is reached. 
			// If required Alert can be removed. 
			var msg = "You have reached your maximum limit of characters allowed";
			alert(msg);
			// Reached the Maximum length so trim the textarea
			my_form.element_5.value = my_form.element_5.value.substring(0, maxLen);
			 }
			else{ // Maximum length not reached so update the value of element_5 counter
				//my_form.CharacterCount.value = maxLen - my_form.element_5.value.length;
				CharCounter = maxLen - my_form.element_5.value.length;				
					document.getElementById("CharacterCount").innerHTML = "<i> <font color = brown>				Character Remaining is " + CharCounter + " out of 230 </font>";
			}

		}
//-->
</script>

	</body>
</html>