var OxO3e29=["SetStyle","length","","GetStyle","GetText",":",";","cssText","tblBorderStyle","sel_style","sel_border","sel_part","bordercolor","bordercolor_Preview","inp_color","inp_color_Preview","inp_shade","inp_shade_Preview","inp_MarginLeft","inp_MarginRight","inp_MarginTop","inp_MarginBottom","inp_PaddingLeft","inp_PaddingRight","inp_PaddingTop","inp_PaddingBottom","inp_width","sel_width_unit","inp_height","sel_height_unit","inp_id","inp_class","sel_align","sel_textalign","sel_float","inp_tooltip","value","borderColor","style"," ","backgroundColor","color","id","className","width","height","inp_","sel_","_unit","selectedIndex","options","align","styleFloat","cssFloat","textAlign","title","borderWidth","borderLeftWidth","borderTopWidth","borderRightWidth","borderBottomWidth","borderLeftStyle","borderTopStyle","borderRightStyle","borderBottomStyle","none","border","-","red","paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","ValidID","class","onclick"];function pause(Ox37a){var Ox2f8= new Date();var Ox37b=Ox2f8.getTime()+Ox37a;while(true){Ox2f8= new Date();if(Ox2f8.getTime()>Ox37b){return ;} ;} ;} ;function StyleClass(Oxed){var Ox37d=[];var Ox37e={};if(Oxed){Ox383();} ;this[OxO3e29[0]]=function SetStyle(name,Ox7,Ox380){name=name.toLowerCase();for(var i=0;i<Ox37d[OxO3e29[1]];i++){if(Ox37d[i]==name){break ;} ;} ;Ox37d[i]=name;Ox37e[name]=Ox7?(Ox7+(Ox380||OxO3e29[2])):OxO3e29[2];} ;this[OxO3e29[3]]=function GetStyle(name){name=name.toLowerCase();return Ox37e[name]||OxO3e29[2];} ;this[OxO3e29[4]]=function Ox382(){var Oxed=OxO3e29[2];for(var i=0;i<Ox37d[OxO3e29[1]];i++){var Ox8d=Ox37d[i];var p=Ox37e[Ox8d];if(p){Oxed+=Ox8d+OxO3e29[5]+p+OxO3e29[6];} ;} ;return Oxed;} ;function Ox383(){var arr=Oxed.split(OxO3e29[6]);for(var i=0;i<arr[OxO3e29[1]];i++){var p=arr[i].split(OxO3e29[5]);var Ox8d=p[0].replace(/^\s+/g,OxO3e29[2]).replace(/\s+$/g,OxO3e29[2]).toLowerCase();Ox37d[Ox37d[OxO3e29[1]]]=Ox8d;Ox37e[Ox8d]=p[1];} ;} ;} ;function GetStyle(Ox21,name){return  new StyleClass(Ox21.cssText).GetStyle(name);} ;function SetStyle(Ox21,name,Ox7,Ox384){var Ox385= new StyleClass(Ox21.cssText);Ox385.SetStyle(name,Ox7,Ox384);Ox21[OxO3e29[7]]=Ox385.GetText();} ;function ParseFloatToString(Ox1b){if(!Ox1b){return OxO3e29[2];} ;var Ox84=parseFloat(Ox1b);if(isNaN(Ox84)){return OxO3e29[2];} ;return Ox84+OxO3e29[2];} ;var tblBorderStyle=Window_GetElement(window,OxO3e29[8],true);var sel_style=Window_GetElement(window,OxO3e29[9],true);var sel_border=Window_GetElement(window,OxO3e29[10],true);var sel_part=Window_GetElement(window,OxO3e29[11],true);var bordercolor=Window_GetElement(window,OxO3e29[12],true);var bordercolor_Preview=Window_GetElement(window,OxO3e29[13],true);var inp_color=Window_GetElement(window,OxO3e29[14],true);var inp_color_Preview=Window_GetElement(window,OxO3e29[15],true);var inp_shade=Window_GetElement(window,OxO3e29[16],true);var inp_shade_Preview=Window_GetElement(window,OxO3e29[17],true);var inp_MarginLeft=Window_GetElement(window,OxO3e29[18],true);var inp_MarginRight=Window_GetElement(window,OxO3e29[19],true);var inp_MarginTop=Window_GetElement(window,OxO3e29[20],true);var inp_MarginBottom=Window_GetElement(window,OxO3e29[21],true);var inp_PaddingLeft=Window_GetElement(window,OxO3e29[22],true);var inp_PaddingRight=Window_GetElement(window,OxO3e29[23],true);var inp_PaddingTop=Window_GetElement(window,OxO3e29[24],true);var inp_PaddingBottom=Window_GetElement(window,OxO3e29[25],true);var inp_width=Window_GetElement(window,OxO3e29[26],true);var sel_width_unit=Window_GetElement(window,OxO3e29[27],true);var inp_height=Window_GetElement(window,OxO3e29[28],true);var sel_height_unit=Window_GetElement(window,OxO3e29[29],true);var inp_id=Window_GetElement(window,OxO3e29[30],true);var inp_class=Window_GetElement(window,OxO3e29[31],true);var sel_align=Window_GetElement(window,OxO3e29[32],true);var sel_textalign=Window_GetElement(window,OxO3e29[33],true);var sel_float=Window_GetElement(window,OxO3e29[34],true);var inp_tooltip=Window_GetElement(window,OxO3e29[35],true);UpdateState=function UpdateState_Div(){} ;function doBorderStyle(Ox49){sel_style[OxO3e29[36]]=Ox49;} ;function doPart(Ox49){sel_part[OxO3e29[36]]=Ox49;} ;function doWidth(Ox49){sel_border[OxO3e29[36]]=Ox49;} ;SyncToView=function SyncToView_Div(){if(Browser_IsWinIE()){bordercolor[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[37]];} else {var arr=revertColor(element[OxO3e29[38]].borderColor).split(OxO3e29[39]);bordercolor[OxO3e29[36]]=arr[0];} ;bordercolor[OxO3e29[38]][OxO3e29[40]]=bordercolor[OxO3e29[36]];bordercolor_Preview[OxO3e29[38]][OxO3e29[40]]=bordercolor[OxO3e29[36]];inp_color[OxO3e29[36]]=revertColor(element[OxO3e29[38]].color);inp_color[OxO3e29[38]][OxO3e29[40]]=element[OxO3e29[38]][OxO3e29[41]];inp_color_Preview[OxO3e29[38]][OxO3e29[40]]=element[OxO3e29[38]][OxO3e29[41]];inp_shade[OxO3e29[36]]=revertColor(element[OxO3e29[38]].backgroundColor);inp_shade[OxO3e29[38]][OxO3e29[40]]=element[OxO3e29[38]][OxO3e29[40]];inp_shade_Preview[OxO3e29[38]][OxO3e29[40]]=element[OxO3e29[38]][OxO3e29[40]];inp_id[OxO3e29[36]]=element[OxO3e29[42]];if(ParseFloatToString(element[OxO3e29[38]].marginLeft)){inp_MarginLeft[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].marginLeft);} ;if(ParseFloatToString(element[OxO3e29[38]].marginRight)){inp_MarginRight[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].marginRight);} ;if(ParseFloatToString(element[OxO3e29[38]].marginTop)){inp_MarginTop[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].marginTop);} ;if(ParseFloatToString(element[OxO3e29[38]].marginBottom)){inp_MarginBottom[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].marginBottom);} ;if(ParseFloatToString(element[OxO3e29[38]].paddingLeft)){inp_PaddingLeft[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].paddingLeft);} ;if(ParseFloatToString(element[OxO3e29[38]].paddingRight)){inp_PaddingRight[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].paddingRight);} ;if(ParseFloatToString(element[OxO3e29[38]].paddingTop)){inp_PaddingTop[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].paddingTop);} ;if(ParseFloatToString(element[OxO3e29[38]].paddingBottom)){inp_PaddingBottom[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]].paddingBottom);} ;inp_class[OxO3e29[36]]=element[OxO3e29[43]];var arr=[OxO3e29[44],OxO3e29[45]];for(var Oxe8=0;Oxe8<arr[OxO3e29[1]];Oxe8++){var Ox8d=arr[Oxe8];var Ox3a=Window_GetElement(window,OxO3e29[46]+Ox8d,true);var Ox49=Window_GetElement(window,OxO3e29[47]+Ox8d+OxO3e29[48],true);Ox49[OxO3e29[49]]=0;if(ParseFloatToString(element[OxO3e29[38]][Ox8d])){Ox3a[OxO3e29[36]]=ParseFloatToString(element[OxO3e29[38]][Ox8d]);for(var i=0;i<Ox49[OxO3e29[50]][OxO3e29[1]];i++){var Ox2b=Ox49[OxO3e29[50]][i][OxO3e29[36]];if(Ox2b&&element[OxO3e29[38]][Ox8d].indexOf(Ox2b)!=-1){Ox49[OxO3e29[49]]=i;break ;} ;} ;} ;} ;sel_align[OxO3e29[36]]=element[OxO3e29[51]];if(Browser_IsWinIE()){sel_float[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[52]];} else {sel_float[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[53]];} ;sel_textalign[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[54]];inp_tooltip[OxO3e29[36]]=element[OxO3e29[55]];try{sel_border[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[56]];if(element[OxO3e29[38]][OxO3e29[57]]==element[OxO3e29[38]][OxO3e29[58]]&&element[OxO3e29[38]][OxO3e29[57]]==element[OxO3e29[38]][OxO3e29[59]]&&element[OxO3e29[38]][OxO3e29[57]]==element[OxO3e29[38]][OxO3e29[60]]){sel_border[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[57]];} ;if(element[OxO3e29[38]][OxO3e29[61]]==element[OxO3e29[38]][OxO3e29[62]]&&element[OxO3e29[38]][OxO3e29[61]]==element[OxO3e29[38]][OxO3e29[63]]&&element[OxO3e29[38]][OxO3e29[61]]==element[OxO3e29[38]][OxO3e29[64]]){sel_style[OxO3e29[36]]=element[OxO3e29[38]][OxO3e29[61]];} ;} catch(x){} ;} ;SyncTo=function SyncTo_Div(element){var Ox39e=sel_part[OxO3e29[36]];if(Ox39e==OxO3e29[65]){element[OxO3e29[38]][OxO3e29[66]]=OxO3e29[65];} else {var Ox39f=Ox39e?OxO3e29[67]+Ox39e:Ox39e;var Ox16=OxO3e29[68];var Ox21=sel_style[OxO3e29[36]]||OxO3e29[2];var Ox3a0=sel_border[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[66]]=OxO3e29[65];if(Ox3a0||Ox21){SetStyle(element.style,OxO3e29[66]+Ox39f,Ox3a0+OxO3e29[39]+Ox21+OxO3e29[39]+Ox16);} else {SetStyle(element.style,OxO3e29[66]+Ox39f,OxO3e29[2]);} ;SetStyle(element.style,OxO3e29[66]+Ox39f,Ox3a0+OxO3e29[39]+Ox21+OxO3e29[39]+Ox16);} ;try{element[OxO3e29[38]][OxO3e29[41]]=inp_color[OxO3e29[36]]||OxO3e29[2];} catch(x){element[OxO3e29[38]][OxO3e29[41]]=OxO3e29[2];} ;try{element[OxO3e29[38]][OxO3e29[40]]=inp_shade[OxO3e29[36]]||OxO3e29[2];} catch(x){element[OxO3e29[38]][OxO3e29[40]]=OxO3e29[2];} ;try{element[OxO3e29[38]][OxO3e29[37]]=bordercolor[OxO3e29[36]]||OxO3e29[2];} catch(x){element[OxO3e29[38]][OxO3e29[37]]=OxO3e29[2];} ;element[OxO3e29[38]][OxO3e29[69]]=inp_PaddingLeft[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[70]]=inp_PaddingRight[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[71]]=inp_PaddingTop[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[72]]=inp_PaddingBottom[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[73]]=inp_MarginLeft[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[74]]=inp_MarginRight[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[75]]=inp_MarginTop[OxO3e29[36]];element[OxO3e29[38]][OxO3e29[76]]=inp_MarginBottom[OxO3e29[36]];element[OxO3e29[43]]=inp_class[OxO3e29[36]];var arr=[OxO3e29[44],OxO3e29[45]];for(var Oxe8=0;Oxe8<arr[OxO3e29[1]];Oxe8++){var Ox8d=arr[Oxe8];var Ox3a=Window_GetElement(window,OxO3e29[46]+Ox8d,true);var Ox3a1=Window_GetElement(window,OxO3e29[47]+Ox8d+OxO3e29[48],true);if(ParseFloatToString(Ox3a.value)){element[OxO3e29[38]][Ox8d]=ParseFloatToString(Ox3a.value)+Ox3a1[OxO3e29[36]];} else {element[OxO3e29[38]][Ox8d]=OxO3e29[2];} ;} ;var Ox275=/[^a-z\d]/i;if(Ox275.test(inp_id.value)){alert(CE_GetStr(OxO3e29[77]));return ;} ;element[OxO3e29[51]]=sel_align[OxO3e29[36]];element[OxO3e29[42]]=inp_id[OxO3e29[36]];if(Browser_IsWinIE()){element[OxO3e29[38]][OxO3e29[52]]=sel_float[OxO3e29[36]];} else {element[OxO3e29[38]][OxO3e29[53]]=sel_float[OxO3e29[36]];} ;element[OxO3e29[38]][OxO3e29[54]]=sel_textalign[OxO3e29[36]];element[OxO3e29[55]]=inp_tooltip[OxO3e29[36]];if(element[OxO3e29[55]]==OxO3e29[2]){element.removeAttribute(OxO3e29[55]);} ;if(element[OxO3e29[43]]==OxO3e29[2]){element.removeAttribute(OxO3e29[43]);} ;if(element[OxO3e29[43]]==OxO3e29[2]){element.removeAttribute(OxO3e29[78]);} ;if(element[OxO3e29[51]]==OxO3e29[2]){element.removeAttribute(OxO3e29[51]);} ;if(element[OxO3e29[42]]==OxO3e29[2]){element.removeAttribute(OxO3e29[42]);} ;} ;bordercolor[OxO3e29[79]]=bordercolor_Preview[OxO3e29[79]]=function bordercolor_onclick(){SelectColor(bordercolor,bordercolor_Preview);} ;inp_color[OxO3e29[79]]=inp_color_Preview[OxO3e29[79]]=function inp_color_onclick(){SelectColor(inp_color,inp_color_Preview);} ;inp_shade[OxO3e29[79]]=inp_shade_Preview[OxO3e29[79]]=function inp_shade_onclick(){SelectColor(inp_shade,inp_shade_Preview);} ;