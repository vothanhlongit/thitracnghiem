var OxO6ef0=["","sel_align","sel_valign","sel_justify","sel_letter","tb_letter","sel_letter_unit","sel_line","tb_line","sel_line_unit","tb_indent","sel_indent_unit","sel_direction","sel_writingmode","outer","div_demo","disabled","selectedIndex","cssText","style","value","textAlign","verticalAlign","textJustify","letterSpacing","length","options","lineHeight","textIndent","direction","writingMode"];function ParseFloatToString(Ox1b){var Ox84=parseFloat(Ox1b);if(isNaN(Ox84)){return OxO6ef0[0];} ;return Ox84+OxO6ef0[0];} ;var sel_align=Window_GetElement(window,OxO6ef0[1],true);var sel_valign=Window_GetElement(window,OxO6ef0[2],true);var sel_justify=Window_GetElement(window,OxO6ef0[3],true);var sel_letter=Window_GetElement(window,OxO6ef0[4],true);var tb_letter=Window_GetElement(window,OxO6ef0[5],true);var sel_letter_unit=Window_GetElement(window,OxO6ef0[6],true);var sel_line=Window_GetElement(window,OxO6ef0[7],true);var tb_line=Window_GetElement(window,OxO6ef0[8],true);var sel_line_unit=Window_GetElement(window,OxO6ef0[9],true);var tb_indent=Window_GetElement(window,OxO6ef0[10],true);var sel_indent_unit=Window_GetElement(window,OxO6ef0[11],true);var sel_direction=Window_GetElement(window,OxO6ef0[12],true);var sel_writingmode=Window_GetElement(window,OxO6ef0[13],true);var outer=Window_GetElement(window,OxO6ef0[14],true);var div_demo=Window_GetElement(window,OxO6ef0[15],true);UpdateState=function UpdateState_Text(){tb_letter[OxO6ef0[16]]=sel_letter_unit[OxO6ef0[16]]=(sel_letter[OxO6ef0[17]]>0);tb_line[OxO6ef0[16]]=sel_line_unit[OxO6ef0[16]]=(sel_line[OxO6ef0[17]]>0);div_demo[OxO6ef0[19]][OxO6ef0[18]]=element[OxO6ef0[19]][OxO6ef0[18]];} ;SyncToView=function SyncToView_Text(){sel_align[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[21]];sel_valign[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[22]];sel_justify[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[23]];sel_letter[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[24]];sel_letter_unit[OxO6ef0[17]]=0;if(sel_letter[OxO6ef0[17]]==-1){if(ParseFloatToString(element[OxO6ef0[19]].letterSpacing)){tb_letter[OxO6ef0[20]]=ParseFloatToString(element[OxO6ef0[19]].letterSpacing);for(var i=0;i<sel_letter_unit[OxO6ef0[26]][OxO6ef0[25]];i++){var Ox2b=sel_letter_unit[OxO6ef0[26]][i][OxO6ef0[20]];if(Ox2b&&element[OxO6ef0[19]][OxO6ef0[24]].indexOf(Ox2b)!=-1){sel_letter_unit[OxO6ef0[17]]=i;break ;} ;} ;} ;} ;sel_line[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[27]];sel_line_unit[OxO6ef0[17]]=0;if(sel_line[OxO6ef0[17]]==-1){if(ParseFloatToString(element[OxO6ef0[19]].lineHeight)){tb_line[OxO6ef0[20]]=ParseFloatToString(element[OxO6ef0[19]].lineHeight);for(var i=0;i<sel_line_unit[OxO6ef0[26]][OxO6ef0[25]];i++){var Ox2b=sel_line_unit[OxO6ef0[26]][i][OxO6ef0[20]];if(Ox2b&&element[OxO6ef0[19]][OxO6ef0[27]].indexOf(Ox2b)!=-1){sel_line_unit[OxO6ef0[17]]=i;break ;} ;} ;} ;} ;sel_indent_unit[OxO6ef0[17]]=0;if(!isNaN(ParseFloatToString(element[OxO6ef0[19]].textIndent))){tb_indent[OxO6ef0[20]]=ParseFloatToString(element[OxO6ef0[19]].textIndent);for(var i=0;i<sel_indent_unit[OxO6ef0[26]][OxO6ef0[25]];i++){var Ox2b=sel_indent_unit[OxO6ef0[26]][i][OxO6ef0[20]];if(Ox2b&&element[OxO6ef0[19]][OxO6ef0[28]].indexOf(Ox2b)!=-1){sel_indent_unit[OxO6ef0[17]]=i;break ;} ;} ;} ;sel_direction[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[29]];sel_writingmode[OxO6ef0[20]]=element[OxO6ef0[19]][OxO6ef0[30]];} ;SyncTo=function SyncTo_Text(element){element[OxO6ef0[19]][OxO6ef0[21]]=sel_align[OxO6ef0[20]];element[OxO6ef0[19]][OxO6ef0[22]]=sel_valign[OxO6ef0[20]];element[OxO6ef0[19]][OxO6ef0[23]]=sel_justify[OxO6ef0[20]];if(sel_letter[OxO6ef0[17]]>0){element[OxO6ef0[19]][OxO6ef0[24]]=sel_letter[OxO6ef0[20]];} else {if(ParseFloatToString(tb_letter.value)){element[OxO6ef0[19]][OxO6ef0[24]]=ParseFloatToString(tb_letter.value)+sel_letter_unit[OxO6ef0[20]];} else {element[OxO6ef0[19]][OxO6ef0[24]]=OxO6ef0[0];} ;} ;if(sel_line[OxO6ef0[17]]>0){element[OxO6ef0[19]][OxO6ef0[27]]=sel_line[OxO6ef0[20]];} else {if(ParseFloatToString(tb_line.value)){element[OxO6ef0[19]][OxO6ef0[27]]=ParseFloatToString(tb_line.value)+sel_line_unit[OxO6ef0[20]];} else {element[OxO6ef0[19]][OxO6ef0[27]]=OxO6ef0[0];} ;} ;if(ParseFloatToString(tb_indent.value)){element[OxO6ef0[19]][OxO6ef0[28]]=ParseFloatToString(tb_indent.value)+sel_indent_unit[OxO6ef0[20]];} else {element[OxO6ef0[19]][OxO6ef0[28]]=OxO6ef0[0];} ;element[OxO6ef0[19]][OxO6ef0[29]]=sel_direction[OxO6ef0[20]]||OxO6ef0[0];element[OxO6ef0[19]][OxO6ef0[30]]=sel_writingmode[OxO6ef0[20]]||OxO6ef0[0];} ;