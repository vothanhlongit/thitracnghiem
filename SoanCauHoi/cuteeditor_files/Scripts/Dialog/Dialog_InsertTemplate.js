var OxOd5d5=["value","","onload","uploader1","browse_Frame","height","style","250px","contentWindow","btn_CreateDir","btn_zoom_in","btn_zoom_out","btn_Actualsize","TargetUrl","framepreview","innerHTML","HTML","document","body","DIV","innerText","?","\x26#",";","zoom","wrapupPrompt","iepromptfield","display","none","div","id","IEPromptBox","promptBlackout","border","1px solid #b0bec7","backgroundColor","#f0f0f0","position","absolute","width","330px","zIndex","100","\x3Cdiv style=\x22width: 100%; padding-top:3px;background-color: #DCE7EB; font-family: verdana; font-size: 10pt; font-weight: bold; height: 22px; text-align:center; background:url(../Images/formbg2.gif) repeat-x left top;\x22\x3E","\x3C/div\x3E","\x3Cdiv style=\x22padding: 10px\x22\x3E","\x3CBR\x3E\x3CBR\x3E","\x3Cform action=\x22\x22 onsubmit=\x22return wrapupPrompt()\x22\x3E","\x3Cinput id=\x22iepromptfield\x22 name=\x22iepromptdata\x22 type=text size=46 value=\x22","\x22\x3E","\x3Cbr\x3E\x3Cbr\x3E\x3Ccenter\x3E","\x3Cinput type=\x22submit\x22 value=\x22\x26nbsp;\x26nbsp;\x26nbsp;","\x26nbsp;\x26nbsp;\x26nbsp;\x22\x3E","\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;","\x3Cinput type=\x22button\x22 onclick=\x22wrapupPrompt(true)\x22 value=\x22\x26nbsp;","\x26nbsp;\x22\x3E","\x3C/form\x3E\x3C/div\x3E","top","100px","left","offsetWidth","px","block","onmouseover","CuteEditor_ColorPicker_ButtonOver(this)"];setMouseOver();function setMouseOver(){} ;function ResetFields(){TargetUrl[OxOd5d5[0]]=OxOd5d5[1];} ;function reset_hiddens(){} ;Event_Attach(window,OxOd5d5[2],reset_hiddens);var uploader1=Window_GetElement(window,OxOd5d5[3],true);var browse_Frame=Window_GetElement(window,OxOd5d5[4],true);if(!Browser_IsWinIE()){browse_Frame[OxOd5d5[6]][OxOd5d5[5]]=OxOd5d5[7];} ;browse_Frame=browse_Frame[OxOd5d5[8]];var btn_CreateDir=Window_GetElement(window,OxOd5d5[9],true);var btn_zoom_in=Window_GetElement(window,OxOd5d5[10],true);var btn_zoom_out=Window_GetElement(window,OxOd5d5[11],true);var btn_Actualsize=Window_GetElement(window,OxOd5d5[12],true);var TargetUrl=Window_GetElement(window,OxOd5d5[13],true);var framepreview=document.getElementById(OxOd5d5[14])[OxOd5d5[8]];var editor=Window_GetDialogArguments(window);var htmlcode=OxOd5d5[1];function do_preview(){try{htmlcode=framepreview[OxOd5d5[17]].getElementsByTagName(OxOd5d5[16])[0][OxOd5d5[15]];} catch(er){htmlcode=framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[15]];var Ox2c=document.createElement(OxOd5d5[19]);Ox2c[OxOd5d5[15]]=htmlcode;htmlcode=Ox2c[OxOd5d5[20]];} ;} ;function do_insert(){var Ox121=TargetUrl[OxOd5d5[0]];if(Ox121.indexOf(OxOd5d5[21])!=-1){htmlcode=framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[15]];} ;htmlcode=htmlcode.replace(/[\u00A0-\u00FF|\u00FF-\uFFFF]/g,function (Ox15f,Ox3b,Ox134){return OxOd5d5[22]+Ox15f.charCodeAt(0)+OxOd5d5[23];} );editor.PasteHTML(htmlcode);Window_CloseDialog(window);} ;function do_Close(){Window_CloseDialog(window);} ;function Zoom_In(){if(framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]!=0){framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]*=1.1;} else {framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]=1.1;} ;} ;function Zoom_Out(){if(framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]!=0){framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]*=0.8;} else {framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]=0.8;} ;} ;function Actualsize(){framepreview[OxOd5d5[17]][OxOd5d5[18]][OxOd5d5[6]][OxOd5d5[24]]=1;do_preview(htmlcode);} ;if(Browser_IsIE7()){var _dialogPromptID=null;function IEprompt(Ox10d,Ox10e,Ox10f){that=this;this[OxOd5d5[25]]=function (Ox110){val=document.getElementById(OxOd5d5[26])[OxOd5d5[0]];_dialogPromptID[OxOd5d5[6]][OxOd5d5[27]]=OxOd5d5[28];document.getElementById(OxOd5d5[26])[OxOd5d5[0]]=OxOd5d5[1];if(Ox110){val=OxOd5d5[1];} ;Ox10d(val);return false;} ;if(Ox10f==undefined){Ox10f=OxOd5d5[1];} ;if(_dialogPromptID==null){var Ox111=document.getElementsByTagName(OxOd5d5[18])[0];tnode=document.createElement(OxOd5d5[29]);tnode[OxOd5d5[30]]=OxOd5d5[31];Ox111.appendChild(tnode);_dialogPromptID=document.getElementById(OxOd5d5[31]);tnode=document.createElement(OxOd5d5[29]);tnode[OxOd5d5[30]]=OxOd5d5[32];Ox111.appendChild(tnode);_dialogPromptID[OxOd5d5[6]][OxOd5d5[33]]=OxOd5d5[34];_dialogPromptID[OxOd5d5[6]][OxOd5d5[35]]=OxOd5d5[36];_dialogPromptID[OxOd5d5[6]][OxOd5d5[37]]=OxOd5d5[38];_dialogPromptID[OxOd5d5[6]][OxOd5d5[39]]=OxOd5d5[40];_dialogPromptID[OxOd5d5[6]][OxOd5d5[41]]=OxOd5d5[42];} ;var Ox112=OxOd5d5[43]+InputRequired+OxOd5d5[44];Ox112+=OxOd5d5[45]+Ox10e+OxOd5d5[46];Ox112+=OxOd5d5[47];Ox112+=OxOd5d5[48]+Ox10f+OxOd5d5[49];Ox112+=OxOd5d5[50];Ox112+=OxOd5d5[51]+OK+OxOd5d5[52];Ox112+=OxOd5d5[53];Ox112+=OxOd5d5[54]+Cancel+OxOd5d5[55];Ox112+=OxOd5d5[56];_dialogPromptID[OxOd5d5[15]]=Ox112;_dialogPromptID[OxOd5d5[6]][OxOd5d5[57]]=OxOd5d5[58];_dialogPromptID[OxOd5d5[6]][OxOd5d5[59]]=parseInt((document[OxOd5d5[18]][OxOd5d5[60]]-315)/2)+OxOd5d5[61];_dialogPromptID[OxOd5d5[6]][OxOd5d5[27]]=OxOd5d5[62];var Ox113=document.getElementById(OxOd5d5[26]);try{var Ox114=Ox113.createTextRange();Ox114.collapse(false);Ox114.select();} catch(x){Ox113.focus();} ;} ;} ;if(!Browser_IsWinIE()){btn_zoom_in[OxOd5d5[6]][OxOd5d5[27]]=btn_zoom_out[OxOd5d5[6]][OxOd5d5[27]]=btn_Actualsize[OxOd5d5[6]][OxOd5d5[27]]=OxOd5d5[28];} ;if(btn_CreateDir){btn_CreateDir[OxOd5d5[63]]= new Function(OxOd5d5[64]);} ;if(btn_zoom_in){btn_zoom_in[OxOd5d5[63]]= new Function(OxOd5d5[64]);} ;if(btn_zoom_out){btn_zoom_out[OxOd5d5[63]]= new Function(OxOd5d5[64]);} ;if(btn_Actualsize){btn_Actualsize[OxOd5d5[63]]= new Function(OxOd5d5[64]);} ;