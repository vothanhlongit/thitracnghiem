var OxO5607=["value","","nodeType","nodeName","divpreview","Width","Height","AutoStart","ShowControls","ShowStatusBar","WindowlessVideo","TargetUrl","Button1","Button2","btn_zoom_in","btn_zoom_out","btn_Actualsize","btn_CreateDir","browse_Frame","contentWindow","checked","\x3Cembed name=\x22MediaPlayer1\x22 src=\x22","\x22 autostart=\x22","\x22 showcontrols=\x22","\x22  windowlessvideo=\x22","\x22 showstatusbar=\x22","\x22 width=\x22","\x22 height=\x22","\x22 type=\x22application/x-mplayer2\x22 pluginspage=\x22http://www.microsoft.com/Windows/MediaPlayer\x22 \x3E\x3C/embed\x3E\x0A","\x3Cobject classid=\x22CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95\x22 "," codebase=\x22http://activex.microsoft.com/activex/"," controls/mplayer/en/nsmp2inf.cab#Version=6,0,02,902\x22 "," standby=\x22Loading Microsoft Windows Media Player components...\x22 "," type=\x22application/x-oleobject\x22","  height=\x22","\x22 \x3E","\x3Cparam name=\x22FileName\x22 value=\x22","\x22/\x3E","\x3Cparam name=\x22autoStart\x22 value=\x22","\x3Cparam name=\x22showControls\x22 value=\x22","\x3Cparam name=\x22showstatusbar\x22 value=\x22","\x3Cparam name=\x22windowlessvideo\x22 value=\x22","\x3C/object\x3E","innerHTML","onbeforeunload","onunload","Please choose a Media movie to insert","\x22 windowlessvideo=\x22","zoom","style","wrapupPrompt","iepromptfield","display","none","body","div","id","IEPromptBox","promptBlackout","border","1px solid #b0bec7","backgroundColor","#f0f0f0","position","absolute","width","330px","zIndex","100","\x3Cdiv style=\x22width: 100%; padding-top:3px;background-color: #DCE7EB; font-family: verdana; font-size: 10pt; font-weight: bold; height: 22px; text-align:center; background:url(../Images/formbg2.gif) repeat-x left top;\x22\x3E","\x3C/div\x3E","\x3Cdiv style=\x22padding: 10px\x22\x3E","\x3CBR\x3E\x3CBR\x3E","\x3Cform action=\x22\x22 onsubmit=\x22return wrapupPrompt()\x22\x3E","\x3Cinput id=\x22iepromptfield\x22 name=\x22iepromptdata\x22 type=text size=46 value=\x22","\x22\x3E","\x3Cbr\x3E\x3Cbr\x3E\x3Ccenter\x3E","\x3Cinput type=\x22submit\x22 value=\x22\x26nbsp;\x26nbsp;\x26nbsp;","\x26nbsp;\x26nbsp;\x26nbsp;\x22\x3E","\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;","\x3Cinput type=\x22button\x22 onclick=\x22wrapupPrompt(true)\x22 value=\x22\x26nbsp;","\x26nbsp;\x22\x3E","\x3C/form\x3E\x3C/div\x3E","top","100px","left","offsetWidth","px","block","onmouseover","CuteEditor_ColorPicker_ButtonOver(this)"];setMouseOver();function setMouseOver(){} ;function ResetFields(){TargetUrl[OxO5607[0]]=OxO5607[1];} ;function RequireFileBrowseScript(){} ;function Actualsize(){} ;function getParent(Ox131,Ox303){if(Ox131==null){return null;} else {if(Ox131[OxO5607[2]]==1&&Ox131[OxO5607[3]].toLowerCase()==Ox303.toLowerCase()){return Ox131;} else {return getParent(Ox131.parentNode,Ox303);} ;} ;} ;RequireFileBrowseScript();var divpreview=Window_GetElement(window,OxO5607[4],true);var Width=Window_GetElement(window,OxO5607[5],true);var Height=Window_GetElement(window,OxO5607[6],true);var AutoStart=Window_GetElement(window,OxO5607[7],true);var ShowControls=Window_GetElement(window,OxO5607[8],true);var ShowStatusBar=Window_GetElement(window,OxO5607[9],true);var WindowlessVideo=Window_GetElement(window,OxO5607[10],true);var TargetUrl=Window_GetElement(window,OxO5607[11],true);var Button1=Window_GetElement(window,OxO5607[12],true);var Button2=Window_GetElement(window,OxO5607[13],true);var btn_zoom_in=Window_GetElement(window,OxO5607[14],true);var btn_zoom_out=Window_GetElement(window,OxO5607[15],true);var btn_Actualsize=Window_GetElement(window,OxO5607[16],true);var CreateDir=Window_GetElement(window,OxO5607[17],true);var browse_Frame=Window_GetElement(window,OxO5607[18],true);browse_Frame=browse_Frame[OxO5607[19]];var editor=Window_GetDialogArguments(window);do_preview();function do_preview(){var Ox308;var Ox33;var Ox260;if(TargetUrl[OxO5607[0]]==OxO5607[1]){return ;} ;var Ox309,Ox30a,Ox30b;if(AutoStart[OxO5607[20]]){Ox309=1;} else {Ox309=0;} ;if(ShowStatusBar[OxO5607[20]]){Ox30a=1;} else {Ox30a=0;} ;if(ShowControls[OxO5607[20]]){Ox30b=1;} else {Ox30b=0;} ;if(WindowlessVideo[OxO5607[20]]){windowlessvideo=true;} else {windowlessvideo=false;} ;Ox33=Width[OxO5607[0]]+OxO5607[1];Ox260=Height[OxO5607[0]]+OxO5607[1];Ox33=parseInt(Ox33);Ox260=parseInt(Ox260);var Ox2c4=OxO5607[21]+TargetUrl[OxO5607[0]]+OxO5607[22]+Ox309+OxO5607[23]+Ox30b+OxO5607[24]+windowlessvideo+OxO5607[25]+Ox30a+OxO5607[26]+Ox33+OxO5607[27]+Ox260+OxO5607[28];var Ox29f=OxO5607[29]+OxO5607[30]+OxO5607[31]+OxO5607[32]+OxO5607[33]+OxO5607[34]+Ox260+OxO5607[26]+Ox33+OxO5607[35];Ox29f=Ox29f+OxO5607[36]+TargetUrl[OxO5607[0]]+OxO5607[37];Ox29f=Ox29f+OxO5607[38]+Ox309+OxO5607[37];Ox29f=Ox29f+OxO5607[39]+Ox30b+OxO5607[37];Ox29f=Ox29f+OxO5607[40]+Ox30a+OxO5607[37];Ox29f=Ox29f+OxO5607[41]+windowlessvideo+OxO5607[37];Ox29f=Ox29f+Ox2c4+OxO5607[42];Ox2c4=Ox29f;divpreview[OxO5607[43]]=Ox2c4;} ;window[OxO5607[44]]=window[OxO5607[45]]=function (){divpreview[OxO5607[43]]=OxO5607[1];} ;var parameters= new Array();function do_insert(){divpreview[OxO5607[43]]=OxO5607[1];if(TargetUrl[OxO5607[0]]==OxO5607[1]){alert(OxO5607[46]);return false;} ;var Ox309,Ox30a,Ox30b;if(AutoStart[OxO5607[20]]){Ox309=1;} else {Ox309=0;} ;if(ShowStatusBar[OxO5607[20]]){Ox30a=1;} else {Ox30a=0;} ;if(ShowControls[OxO5607[20]]){Ox30b=1;} else {Ox30b=0;} ;if(WindowlessVideo[OxO5607[20]]){windowlessvideo=true;} else {windowlessvideo=false;} ;width=Width[OxO5607[0]]+OxO5607[1];height=Height[OxO5607[0]]+OxO5607[1];width=parseInt(width);height=parseInt(height);var Ox2c4=OxO5607[21]+TargetUrl[OxO5607[0]]+OxO5607[22]+Ox309+OxO5607[23]+Ox30b+OxO5607[25]+Ox30a+OxO5607[47]+windowlessvideo+OxO5607[26]+width+OxO5607[27]+height+OxO5607[28];var Ox29f=OxO5607[29]+OxO5607[30]+OxO5607[31]+OxO5607[32]+OxO5607[33]+OxO5607[34]+height+OxO5607[26]+width+OxO5607[35];Ox29f=Ox29f+OxO5607[36]+TargetUrl[OxO5607[0]]+OxO5607[37];Ox29f=Ox29f+OxO5607[38]+Ox309+OxO5607[37];Ox29f=Ox29f+OxO5607[39]+Ox30b+OxO5607[37];Ox29f=Ox29f+OxO5607[40]+Ox30a+OxO5607[37];Ox29f=Ox29f+OxO5607[41]+windowlessvideo+OxO5607[37];Ox29f=Ox29f+Ox2c4+OxO5607[42];Ox2c4=Ox29f;editor.PasteHTML(Ox2c4);Window_CloseDialog(window);} ;function do_Close(){divpreview[OxO5607[43]]=OxO5607[1];Window_CloseDialog(window);} ;function Zoom_In(){if(divpreview[OxO5607[49]][OxO5607[48]]!=0){divpreview[OxO5607[49]][OxO5607[48]]*=1.2;} else {divpreview[OxO5607[49]][OxO5607[48]]=1.2;} ;} ;function Zoom_Out(){if(divpreview[OxO5607[49]][OxO5607[48]]!=0){divpreview[OxO5607[49]][OxO5607[48]]*=0.8;} else {divpreview[OxO5607[49]][OxO5607[48]]=0.8;} ;} ;function Actualsize(){divpreview[OxO5607[49]][OxO5607[48]]=1;do_preview();} ;if(Browser_IsIE7()){var _dialogPromptID=null;function IEprompt(Ox10d,Ox10e,Ox10f){that=this;this[OxO5607[50]]=function (Ox110){val=document.getElementById(OxO5607[51])[OxO5607[0]];_dialogPromptID[OxO5607[49]][OxO5607[52]]=OxO5607[53];document.getElementById(OxO5607[51])[OxO5607[0]]=OxO5607[1];if(Ox110){val=OxO5607[1];} ;Ox10d(val);return false;} ;if(Ox10f==undefined){Ox10f=OxO5607[1];} ;if(_dialogPromptID==null){var Ox111=document.getElementsByTagName(OxO5607[54])[0];tnode=document.createElement(OxO5607[55]);tnode[OxO5607[56]]=OxO5607[57];Ox111.appendChild(tnode);_dialogPromptID=document.getElementById(OxO5607[57]);tnode=document.createElement(OxO5607[55]);tnode[OxO5607[56]]=OxO5607[58];Ox111.appendChild(tnode);_dialogPromptID[OxO5607[49]][OxO5607[59]]=OxO5607[60];_dialogPromptID[OxO5607[49]][OxO5607[61]]=OxO5607[62];_dialogPromptID[OxO5607[49]][OxO5607[63]]=OxO5607[64];_dialogPromptID[OxO5607[49]][OxO5607[65]]=OxO5607[66];_dialogPromptID[OxO5607[49]][OxO5607[67]]=OxO5607[68];} ;var Ox112=OxO5607[69]+InputRequired+OxO5607[70];Ox112+=OxO5607[71]+Ox10e+OxO5607[72];Ox112+=OxO5607[73];Ox112+=OxO5607[74]+Ox10f+OxO5607[75];Ox112+=OxO5607[76];Ox112+=OxO5607[77]+OK+OxO5607[78];Ox112+=OxO5607[79];Ox112+=OxO5607[80]+Cancel+OxO5607[81];Ox112+=OxO5607[82];_dialogPromptID[OxO5607[43]]=Ox112;_dialogPromptID[OxO5607[49]][OxO5607[83]]=OxO5607[84];_dialogPromptID[OxO5607[49]][OxO5607[85]]=parseInt((document[OxO5607[54]][OxO5607[86]]-315)/2)+OxO5607[87];_dialogPromptID[OxO5607[49]][OxO5607[52]]=OxO5607[88];var Ox113=document.getElementById(OxO5607[51]);try{var Ox114=Ox113.createTextRange();Ox114.collapse(false);Ox114.select();} catch(x){Ox113.focus();} ;} ;} ;if(!Browser_IsWinIE()){btn_zoom_in[OxO5607[49]][OxO5607[52]]=btn_zoom_out[OxO5607[49]][OxO5607[52]]=btn_Actualsize[OxO5607[49]][OxO5607[52]]=OxO5607[53];} else {} ;if(CreateDir){CreateDir[OxO5607[89]]= new Function(OxO5607[90]);} ;if(btn_zoom_in){btn_zoom_in[OxO5607[89]]= new Function(OxO5607[90]);} ;if(btn_zoom_out){btn_zoom_out[OxO5607[89]]= new Function(OxO5607[90]);} ;if(btn_Actualsize){btn_Actualsize[OxO5607[89]]= new Function(OxO5607[90]);} ;