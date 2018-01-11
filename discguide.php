<html>
<head>
<title>Mike's Disc Guide</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	
		getTxt = function (){

  $.ajax({
    url:'discs-com.txt',
    success: function (data){
			var array = data.split(";");
			var i = 0;
			while (i < array.length) {
				var output = array[i].split(",");
				var old = document.getElementById(output[1]).innerHTML;
				var color= "grey";
				var text = "black";
				var border = "black";
				if (output[2] == 'Innova') {
					color = "yellow";
					text = "black";
				}
				if (output[2] == 'Dynamic') {
					color = "blue";
					text = "white";
				}
				if (output[2] == 'Millenium') {
					color = "white";
					text = "darkred";
				}
				if (output[2] == 'Daredevil') {
					color = "orange";
					text = "black";
				}
				if (output[2] == 'Axiom') {
					color = "teal";
					text = "black";
				}
				if (output[2] == 'Discraft') {
					color = "red";
					text = "black";
				}
				if (output[2] == 'Discmania') {
					color = "red";
					text = "yellow";
				}
				if (output[2] == 'Lat64') {
					color = "black";
					text = "white";
					border = "white";
				}
				if (output[2] == 'Prodigy') {
					color = "lightgreen";
					text = "black";
				}
				if (output[2] == 'Vibram') {
					color = "black";
					text = "yellow";
					border = "yellow";
				}
				if (output[2] == 'MVP') {
					color = "#ff8ce8";
					text = "black";
				}
				if (output[2] == 'Westside') {
					color = "#003300";
					text = "white";
				}
				if (output[2] == 'Legacy') {
					color = "#00FF00";
					text = "black";
				}
				if (output[2] == 'Gateway') {
					color = "lightblue";
					text = "black";
				}
				var op = "<div class='disc' brand='"+output[2]+"' name="+output[0]+" style='background-color:"+color+";color:"+text+";border:1px solid " + border + ";'><b>" + output[0] + "</b></div>"
				document.getElementById(output[1]).innerHTML += op;
				i++;
			}
    }
  });
}
	var clicked = "";
function brandClick(brand){
	var brand2 = brand.getAttribute("brand");
	
	if (clicked != brand2) {
		showBrand(brand2);
		clicked = brand2;
	} else {
		setNormal();
		clicked = "";
	}
}
function setNormal() {
	var x = document.getElementsByClassName("disc");
		for(var i=0; i<x.length; i++) {
					x[i].style.opacity = "1";
		}
}
function showBrand(brand) {
	var x = document.getElementsByClassName("disc");
		for(var i=0; i<x.length; i++) {
				if (x[i].getAttribute("brand") != brand) {
					x[i].style.opacity = ".3";
				} else {
					x[i].style.opacity = "1";
				}
		}
		
}

function searchDiscs(discname) {
	var discs = document.getElementsByClassName("disc");
	if (event.key === 'Enter') {
		for(var i=0; i<discs.length; i++) {
			if (discname == discs[i].getAttribute("name")) {
				var pos = discs[i].getBoundingClientRect();
				var x = pos.left;
				var y = pos.top;
				var box = document.getElementById("foundbox");
				var showarrow = setInterval(arrow,5);
				var time = 0;
				function arrow() {
					if (time == 650) {
							clearInterval(showarrow);
							box.style.display = "none";
					} else {
						box.style.display = "block";
						box.style.left = x-300;
						box.style.top = y-195;
						time++;
					}
				}
			}
		}
	}
	if (event.code === 'Backspace') {
		var box = document.getElementById("foundbox");
		box.style.display = "none";
	}
}

