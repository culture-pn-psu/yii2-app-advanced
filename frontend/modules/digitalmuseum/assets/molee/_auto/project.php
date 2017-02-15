<html> 
<head> 
<META NAME="GENERATOR" Content="Tourweaver"> 
<title>Virtual Tour Created By Easypano</title> 
</head> 
<body> 
<script type="text/javascript"> 
function getBrowser() { 
var browerInfo = navigator.userAgent.toLowerCase(); 
var typeInfo = (browerInfo.match(/msie|firefox|chrome|safari|opera/) ||"other")[0]; 
var pc = "pc"; 
var prefix = ""; 
if (browerInfo.indexOf("ipad") > 0) { 
pc = "ipad" 
} else if (browerInfo.indexOf("iphone") > 0 || browerInfo.indexOf("ipod") > 0) { 
pc = "iphone" 
} else if (browerInfo.match(/Android/i)) { 
pc = "android" 
} else if (browerInfo.indexOf("touch") > 0 || browerInfo.indexOf("mobile") > 0) { 
pc = "touchMobile" 
} 
switch (typeInfo) { 
case "chrome": 
case "safari": 
prefix = "webkit"; 
break; 
case "msie": 
prefix ="ms"; 
break; 
case "firefox": 
prefix = "Moz"; 
break; 
case "opera": 
prefix = "O"; 
break; 
default: 
prefix = "webkit"; 
break 
} 
return { 
version: (browerInfo.match(/[\s\S]+(?:rv|it|ra|ie)[\/: ]([\d.]+)/) || [])[1], 
plat: navigator.platform.toLowerCase(), 
type: typeInfo, 
pc: pc, 
prefix: prefix 
} 
} 
var _url=""; 
var isPC = getBrowser().pc; 
if(isPC == "pc"){ 
_url="flash/Tourweaver_Project1.html"; 
}else{ 
_url="html5/Project1.html"; 
} 
window.location.href=_url; 
</script> 
</body> 
</html>
