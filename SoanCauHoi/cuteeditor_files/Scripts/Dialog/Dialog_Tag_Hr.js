var OxO2cb4=["inp_width","eenheid","alignment","hrcolor","hrcolorpreview","shade","sel_size","width","style","value","px","%","size","align","color","backgroundColor","noShade","noshade","","onclick"];var inp_width=Window_GetElement(window,OxO2cb4[0],true);var eenheid=Window_GetElement(window,OxO2cb4[1],true);var alignment=Window_GetElement(window,OxO2cb4[2],true);var hrcolor=Window_GetElement(window,OxO2cb4[3],true);var hrcolorpreview=Window_GetElement(window,OxO2cb4[4],true);var shade=Window_GetElement(window,OxO2cb4[5],true);var sel_size=Window_GetElement(window,OxO2cb4[6],true);UpdateState=function UpdateState_Hr(){} ;SyncToView=function SyncToView_Hr(){if(element[OxO2cb4[8]][OxO2cb4[7]]){if(element[OxO2cb4[8]][OxO2cb4[7]].search(/%/)<0){eenheid[OxO2cb4[9]]=OxO2cb4[10];inp_width[OxO2cb4[9]]=element[OxO2cb4[8]][OxO2cb4[7]].split(OxO2cb4[10])[0];} else {eenheid[OxO2cb4[9]]=OxO2cb4[11];inp_width[OxO2cb4[9]]=element[OxO2cb4[8]][OxO2cb4[7]].split(OxO2cb4[11])[0];} ;} ;sel_size[OxO2cb4[9]]=element[OxO2cb4[12]];alignment[OxO2cb4[9]]=element[OxO2cb4[13]];hrcolor[OxO2cb4[9]]=element[OxO2cb4[14]];if(element[OxO2cb4[14]]){hrcolor[OxO2cb4[8]][OxO2cb4[15]]=element[OxO2cb4[14]];} ;if(element[OxO2cb4[16]]){shade[OxO2cb4[9]]=OxO2cb4[17];} else {shade[OxO2cb4[9]]=OxO2cb4[18];} ;} ;SyncTo=function SyncTo_Hr(element){if(sel_size[OxO2cb4[9]]){element[OxO2cb4[12]]=sel_size[OxO2cb4[9]];} ;if(hrcolor[OxO2cb4[9]]){element[OxO2cb4[14]]=hrcolor[OxO2cb4[9]];} ;if(alignment[OxO2cb4[9]]){element[OxO2cb4[13]]=alignment[OxO2cb4[9]];} ;if(shade[OxO2cb4[9]]==OxO2cb4[17]){element[OxO2cb4[16]]=true;} else {element[OxO2cb4[16]]=false;} ;if(inp_width[OxO2cb4[9]]){element[OxO2cb4[8]][OxO2cb4[7]]=inp_width[OxO2cb4[9]]+eenheid[OxO2cb4[9]];} ;} ;hrcolor[OxO2cb4[19]]=hrcolorpreview[OxO2cb4[19]]=function hrcolor_onclick(){SelectColor(hrcolor,hrcolorpreview);} ;