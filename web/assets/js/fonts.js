
var count=document.createElement('script');count.type='text/javascript';count.async=true;count.src='//hello.myfonts.net/count/25e7ae';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(count,s);var browserName,browserVersion,webfontType;if(typeof(customPath)=='undefined')
var customPath=false;if(typeof(woffEnabled)=='undefined')
var woffEnabled=true;if(/myfonts_test=on/.test(window.location.search))
var myfonts_webfont_test=true;else if(typeof(myfonts_webfont_test)=='undefined')
var myfonts_webfont_test=false;if(customPath)
var path=customPath;else
{var scripts=document.getElementsByTagName("SCRIPT");var script=scripts[scripts.length-1].src;if(!script.match("://")&&script.charAt(0)!='/')
script="./"+script;var path=script.replace(/\\/g,'/').replace(/\/[^\/]*\/?$/,'');}
var wfpath=path+"/webfonts/";if(myfonts_webfont_test)
document.write('<script type="text/javascript" src="'+path+'/"></script>');var haveWOFF=1;var haveTTF=1;if(/(Macintosh|Android)/.test(navigator.userAgent))
var suffix="_unhinted";else
var suffix="";if(/webfont=(woff|ttf|eot)/.test(window.location.search))
webfontType=RegExp.$1;else if(/MSIE (\d+\.\d+)/.test(navigator.userAgent))
{browserName='MSIE';browserVersion=new Number(RegExp.$1);if(haveWOFF&&browserVersion>=9.0&&woffEnabled)
webfontType='woff';else if(browserVersion>=5.0)
webfontType='eot';}
else if(/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent))
{browserName='Firefox';browserVersion=new Number(RegExp.$1);if(haveWOFF&&browserVersion>=3.6&&woffEnabled)
webfontType='woff';else if(browserVersion>=3.5)
webfontType='ttf';}
else if(/Chrome\/(\d+\.\d+)/.test(navigator.userAgent))
{browserName='Chrome';browserVersion=new Number(RegExp.$1);if(haveWOFF&&browserVersion>=6.0&&woffEnabled)
webfontType='woff';else if(browserVersion>=4.0)
webfontType='ttf';}
else if(/Mozilla.*(iPhone|iPad).* OS (\d+)_(\d+).* AppleWebKit.*Safari/.test(navigator.userAgent))
{browserName='MobileSafari';browserVersion=new Number(RegExp.$2)+(new Number(RegExp.$3)/10)
suffix="_unhinted";if(browserVersion>=4.2&&(haveTTF||haveData))
webfontType='ttf';else
webfontType='svg';}
else if(/Mozilla.*(iPhone|iPad|BlackBerry).*AppleWebKit.*Safari/.test(navigator.userAgent))
{browserName='MobileSafari';webfontType='svg';}
else if(/Safari\/(\d+\.\d+)/.test(navigator.userAgent))
{browserName='Safari';if(/Version\/(\d+\.\d+)/.test(navigator.userAgent))
{browserVersion=new Number(RegExp.$1);if(browserVersion>=5.1&&haveWOFF)
webfontType='woff';else if(browserVersion>=3.1)
webfontType='ttf';}}
else if(/Opera\/(\d+\.\d+)/.test(navigator.userAgent))
{browserName='Opera';if(/Version\/(\d+\.\d+)/.test(navigator.userAgent))
{browserVersion=new Number(RegExp.$1);if(haveWOFF&&browserVersion>=11.1&&woffEnabled)
webfontType='woff';else if(browserVersion>=10.1)
webfontType='ttf';}}
switch(webfontType)
{case'eot':document.write("<style>\n");document.write("@font-face{font-family: 'Expressway';font-weight: normal;font-style: normal;src:url(\""+wfpath+"25E7AE_0_0.eot\");font-weight:'normal';font-style:'normal';}\n");document.write("@font-face{font-family: 'Expressway';font-weight: bold;font-style: normal;src:url(\""+wfpath+"25E7AE_1_0.eot\");font-weight:'bold';font-style:'normal';}\n");document.write("</style>");break;case'woff':document.write("<style>\n");document.write("@font-face{font-family: 'Expressway';font-weight: normal;font-style: normal;src:url(\""+wfpath+"25E7AE_0"+suffix+"_0.woff\") format(\"woff\");font-weight:'normal';font-style:'normal';}\n");document.write("@font-face{font-family: 'Expressway';font-weight: bold;font-style: normal;src:url(\""+wfpath+"25E7AE_1"+suffix+"_0.woff\") format(\"woff\");font-weight:'bold';font-style:'normal';}\n");document.write("</style>");break;case'ttf':document.write("<style>\n");document.write("@font-face{font-family: 'Expressway';font-weight: normal;font-style: normal;src:url(\""+wfpath+"25E7AE_0"+suffix+"_0.ttf\");font-weight:'normal';font-style:'normal';}\n");document.write("@font-face{font-family: 'Expressway';font-weight: bold;font-style: normal;src:url(\""+wfpath+"25E7AE_1"+suffix+"_0.ttf\");font-weight:'bold';font-style:'normal';}\n");document.write("</style>");break;default:break;}