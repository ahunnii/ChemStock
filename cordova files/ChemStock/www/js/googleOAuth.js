// Google OAuth Functions

function googleLogin()
{
	window.plugins.googleplus.login(
	{},
	function(userInfo)
	{
		alert(JSON.stringify(userInfo));
	},
	function(msg)
	{
		alert("error " + msg);
	});
}

function googleSilentLogin()
{
	window.plugins.googleplus.trySilentLogin(
	{},
	function(userInfo)
	{
		alert(JSON.strinigfy(userInfo));
	},
	function(msg)
	{
		alert("error " + msg);
	});
}

function googleLogout()
{
	window.plugins.googleplus.logout(
	function(msg)
	{
		alert(msg);
	});
}

function googleDisconnect()
{
	window.plugins.googleplus.disconnect(
	function(msg)
	{
		alert(msg);
	});
}