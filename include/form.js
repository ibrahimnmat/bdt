function validate(form)
{
var minLength=4;
	
	if (document.form.app_loginname.value=="")
	{
		alert("Sila masukkan ID pengguna!");
		document.form.app_loginname.focus();
		return false;
	}
	if (document.form.app_pwd.value=="")
	{
		alert("Sila masukkan kata laluan pengguna!");
		document.form.app_pwd.focus();
		return false;
	}else
	if (document.form.app_pwd.value.length < minLength)
	{
		alert('Kata laluan pengguna perlu mempunyai sekurang-kurangnya' +  minLength + ' aksara. Sila cuba lagi!');
		document.form.app_pwd.focus();
		return false;
	}
	if (document.form.app_pwd.value.indexOf(" ") > -1)
	{
		alert("Minta maaf, spaces tidak dibenarkan.");
		document.form.app_pwd.focus();
		return false;
	}
	
	if (document.form.app_conpwd.value=="")
	{
		alert("Sila masukkan pengesahan kata laluan pengguna!");
		document.form.app_conpwd.focus();
		return false;
	}
	if (document.form.app_pwd.value != document.form.app_conpwd.value)
	{
		alert("Minta Maaf! Kata laluan tidak sepandan dengan pengesahan kata laluan!")
		document.form.app_conpwd.focus();
		return false;
	}		
	
	if (document.form.app_name.value=="")
	{
		alert("Sila masukkan nama penuh pengguna!");
		document.form.app_name.focus();
		return false;
	}
	
	if (document.form.app_noic.value=="")
	{
		alert("Sila masukkan nombor kad pengenalan pelajar!");
		document.form.app_noic.focus();
		return false;
	}

		if (document.form.app_ambilan.value=='0')
	{
		alert("Sila masukkan maklumat ambilan pelajar!");
		document.form.app_ambilan.focus();
		return false;
	}
	
	
		 if (document.form.app_kursus.value=='0')
	{
		alert("Sila masukkan maklumat pengkhususan pelajar!");
		document.form.app_kursus.focus();
		return false;
	}
	
	
	if (document.form.app_email.value!="")
 	{
        var x = document.form.app_email.value;
		var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (filter.test(x)==false)
		{ 
			alert('Alamat email yang dimasukkan tidak sah');
			document.form.app_email.focus();
			return false;
		}
		
  	}
	return true;
}