</script>
<style>
body {
	font-family: Arial Narrow;
	font-size:9pt;
}
.legendbrand {
	font-weight:bold;
}
#mydiv {
    position: absolute;
    z-index: 9;
    background-color: #f1f1f1;
    border: 1px solid #d3d3d3;
    text-align: center;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
	vertical-align:center;
}
.s14 {
	background-color: rgba(163,0,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s13 {
	background-color: rgba(167,9,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s12 {
	background-color: rgba(181,51,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s11 {
	background-color: rgba(201,107,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s10 {
	background-color: rgba(217,153,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s9 {
	background-color: rgba(240,219,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s8 {
	background-color: rgba(252,255,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s7{
	background-color: rgba(212,239,1,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s6 {
	background-color: rgba(172,222,1,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s5 {
	background-color: rgba(95,191,1,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s4 {
	background-color: rgba(39,168,1,0.7);
	font-size:9pt;
	vertical-align:top;
}
.s3 {
	background-color: rgba(31,137,0,0.7);
	font-size:9pt;
	vertical-align:top;
}
</style>
<body onLoad="getTxt();">
<div id="blah"></div>
<div style="position:absolute;display:none;" id="foundbox"><img src="arrow.png"></div>
<div id="mydiv">
  <div id="mydivheader"><img src="https://cdn1.iconfinder.com/data/icons/business-cursor/512/move_2-512.png" style="vertical-align: middle;" width="20" height="20"> Disc Brands</div>
  <div style='background-color:teal;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Axiom" class="legendbrand">Axiom</div>
  <div style='background-color:orange;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Daredevil" class="legendbrand">Daredevil</div>
  <div style='background-color:grey;color:black;border:1px solid black;' onClick="brandClick(this);" brand="DGA" class="legendbrand">DGA</div>
  <div style='background-color:red;color:yellow;border:1px solid black;' onClick="brandClick(this);" brand="Discmania" class="legendbrand">Discmania</div>
  <div style='background-color:red;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Discraft" class="legendbrand">Discraft</div>
  <div style='background-color:blue;color:white;border:1px solid black;' onClick="brandClick(this);" brand="Dynamic" class="legendbrand">Dynamic Discs</div>
  <div style='background-color:lightblue;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Gateway" class="legendbrand">Gateway</div>
  <div style='background-color:yellow;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Innova" class="legendbrand">Innova</div>
  <div style='background-color:black;color:white;border:1px solid white;' onClick="brandClick(this);" brand="Lat64" class="legendbrand">Latitude 64</div>
  <div style='background-color:#00FF00;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Legacy" class="legendbrand">Legacy</div>
  <div style='background-color:white;color:darkred;border:1px solid black;' onClick="brandClick(this);" brand="Millenium" class="legendbrand">Millenium</div>
  <div style='background-color:#ff8ce8;color:black;border:1px solid black;' onClick="brandClick(this);" brand="MVP" class="legendbrand">MVP</div>
  <div style='background-color:lightgreen;color:black;border:1px solid black;' onClick="brandClick(this);" brand="Prodigy" class="legendbrand">Prodigy</div>
  <div style='background-color:black;color:yellow;border:1px solid yellow;' onClick="brandClick(this);" brand="Vibram" class="legendbrand">Vibram</div>
  <div style='background-color:#003300;color:white;border:1px solid black;' onClick="brandClick(this);" brand="Westside" class="legendbrand">Westside</div>
  <div id="search"><input type="text" id="searchbox" width="50" autocomplete="off" placeholder="Type Name and press Enter" onKeyDown="searchDiscs(this.value);"></div>
  
</div>
<script>
//Make the DIV element draggagle:
dragElement(document.getElementById(("mydiv")));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
<div id="discs-div">
<table border=0 width="100%">
	<tr>
		<th width="19%">
			<b>Very Overstable</b>
		</th>
		<th width="23%">
			<b>Overstable</b>
		</th>
		<th width="18%">
			<b>Stable</b>
		</th>
		<th width="23%">
			<b>Understable</b>
		</th>
		<th width="18%">
			<b>Very Understable</b>
		</th>
	</tr>
	<tr>
		<td>
			<table border=1 width="100%">
				<tr> <!-- VERY OVERSTABLE -->
					<td style="background-color:#222;color:white;" align="center" width="4%">
						<font size="1">SPEED</font>
					</td>
					<td align="center" width="25%">
						A
					</td>
					<td align="center" width="25%">
						B
					</td>
					<td align="center" width="25%">
						C
					</td>				
				</tr>
				<tr height="110">
					<td style="background-color:#a30000;" align="center">
						<font size="5"><b>14</b></font>
					</td>
					<td id="A14" align="center" class="s14">
						
					</td>
					<td id="B14" align="center" class="s14">
						
					</td>
					<td id="C14" align="center" class="s14">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#a70900;" align="center">
						<font size="5"><b>13</b></font>
					</td>
					<td id="A13" align="center" class="s13">
					
					</td>
					<td id="B13" align="center" class="s13">
						
					</td>
					<td id="C13" align="center" class="s13">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#b53300;" align="center">
						<font size="5"><b>12</b></font>
					</td>
					<td id="A12" align="center" class="s12">
						
					</td>
					<td id="B12" align="center" class="s12">
						
					</td>
					<td id="C12" align="center" class="s12">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#c96b00;" align="center">
						<font size="5"><b>11</b></font>
					</td>
					<td id="A11" align="center" class="s11">
						
					</td>
					<td id="B11" align="center" class="s11">
						
					</td>
					<td id="C11" align="center" class="s11">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#d99900;" align="center">
						<font size="5"><b>10</b></font>
					</td>
					<td id="A10" align="center" class="s10">
						
					</td>
					<td id="B10" align="center" class="s10">
						
					</td>
					<td id="C10" align="center" class="s10">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#f0db00;" align="center">
						<font size="5"><b>9</b></font>
					</td>
					<td id="A9" align="center" class="s9">
						
					</td>
					<td id="B9" align="center" class="s9">
						
					</td>
					<td id="C9" align="center" class="s9">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#fcff00;" align="center">
						<font size="5"><b>8</b></font>
					</td>
					<td id="A8" align="center" class="s8">
						
					</td>
					<td id="B8" align="center" class="s8">
						
					</td>
					<td id="C8" align="center" class="s8">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#d4ef01;" align="center">
						<font size="5"><b>7</b></font>
					</td>
					<td id="A7" align="center" class="s7">
						
					</td>
					<td id="B7" align="center" class="s7">
						
					</td>
					<td id="C7" align="center" class="s7">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#acde01;" align="center">
						<font size="5"><b>6</b></font>
					</td>
					<td id="A6" align="center" class="s6">
						
					</td>
					<td id="B6" align="center" class="s6">
						
					</td>
					<td id="C6" align="center" class="s6">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#5fbf01;" align="center">
						<font size="5"><b>5</b></font>
					</td>
					<td id="A5" align="center" class="s5">
						
					</td>
					<td id="B5" align="center" class="s5">
						
					</td>
					<td id="C5" align="center" class="s5">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#27a801;" align="center">
						<font size="5"><b>4</b></font>
					</td>
					<td id="A4" align="center" class="s4">
						
					</td>
					<td id="B4" align="center" class="s4">
						
					</td>
					<td id="C4" align="center" class="s4">
						
					</td>
				</tr>
				<tr height="110">
					<td style="background-color:#1f8900;" align="center">
						<font size="5"><b>3</b></font>
					</td>
					<td id="A3" align="center" class="s3">
						
					</td>
					<td id="B3" align="center" class="s3">
						
					</td>
					<td id="C3" align="center" class="s3">
						
					</td>
				</tr>			
			</table>
		</td>
		<td>
			<table border=1 width="100%">
				<tr> <!-- OVERSTABLE -->
					<td align="center" width="25%">
						D
					</td>
					<td align="center" width="25%">
						E
					</td>
					<td align="center" width="25%">
						F
					</td>
					<td align="center" width="25%">
						G
					</td>				
				</tr>
				<tr height="110">
					<td id="D14" align="center" class="s14">
						
					</td>
					<td id="E14" align="center" class="s14">
						
					</td>
					<td id="F14" align="center" class="s14">
						
					</td>
					<td id="G14" align="center" class="s14">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D13" align="center" class="s13">
						
					</td>
					<td id="E13" align="center" class="s13">
						
					</td>
					<td id="F13" align="center" class="s13">
						
					</td>
					<td id="G13" align="center" class="s13">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D12" align="center" class="s12">
						
					</td>
					<td id="E12" align="center" class="s12">
						
					</td>
					<td id="F12" align="center" class="s12">
						
					</td>
					<td id="G12" align="center" class="s12">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D11" align="center" class="s11">
						
					</td>
					<td id="E11" align="center" class="s11">
						
					</td>
					<td id="F11" align="center" class="s11">
						
					</td>
					<td id="G11" align="center" class="s11">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D10" align="center" class="s10">
						
					</td>
					<td id="E10" align="center" class="s10">
						
					</td>
					<td id="F10" align="center" class="s10">
						
					</td>
					<td id="G10" align="center" class="s10">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D9" align="center" class="s9">
						
					</td>
					<td id="E9" align="center" class="s9">
						
					</td>
					<td id="F9" align="center" class="s9">
						
					</td>
					<td id="G9" align="center" class="s9">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D8" align="center" class="s8">
						
					</td>
					<td id="E8" align="center" class="s8">
						
					</td>
					<td id="F8" align="center" class="s8">
						
					</td>
					<td id="G8" align="center" class="s8">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D7" align="center" class="s7">
						
					</td>
					<td id="E7" align="center" class="s7">
						
					</td>
					<td id="F7" align="center" class="s7">
						
					</td>
					<td id="G7" align="center" class="s7">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D6" align="center" class="s6">
						
					</td>
					<td id="E6" align="center" class="s6">
						
					</td>
					<td id="F6" align="center" class="s6">
						
					</td>
					<td id="G6" align="center" class="s6">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D5" align="center" class="s5">
						
					</td>
					<td id="E5" align="center" class="s5">
						
					</td>
					<td id="F5" align="center" class="s5">
						
					</td>
					<td id="G5" align="center" class="s5">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D4" align="center" class="s4">
						
					</td>
					<td id="E4" align="center" class="s4">
						
					</td>
					<td id="F4" align="center" class="s4">
						
					</td>
					<td id="G4" align="center" class="s4">
						
					</td>
				</tr>
				<tr height="110">
					<td id="D3" align="center" class="s3">
						
					</td>
					<td id="E3" align="center" class="s3">
						
					</td>
					<td id="F3" align="center" class="s3">
						
					</td>
					<td id="G3" align="center" class="s3">
						
					</td>
				</tr>				
			</table>
		</td>	
		<td>
			<table border=1 width="100%">
				<tr> <!-- STABLE -->
					<td align="center" width="25%">
						H
					</td>
					<td align="center" width="25%">
						I
					</td>
					<td align="center" width="25%">
						J
					</td>				
				</tr>
				<tr height="110">
					<td id="H14" align="center" class="s14">
						
					</td>
					<td id="I14" align="center" class="s14">
						
					</td>
					<td id="J14" align="center" class="s14">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H13" align="center" class="s13">
						
					</td>
					<td id="I13" align="center" class="s13">
						
					</td>
					<td id="J13" align="center" class="s13">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H12" align="center" class="s12">
						
					</td>
					<td id="I12" align="center" class="s12">
						
					</td>
					<td id="J12" align="center" class="s12">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H11" align="center" class="s11">
						
					</td>
					<td id="I11" align="center" class="s11">
						
					</td>
					<td id="J11" align="center" class="s11">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H10" align="center" class="s10">
						
					</td>
					<td id="I10" align="center" class="s10">
						
					</td>
					<td id="J10" align="center" class="s10">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H9" align="center" class="s9">
						
					</td>
					<td id="I9" align="center" class="s9">
						
					</td>
					<td id="J9" align="center" class="s9">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H8" align="center" class="s8">
						
					</td>
					<td id="I8" align="center" class="s8">
						
					</td>
					<td id="J8" align="center" class="s8">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H7" align="center" class="s7">
						
					</td>
					<td id="I7" align="center" class="s7">
						
					</td>
					<td id="J7" align="center" class="s7">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H6" align="center" class="s6">
						
					</td>
					<td id="I6" align="center" class="s6">
						
					</td>
					<td id="J6" align="center" class="s6">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H5" align="center" class="s5">
						
					</td>
					<td id="I5" align="center" class="s5">
						
					</td>
					<td id="J5" align="center" class="s5">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H4" align="center" class="s4">
						
					</td>
					<td id="I4" align="center" class="s4">
						
					</td>
					<td id="J4" align="center" class="s4">
						
					</td>
				</tr>
				<tr height="110">
					<td id="H3" align="center" class="s3">
						
					</td>
					<td id="I3" align="center" class="s3">
						
					</td>
					<td id="J3" align="center" class="s3">
						
					</td>
				</tr>				
			</table>
		</td>
		<td>
			<table border=1 width="100%">
				<tr> <!-- UNDERSTABLE -->
					<td align="center" width="25%">
						K
					</td>
					<td align="center" width="25%">
						L
					</td>
					<td align="center" width="25%">
						M
					</td>
					<td align="center" width="25%">
						N
					</td>				
				</tr>
				<tr height="110">
					<td id="K14" align="center" class="s14">
						
					</td>
					<td id="L14" align="center" class="s14">
						
					</td>
					<td id="M14" align="center" class="s14">
						
					</td>
					<td id="N14" align="center" class="s14">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K13" align="center" class="s13">
						
					</td>
					<td id="L13" align="center" class="s13">
						
					</td>
					<td id="M13" align="center" class="s13">
						
					</td>
					<td id="N13" align="center" class="s13">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K12" align="center" class="s12">
						
					</td>
					<td id="L12" align="center" class="s12">
						
					</td>
					<td id="M12" align="center" class="s12">
						
					</td>
					<td id="N12" align="center" class="s12">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K11" align="center" class="s11">
						
					</td>
					<td id="L11" align="center" class="s11">
						
					</td>
					<td id="M11" align="center" class="s11">
						
					</td>
					<td id="N11" align="center" class="s11">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K10" align="center" class="s10">
						
					</td>
					<td id="L10" align="center" class="s10">
						
					</td>
					<td id="M10" align="center" class="s10">
						
					</td>
					<td id="N10" align="center" class="s10">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K9" align="center" class="s9">
						
					</td>
					<td id="L9" align="center" class="s9">
						
					</td>
					<td id="M9" align="center" class="s9">
						
					</td>
					<td id="N9" align="center" class="s9">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K8" align="center" class="s8">
						
					</td>
					<td id="L8" align="center" class="s8">
						
					</td>
					<td id="M8" align="center" class="s8">
						
					</td>
					<td id="N8" align="center" class="s8">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K7" align="center" class="s7">
						
					</td>
					<td id="L7" align="center" class="s7">
						
					</td>
					<td id="M7" align="center" class="s7">
						
					</td>
					<td id="N7" align="center" class="s7">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K6" align="center" class="s6">
						
					</td>
					<td id="L6" align="center" class="s6">
						
					</td>
					<td id="M6" align="center" class="s6">
						
					</td>
					<td id="N6" align="center" class="s6">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K5" align="center" class="s5">
						
					</td>
					<td id="L5" align="center" class="s5">
						
					</td>
					<td id="M5" align="center" class="s5">
						
					</td>
					<td id="N5" align="center" class="s5">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K4" align="center" class="s4">
						
					</td>
					<td id="L4" align="center" class="s4">
						
					</td>
					<td id="M4" align="center" class="s4">
						
					</td>
					<td id="N4" align="center" class="s4">
						
					</td>
				</tr>
				<tr height="110">
					<td id="K3" align="center" class="s3">
						
					</td>
					<td id="L3" align="center" class="s3">
						
					</td>
					<td id="M3" align="center" class="s3">
						
					</td>
					<td id="N3" align="center" class="s3">
						
					</td>
				</tr>				
			</table>
		</td>
				<td>
			<table border=1 width="100%">
				<tr> <!-- UNDERSTABLE -->
					<td align="center" width="25%">
						O
					</td>
					<td align="center" width="25%">
						P
					</td>
					<td align="center" width="25%">
						Q
					</td>				
				</tr>
				<tr height="110">
					<td id="O14" align="center" class="s14">
						
					</td>
					<td id="P14" align="center" class="s14">
						
					</td>
					<td id="Q14" align="center" class="s14">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O13" align="center" class="s13">
						
					</td>
					<td id="P13" align="center" class="s13">
						
					</td>
					<td id="Q13" align="center" class="s13">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O12" align="center" class="s12">
						
					</td>
					<td id="P12" align="center" class="s12">
						
					</td>
					<td id="Q12" align="center" class="s12">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O11" align="center" class="s11">
						
					</td>
					<td id="P11" align="center" class="s11">
						
					</td>
					<td id="Q11" align="center" class="s11">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O10" align="center" class="s10">
						
					</td>
					<td id="P10" align="center" class="s10">
						
					</td>
					<td id="Q10" align="center" class="s10">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O9" align="center" class="s9">
						
					</td>
					<td id="P9" align="center" class="s9">
						
					</td>
					<td id="Q9" align="center" class="s9">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O8" align="center" class="s8">
						
					</td>
					<td id="P8" align="center" class="s8">
						
					</td>
					<td id="Q8" align="center" class="s8">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O7" align="center" class="s7">
						
					</td>
					<td id="P7" align="center" class="s7">
						
					</td>
					<td id="Q7" align="center" class="s7">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O6" align="center" class="s6">
						
					</td>
					<td id="P6" align="center" class="s6">
						
					</td>
					<td id="Q6" align="center" class="s6">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O5" align="center" class="s5">
						
					</td>
					<td id="P5" align="center" class="s5">
						
					</td>
					<td id="Q5" align="center" class="s5">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O4" align="center" class="s4">
						
					</td>
					<td id="P4" align="center" class="s4">
						
					</td>
					<td id="Q4" align="center" class="s4">
						
					</td>
				</tr>
				<tr height="110">
					<td id="O3" align="center" class="s3">
						
					</td>
					<td id="P3" align="center" class="s3">
						
					</td>
					<td id="Q3" align="center" class="s3">
						
					</td>
				</tr>				
			</table>
		</td>
	</tr>
</table>
</div>


</body>
</html>