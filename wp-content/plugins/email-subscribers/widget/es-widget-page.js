﻿function es_submit_pages(url)
{
	es_email = document.getElementById("es_txt_email_pg");
	es_name = document.getElementById("es_txt_name_pg");
	es_group = document.getElementById("es_txt_group_pg");
    if( es_email.value == "" )
    {
    	document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_email_notice;
    	document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' error-state';
        // alert(es_widget_page_notices.es_email_notice);
        es_email.focus();
        return false;    
    }
	if( es_email.value!="" && ( es_email.value.indexOf("@",0) == -1 || es_email.value.indexOf(".",0) == -1 ))
    {
        // alert(es_widget_page_notices.es_incorrect_email);
        document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_incorrect_email;
        document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' error-state';
        es_email.focus();
        es_email.select();
        return false;
    }
    document.getElementById("es_msg_pg").className = '';
	document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_load_more;
	var date_now = "";
    var mynumber = Math.random();
	var str= "es_email="+ encodeURI(es_email.value) + "&es_name=" + encodeURI(es_name.value) + "&es_group=" + encodeURI(es_group.value) + "&timestamp=" + encodeURI(date_now) + "&action=" + encodeURI(mynumber);
	es_submit_requests(url+'/?es=subscribe', str);
}

var http_req = false;
function es_submit_requests(url, parameters)
{
	http_req = false;
	if (window.XMLHttpRequest) 
	{
		http_req = new XMLHttpRequest();
		if (http_req.overrideMimeType) 
		{
			http_req.overrideMimeType('text/html');
		}
	} 
	else if (window.ActiveXObject) 
	{
		try 
		{
			http_req = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (e) 
		{
			try 
			{
				http_req = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (e) 
			{
				
			}
		}
	}
	if (!http_req) 
	{
		alert(es_widget_page_notices.es_ajax_error);
		return false;
	}
	http_req.onreadystatechange = eemail_submitresults;
	http_req.open('POST', url, true);
	http_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// http_req.setRequestHeader("Content-length", parameters.length);
	// http_req.setRequestHeader("Connection", "close");
	http_req.send(parameters);
}

function eemail_submitresults() 
{
	//alert(http_req.readyState);
	//alert(http_req.responseText); 
	if (http_req.readyState == 4) 
	{
		if (http_req.status == 200) 
		{
		 	if (http_req.readyState==4 || http_req.readyState=="complete")
			{ 
				if((http_req.responseText).trim() == "subscribed-successfully")
				{
					document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_success_message;
					document.getElementById("es_txt_email_pg").value="";
					document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' success-state';
				}
				else if((http_req.responseText).trim() == "subscribed-pending-doubleoptin")
				{
					// alert(es_widget_page_notices.es_success_notice);
					document.getElementById("es_msg_pg").innerHTML = es_widget_notices.es_success_message;
					document.getElementById("es_txt_email_pg").value="";
					document.getElementById("es_txt_name_pg").value="";
					document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' success-state';
				}
				else if((http_req.responseText).trim() == "already-exist")
				{
					document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_email_exists;
					document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' error-state';
				}
				else if((http_req.responseText).trim() == "unexpected-error")
				{
					document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_error;
					document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' error-state';
				}
				else if((http_req.responseText).trim() == "invalid-email")
				{
					document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_invalid_email;
					document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' error-state';
				}
				else
				{
					document.getElementById("es_msg_pg").innerHTML = es_widget_page_notices.es_try_later;
					document.getElementById("es_txt_email_pg").value="";
					document.getElementById("es_txt_name_pg").value="";
					document.getElementById("es_msg_pg").className = document.getElementById("es_msg_pg").className + ' error-state';
				}
			} 
		}
		else 
		{
			alert(es_widget_page_notices.es_problem_request);
		}
	}
}