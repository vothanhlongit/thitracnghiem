var OxO6dc5=["inp_class","inp_width","inp_height","sel_align","sel_textalign","sel_float","inp_forecolor","img_forecolor","inp_backcolor","img_backcolor","inp_tooltip","value","className","width","style","height","align","styleFloat","cssFloat","textAlign","title","backgroundColor","color","","class","onclick"];var inp_class=Window_GetElement(window,OxO6dc5[0],true);var inp_width=Window_GetElement(window,OxO6dc5[1],true);var inp_height=Window_GetElement(window,OxO6dc5[2],true);var sel_align=Window_GetElement(window,OxO6dc5[3],true);var sel_textalign=Window_GetElement(window,OxO6dc5[4],true);var sel_float=Window_GetElement(window,OxO6dc5[5],true);var inp_forecolor=Window_GetElement(window,OxO6dc5[6],true);var img_forecolor=Window_GetElement(window,OxO6dc5[7],true);var inp_backcolor=Window_GetElement(window,OxO6dc5[8],true);var img_backcolor=Window_GetElement(window,OxO6dc5[9],true);var inp_tooltip=Window_GetElement(window,OxO6dc5[10],true);UpdateState=function UpdateState_Common(){} ;SyncToView=function SyncToView_Common(){inp_class[OxO6dc5[11]]=element[OxO6dc5[12]];inp_width[OxO6dc5[11]]=element[OxO6dc5[14]][OxO6dc5[13]];inp_height[OxO6dc5[11]]=element[OxO6dc5[14]][OxO6dc5[15]];sel_align[OxO6dc5[11]]=element[OxO6dc5[16]];if(Browser_IsWinIE()){sel_float[OxO6dc5[11]]=element[OxO6dc5[14]][OxO6dc5[17]];} else {sel_float[OxO6dc5[11]]=element[OxO6dc5[14]][OxO6dc5[18]];} ;sel_textalign[OxO6dc5[11]]=element[OxO6dc5[14]][OxO6dc5[19]];inp_tooltip[OxO6dc5[11]]=element[OxO6dc5[20]];inp_forecolor[OxO6dc5[11]]=revertColor(element[OxO6dc5[14]].color);inp_forecolor[OxO6dc5[14]][OxO6dc5[21]]=inp_forecolor[OxO6dc5[11]];img_forecolor[OxO6dc5[14]][OxO6dc5[21]]=inp_forecolor[OxO6dc5[11]];inp_backcolor[OxO6dc5[11]]=revertColor(element[OxO6dc5[14]].backgroundColor);inp_backcolor[OxO6dc5[14]][OxO6dc5[21]]=inp_backcolor[OxO6dc5[11]];img_backcolor[OxO6dc5[14]][OxO6dc5[21]]=inp_backcolor[OxO6dc5[11]];} ;SyncTo=function SyncTo_Common(element){element[OxO6dc5[12]]=inp_class[OxO6dc5[11]];try{element[OxO6dc5[14]][OxO6dc5[13]]=inp_width[OxO6dc5[11]];element[OxO6dc5[14]][OxO6dc5[15]]=inp_height[OxO6dc5[11]];} catch(x){} ;element[OxO6dc5[16]]=sel_align[OxO6dc5[11]];if(Browser_IsWinIE()){element[OxO6dc5[14]][OxO6dc5[17]]=sel_float[OxO6dc5[11]];} else {element[OxO6dc5[14]][OxO6dc5[18]]=sel_float[OxO6dc5[11]];} ;element[OxO6dc5[14]][OxO6dc5[19]]=sel_textalign[OxO6dc5[11]];element[OxO6dc5[20]]=inp_tooltip[OxO6dc5[11]];element[OxO6dc5[14]][OxO6dc5[22]]=inp_forecolor[OxO6dc5[11]];element[OxO6dc5[14]][OxO6dc5[21]]=inp_backcolor[OxO6dc5[11]];if(element[OxO6dc5[12]]==OxO6dc5[23]){element.removeAttribute(OxO6dc5[12]);} ;if(element[OxO6dc5[12]]==OxO6dc5[23]){element.removeAttribute(OxO6dc5[24]);} ;if(element[OxO6dc5[20]]==OxO6dc5[23]){element.removeAttribute(OxO6dc5[20]);} ;if(element[OxO6dc5[16]]==OxO6dc5[23]){element.removeAttribute(OxO6dc5[16]);} ;} ;img_forecolor[OxO6dc5[25]]=inp_forecolor[OxO6dc5[25]]=function inp_forecolor_onclick(){SelectColor(inp_forecolor,img_forecolor);} ;img_backcolor[OxO6dc5[25]]=inp_backcolor[OxO6dc5[25]]=function inp_backcolor_onclick(){SelectColor(inp_backcolor,img_backcolor);} ;