window.addEventListener("scroll", function(event) {
	APBStickyMenu.init();
});



function loadCustomSVG(name) {
	fetch("/medias/images/svg-customs/"+name+".svg")
	.then((response) => { return response.text(); })
	.then((data) => {
		document.getElementById(name+"-svg").innerHTML = data;
	})
}
