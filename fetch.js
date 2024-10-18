function GetPage(page) {
fetch(page).then(function (response) {
	if (response.ok) {
		return response.text();
	}
	throw response;
}).then(function (text) {
	document.getElementById("page").innerHTML = text;
	document.getElementById("page").scrollIntoView({behavior: "smooth"});
});
}