// Google OAuth Functions

function googleLogin()
{
    cordova.plugins.googleplus.login(
	{},
	function(userInfo)
	{
		alert(JSON.stringify(userInfo));
		var email = userInfo.email;
		var provider = email.replace(/^.*@/,"");
		if(provider === "emich.edu")
		{
			//TODO: Check if user is in employee database
			// Relocate to new page
			location.href = "labView.html";
		}
		else
		{
			alert("You must use an @emich.edu account to use this app!");
			googleDisconnect();
		}
	},
	function(msg)
	{
		alert("error " + msg);
		location.reload();
	});
}

function googleSilentLogin()
{
	window.plugins.googleplus.trySilentLogin(
	{},
	function(userInfo)
	{
		alert(JSON.stringify(userInfo));
		var email = userInfo.email;
		var provider = email.replace(/^.*@/,"");
		if(provider === "emich.edu")
		{
			//TODO: Check if user is in employee database
			// Relocate to new page
			location.href = "labView.html";
		}
		else
		{
			alert("You must use an @emich.edu account to use this app!");
			googleDisconnect();
		}
	},
	function(msg)
	{
		// don't do anything, no silent login
	});
}

function googleLogout()
{
	window.plugins.googleplus.logout(
	function(msg)
	{
		//alert(msg);
	});
}

function googleDisconnect()
{
	window.plugins.googleplus.disconnect(
	function(msg)
	{
		//alert(msg);
	});
}