var OxOa3c8=["contains","parentNode","selection","document","type","None","Text","body","rangeCount","window","Control","anchorOffset","childNodes","anchorNode","isCollapsed","focusNode","length","nodeType","nodeName","INPUT","TEXTAREA","BUTTON","IMG","SELECT","TABLE","position","style","absolute","relative","top","contentWindow","contentDocument","parentWindow","id","frames","frameElement","//TODO:frame contentWindow not found?","iframe","editor","img","onload","src","","src_cetemp","contentEditable","designMode","on","clearAttributes","marginTop","0","marginLeft","color","black","background","white","unselectable","2D-Position","LiveResize","innerHTML","outerHTML","MAP","name","useMap","#","areas","href","target","alt","coords",",","\x3Cimg id=\x27myIMAGE","\x27 border=1 src=\x27Images/space.gif\x27 title=\x27","\x27 style=\x27position:absolute;left:","px;top:","px;width:","px;height:","px;z-index:","\x27\x3E","MapLink.php","dialogWidth:380px;dialogHeight:200px;help:no;scroll:no;status:no;resizable:0;","zoom","width","height","\x27  border=1 src=\x27Images/space.gif\x27 title=\x27","\x27 style=\x27position:absolute;z-index:",";width:20;height:20;left:",";top:","myIMAGE","\x3Carea shape=\x27rect\x27 coords=\x27","\x27","href=\x27","\x27 ","target=\x27","alt=\x27","\x3E","PasteHTML","\x3Cmap name=\x27","\x3C/map\x3E","off","AutoMap","display","img_zoom_in","none","img_zoom_out","img_bestfit","img_actualsize"];function Element_Contains(element,Ox68){if(!Browser_IsOpera()){if(element[OxOa3c8[0]]){return element.contains(Ox68);} ;} ;for(;Ox68!=null;Ox68=Ox68[OxOa3c8[1]]){if(element==Ox68){return true;} ;} ;return false;} ;function Window_CreateSelectionRange(Ox90){var Ox114;if(Browser_UseIESelection()){var Ox20=Ox90[OxOa3c8[3]][OxOa3c8[2]];if(Ox20[OxOa3c8[4]]==OxOa3c8[5]||Ox20[OxOa3c8[4]]==OxOa3c8[6]){Ox114=Ox20.createRange();} else {Ox114=document[OxOa3c8[7]].createTextRange();Ox114.moveToElement(Ox20.createRange().item(0));} ;} else {var Ox20=Ox90.getSelection();if(Ox20[OxOa3c8[8]]==0){Ox114=Ox90[OxOa3c8[3]].createRange();} else {Ox114=Ox20.getRangeAt(0).cloneRange();} ;} ;Ox114[OxOa3c8[9]]=Ox90;return Ox114;} ;function Window_GetSelectionNode(Ox90){var Ox68=Window_GetSelectionNode_Core(Ox90);if(Ox68==Ox90[OxOa3c8[3]][OxOa3c8[7]]){return null;} ;if(!Element_Contains(Ox90[OxOa3c8[3]].body,Ox68)){return null;} ;return Ox68;} ;function Window_GetSelectionNode_Core(Ox90){var Ox20;if(Browser_UseIESelection()){Ox20=Ox90[OxOa3c8[3]][OxOa3c8[2]];if(Ox20[OxOa3c8[4]]==OxOa3c8[5]||Ox20[OxOa3c8[4]]==OxOa3c8[6]){return Ox20.createRange().parentElement();} ;return Ox20.createRange().item(0);} ;var Ox20=Ox90.getSelection();if(Window_GetSelectionType(Ox90)==OxOa3c8[10]){return Ox20[OxOa3c8[13]][OxOa3c8[12]][Ox20[OxOa3c8[11]]];} ;if(Ox20[OxOa3c8[14]]){return Ox20[OxOa3c8[13]];} ;if(Ox20[OxOa3c8[13]]==Ox20[OxOa3c8[15]]){return Ox20[OxOa3c8[13]];} ;var p=Ox20[OxOa3c8[13]];var Ox23f=p[OxOa3c8[12]];for(var i=0;i<Ox23f[OxOa3c8[16]];i++){var Ox134=Ox23f.item(i);if(Ox20.containsNode(Ox134,true)){if(i!=0&&Ox20.containsNode(Ox23f.item(i-1),false)){continue ;} ;if(i<Ox23f[OxOa3c8[16]]-1&&Ox20.containsNode(Ox23f.item(i+1),false)){continue ;} ;return Ox134;} ;} ;if(Ox20[OxOa3c8[8]]==1){return Range_GetParentNode(Window_CreateSelectionRange(Ox90));} ;if(!Element_Contains(Ox90[OxOa3c8[3]].body,Ox20.anchorNode)){return null;} ;return Element_GetSameParent(Ox20.anchorNode,Ox20.focusNode);} ;function Window_GetSelectionElement(Ox90){var Ox68=Window_GetSelectionNode(Ox90);if(Ox68==null){return null;} ;if(Ox68[OxOa3c8[17]]==1){return Ox68;} ;return Ox68[OxOa3c8[1]];} ;function Window_GetSelectionType(Ox90){if(Browser_UseIESelection()){return Ox90[OxOa3c8[3]][OxOa3c8[2]][OxOa3c8[4]];} ;var Ox20=Ox90.getSelection();if(Ox20[OxOa3c8[14]]){return OxOa3c8[6];} ;if(Ox20[OxOa3c8[13]]!=Ox20[OxOa3c8[15]]){return OxOa3c8[6];} ;var p=Ox20[OxOa3c8[13]];var Ox23f=p[OxOa3c8[12]];for(var i=0;i<Ox23f[OxOa3c8[16]];i++){var Ox134=Ox23f.item(i);if(Ox134[OxOa3c8[17]]!=1){continue ;} ;if(Ox20.containsNode(Ox134,true)){if(i!=0&&Ox20.containsNode(Ox23f.item(i-1),false)){continue ;} ;if(i<Ox23f[OxOa3c8[16]]-1&&Ox20.containsNode(Ox23f.item(i+1),false)){continue ;} ;if(Element_IsBlockControl(Ox134)){return OxOa3c8[10];} ;return OxOa3c8[6];} ;} ;return OxOa3c8[6];} ;function Element_IsBlockControl(element){var name=element[OxOa3c8[18]];if(name==OxOa3c8[19]){return true;} ;if(name==OxOa3c8[20]){return true;} ;if(name==OxOa3c8[21]){return true;} ;if(name==OxOa3c8[22]){return true;} ;if(name==OxOa3c8[23]){return true;} ;if(name==OxOa3c8[24]){return true;} ;var Ox34=element[OxOa3c8[26]][OxOa3c8[25]];if(Ox34==OxOa3c8[27]||Ox34==OxOa3c8[28]){return true;} ;return false;} ;function Window_GetDialogTop(Ox90){return Ox90[OxOa3c8[29]];} ;function Frame_GetContentWindow(Ox245){if(Ox245[OxOa3c8[30]]){return Ox245[OxOa3c8[30]];} ;if(Ox245[OxOa3c8[31]]){if(Ox245[OxOa3c8[31]][OxOa3c8[32]]){return Ox245[OxOa3c8[31]][OxOa3c8[32]];} ;} ;var Ox90;if(Ox245[OxOa3c8[33]]){Ox90=window[OxOa3c8[34]][Ox245[OxOa3c8[33]]];if(Ox90){return Ox90;} ;} ;var len=window[OxOa3c8[34]][OxOa3c8[16]];for(var i=0;i<len;i++){Ox90=window[OxOa3c8[34]][i];if(Ox90[OxOa3c8[35]]==Ox245){return Ox90;} ;if(Ox90[OxOa3c8[3]]==Ox245[OxOa3c8[31]]){return Ox90;} ;} ;Debug_Todo(OxOa3c8[36]);} ;var iframe=Window_GetElement(window,OxOa3c8[37],true);var iframe_win=Frame_GetContentWindow(iframe);var obj=Window_GetDialogArguments(window);var editor=obj[OxOa3c8[38]];var editwin=obj[OxOa3c8[9]];var editdoc=obj[OxOa3c8[3]];var oImg=obj[OxOa3c8[39]];var oMap=null;var aMapName= new Array();var aLeft= new Array();var aTop= new Array();var aWidth= new Array();var aHeight= new Array();var aHref= new Array();var aTarget= new Array();var aTitle= new Array();var aCoords= new Array();window[OxOa3c8[40]]=function window_onload(){var src;src=oImg.getAttribute(OxOa3c8[41])+OxOa3c8[42];if(oImg.getAttribute(OxOa3c8[43])){src=oImg.getAttribute(OxOa3c8[43])+OxOa3c8[42];} ;oImg[OxOa3c8[41]]=src;if(Browser_IsWinIE()){iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[44]]=true;} else {iframe_win[OxOa3c8[3]][OxOa3c8[45]]=OxOa3c8[46];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[44]]=true;} ;iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[47]];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[48]]=OxOa3c8[49];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[50]]=OxOa3c8[49];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[51]]=OxOa3c8[52];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[53]]=OxOa3c8[54];oImg[OxOa3c8[55]]=OxOa3c8[46];if(Browser_IsWinIE()){iframe_win[OxOa3c8[3]].execCommand(OxOa3c8[56],true,true);iframe_win[OxOa3c8[3]].execCommand(OxOa3c8[57],true,true);} ;iframe_win.focus();if(Browser_IsWinIE()){iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[58]]=oImg[OxOa3c8[59]];} else {iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[58]]=outerHTML(oImg);} ;var Ox253=editdoc[OxOa3c8[7]].getElementsByTagName(OxOa3c8[60]);for(var i=0;i<Ox253[OxOa3c8[16]];i++){aMapName[i]=Ox253[i][OxOa3c8[61]].toUpperCase();} ;var Ox254=oImg[OxOa3c8[62]];if(Ox254!=OxOa3c8[42]){Ox254=Ox254.toUpperCase();for(var i=0;i<Ox253[OxOa3c8[16]];i++){if((OxOa3c8[63]+aMapName[i])==Ox254){oMap=Ox253[i];} ;} ;} ;if(oMap){for(var i=0;i<oMap[OxOa3c8[64]][OxOa3c8[16]];i++){aHref[i]=oMap[OxOa3c8[64]][i][OxOa3c8[65]];aTarget[i]=oMap[OxOa3c8[64]][i][OxOa3c8[66]];aTitle[i]=oMap[OxOa3c8[64]][i][OxOa3c8[67]];aCoords[i]=oMap[OxOa3c8[64]][i][OxOa3c8[68]];var Ox15f=aCoords[i].split(OxOa3c8[69]);aLeft[i]=parseInt(Ox15f[0]);aTop[i]=parseInt(Ox15f[1]);aWidth[i]=parseInt(Ox15f[2])-aLeft[i];aHeight[i]=parseInt(Ox15f[3])-aTop[i];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[58]]+=OxOa3c8[70]+i+OxOa3c8[71]+AddLinktoImageMap+OxOa3c8[72]+aLeft[i]+OxOa3c8[73]+aTop[i]+OxOa3c8[74]+aWidth[i]+OxOa3c8[75]+aHeight[i]+OxOa3c8[76]+(i+1)+OxOa3c8[77];} ;} ;} ;function SearchSelectionElement(Ox256){var body=iframe_win[OxOa3c8[3]][OxOa3c8[7]];for(var Ox3a=Window_GetSelectionElement(iframe_win);Element_Contains(body,Ox3a);Ox3a=Ox3a[OxOa3c8[1]]){if(Ox3a[OxOa3c8[18]]==Ox256){return Ox3a;} ;} ;return null;} ;function Addlink(){var img=SearchSelectionElement(OxOa3c8[22]);if(!img){return ;} ;function Ox25a(arr){if(arr){aHref[Ox25c]=arr[0];aTarget[Ox25c]=arr[1];aTitle[Ox25c]=arr[2];} ;} ;var Ox25b=img[OxOa3c8[33]];var Ox25c=parseInt(Ox25b.substr(7));var obj={editor:editor,href:aHref[Ox25c],target:aTarget[Ox25c],title:aTitle[Ox25c]};editor.SetNextDialogWindow(window);editor.ShowDialog(Ox25a,OxOa3c8[78]+query_string,obj,OxOa3c8[79]);} ;function do_Close(){Window_SetDialogReturnValue(window,null);Window_CloseDialog(window);} ;function Zoom_In(){if(iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]!=0){iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]*=1.2;} else {iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]=1.2;} ;} ;function Zoom_Out(){if(iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]!=0){iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]*=0.8;} else {iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]=0.8;} ;} ;function BestFit(){if(!oImg){return ;} ;var Ox260=280;var Ox33=290;iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]=1/Math.max(oImg[OxOa3c8[81]]/Ox33,oImg[OxOa3c8[82]]/Ox260);} ;function Actualsize(){iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[26]][OxOa3c8[80]]=1;} ;function newMap(){var Ox8d=aHref[OxOa3c8[16]];var Ox263=(oImg[OxOa3c8[81]]-20)*0.5;var Ox236=(oImg[OxOa3c8[82]]-20)*0.5;aHref[Ox8d]=OxOa3c8[42];aTarget[Ox8d]=OxOa3c8[42];aTitle[Ox8d]=OxOa3c8[42];iframe_win[OxOa3c8[3]][OxOa3c8[7]][OxOa3c8[58]]+=OxOa3c8[70]+Ox8d+OxOa3c8[83]+AddLinktoImageMap+OxOa3c8[84]+(Ox8d+1)+OxOa3c8[85]+Ox263+OxOa3c8[86]+Ox236+OxOa3c8[77];iframe_win.scrollBy(0,0);iframe_win.focus();} ;function do_insert(){var Ox3b=false;for(var i=0;i<aHref[OxOa3c8[16]];i++){var obj=Window_GetElement(iframe_win,OxOa3c8[87]+i,false);if(obj){Ox3b=true;} ;} ;if(Ox3b){var Ox176=OxOa3c8[42];for(var i=0;i<aHref[OxOa3c8[16]];i++){var obj=Window_GetElement(iframe_win,OxOa3c8[87]+i,false);if(obj){var Ox264=parseInt(obj[OxOa3c8[26]].left);var Ox265=parseInt(obj[OxOa3c8[26]].top);var Ox266=parseInt(obj[OxOa3c8[26]].width);var Ox267=parseInt(obj[OxOa3c8[26]].height);var Ox268=Ox264+Ox266;var Ox269=Ox265+Ox267;Ox176+=OxOa3c8[88]+Ox264+OxOa3c8[69]+Ox265+OxOa3c8[69]+Ox268+OxOa3c8[69]+Ox269+OxOa3c8[89];if(aHref[i]!=OxOa3c8[42]){Ox176+=OxOa3c8[90]+aHref[i]+OxOa3c8[91];} ;if((aTarget[i]!=OxOa3c8[42])&&aTarget[i]){Ox176+=OxOa3c8[92]+aTarget[i]+OxOa3c8[91];} ;if(aTitle[i]!=OxOa3c8[42]&&aTitle[i]!=null){Ox176+=OxOa3c8[93]+aTitle[i]+OxOa3c8[91];} ;Ox176+=OxOa3c8[94];} ;} ;if(oMap){oMap[OxOa3c8[58]]=Ox176;} else {var Ox254=getAutoMapName();oImg[OxOa3c8[62]]=OxOa3c8[63]+Ox254;editor.ExecCommand(OxOa3c8[95],false,OxOa3c8[96]+Ox254+OxOa3c8[77]+Ox176+OxOa3c8[97]);} ;} else {if(oMap){if(Browser_IsWinIE()){oMap[OxOa3c8[59]]=OxOa3c8[42];} ;} ;oImg[OxOa3c8[62]]=OxOa3c8[42];} ;oImg[OxOa3c8[55]]=OxOa3c8[98];oImg.removeAttribute(OxOa3c8[55]);if(!Browser_IsWinIE()){editor.InsertElement(oImg);} ;Window_CloseDialog(window);} ;function getAutoMapName(){for(var i=1;true;i++){var Ox49=OxOa3c8[99]+i;if(isValidMapName(Ox49)){return Ox49;} ;} ;} ;function isValidMapName(Ox1b){Ox1b=Ox1b.toUpperCase();for(var i=0;i<aMapName[OxOa3c8[16]];i++){if(aMapName[i]==Ox1b){return false;} ;} ;return true;} ;function do_Close(){oImg.removeAttribute(OxOa3c8[55]);Window_CloseDialog(window);} ;if(!Browser_IsWinIE()){Window_GetElement(window,OxOa3c8[101],true)[OxOa3c8[26]][OxOa3c8[100]]=OxOa3c8[102];Window_GetElement(window,OxOa3c8[103],true)[OxOa3c8[26]][OxOa3c8[100]]=OxOa3c8[102];Window_GetElement(window,OxOa3c8[104],true)[OxOa3c8[26]][OxOa3c8[100]]=OxOa3c8[102];Window_GetElement(window,OxOa3c8[105],true)[OxOa3c8[26]][OxOa3c8[100]]=OxOa3c8[102];} ;