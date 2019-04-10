
function onSignIn(googleUser){
	var profile = googleUser.getBasicProfile();
	console.log("HOL HOLA");
	$(".g-signin2").css("display","none");
	$(".data").css("display","block");
	$("#pic").attr('src',profile.getImageUrl());
	$("#email").text(profile.getEmail());
}

function signOut(){
	var auth2 = gapi.auth2.getAuthInstance();
	auth2.signOut().then(function(){
		alert("You have succesfully signed out");
		$(".g-signin2").css("display","block");
		$(".data").css("display","none");
	});
}