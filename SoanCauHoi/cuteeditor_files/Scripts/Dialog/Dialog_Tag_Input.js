var OxO210d=["inp_type","inp_name","inp_value","row_txt1","inp_Size","row_txt2","inp_MaxLength","row_img","inp_src","btnbrowse","row_img2","sel_Align","optNotSet","optLeft","optRight","optTexttop","optAbsMiddle","optBaseline","optAbsBottom","optBottom","optMiddle","optTop","inp_Border","row_img3","inp_width","inp_height","row_img4","inp_HSpace","inp_VSpace","row_img5","AlternateText","inp_id","row_txt3","inp_access","row_txt4","inp_index","row_chk","inp_checked","row_txt5","inp_Disabled","row_txt6","inp_Readonly","onclick","value","Name","name","id","src","type","checked","disabled","readOnly","tabIndex","","accessKey","size","maxLength","width","height","vspace","hspace","border","align","alt","text","display","style","none","password","hidden","radio","checkbox","submit","reset","button","image","className","class"];var inp_type=Window_GetElement(window,OxO210d[0],true);var inp_name=Window_GetElement(window,OxO210d[1],true);var inp_value=Window_GetElement(window,OxO210d[2],true);var row_txt1=Window_GetElement(window,OxO210d[3],true);var inp_Size=Window_GetElement(window,OxO210d[4],true);var row_txt2=Window_GetElement(window,OxO210d[5],true);var inp_MaxLength=Window_GetElement(window,OxO210d[6],true);var row_img=Window_GetElement(window,OxO210d[7],true);var inp_src=Window_GetElement(window,OxO210d[8],true);var btnbrowse=Window_GetElement(window,OxO210d[9],true);var row_img2=Window_GetElement(window,OxO210d[10],true);var sel_Align=Window_GetElement(window,OxO210d[11],true);var optNotSet=Window_GetElement(window,OxO210d[12],true);var optLeft=Window_GetElement(window,OxO210d[13],true);var optRight=Window_GetElement(window,OxO210d[14],true);var optTexttop=Window_GetElement(window,OxO210d[15],true);var optAbsMiddle=Window_GetElement(window,OxO210d[16],true);var optBaseline=Window_GetElement(window,OxO210d[17],true);var optAbsBottom=Window_GetElement(window,OxO210d[18],true);var optBottom=Window_GetElement(window,OxO210d[19],true);var optMiddle=Window_GetElement(window,OxO210d[20],true);var optTop=Window_GetElement(window,OxO210d[21],true);var inp_Border=Window_GetElement(window,OxO210d[22],true);var row_img3=Window_GetElement(window,OxO210d[23],true);var inp_width=Window_GetElement(window,OxO210d[24],true);var inp_height=Window_GetElement(window,OxO210d[25],true);var row_img4=Window_GetElement(window,OxO210d[26],true);var inp_HSpace=Window_GetElement(window,OxO210d[27],true);var inp_VSpace=Window_GetElement(window,OxO210d[28],true);var row_img5=Window_GetElement(window,OxO210d[29],true);var AlternateText=Window_GetElement(window,OxO210d[30],true);var inp_id=Window_GetElement(window,OxO210d[31],true);var row_txt3=Window_GetElement(window,OxO210d[32],true);var inp_access=Window_GetElement(window,OxO210d[33],true);var row_txt4=Window_GetElement(window,OxO210d[34],true);var inp_index=Window_GetElement(window,OxO210d[35],true);var row_chk=Window_GetElement(window,OxO210d[36],true);var inp_checked=Window_GetElement(window,OxO210d[37],true);var row_txt5=Window_GetElement(window,OxO210d[38],true);var inp_Disabled=Window_GetElement(window,OxO210d[39],true);var row_txt6=Window_GetElement(window,OxO210d[40],true);var inp_Readonly=Window_GetElement(window,OxO210d[41],true);btnbrowse[OxO210d[42]]=function btnbrowse_onclick(){function Ox25a(Ox27){if(Ox27){inp_src[OxO210d[43]]=Ox27;SyncTo(element);} ;} ;editor.SetNextDialogWindow(window);if(Browser_IsSafari()){editor.ShowSelectImageDialog(Ox25a,inp_src.value,inp_src);} else {editor.ShowSelectImageDialog(Ox25a,inp_src.value);} ;} ;UpdateState=function UpdateState_Input(){} ;SyncToView=function SyncToView_Input(){if(element[OxO210d[44]]){inp_name[OxO210d[43]]=element[OxO210d[44]];} ;if(element[OxO210d[45]]){inp_name[OxO210d[43]]=element[OxO210d[45]];} ;inp_id[OxO210d[43]]=element[OxO210d[46]];inp_value[OxO210d[43]]=(element[OxO210d[43]]).trim();inp_src[OxO210d[43]]=element[OxO210d[47]];inp_type[OxO210d[43]]=element[OxO210d[48]];inp_checked[OxO210d[49]]=element[OxO210d[49]];inp_Disabled[OxO210d[49]]=element[OxO210d[50]];inp_Readonly[OxO210d[49]]=element[OxO210d[51]];if(element[OxO210d[52]]==0){inp_index[OxO210d[43]]=OxO210d[53];} else {inp_index[OxO210d[43]]=element[OxO210d[52]];} ;if(element[OxO210d[54]]){inp_access[OxO210d[43]]=element[OxO210d[54]];} ;if(element[OxO210d[55]]){if(element[OxO210d[55]]==20){inp_Size[OxO210d[43]]=OxO210d[53];} else {inp_Size[OxO210d[43]]=element[OxO210d[55]];} ;} ;if(element[OxO210d[56]]){if(element[OxO210d[56]]==2147483647||element[OxO210d[56]]<=0){inp_MaxLength[OxO210d[43]]=OxO210d[53];} else {inp_MaxLength[OxO210d[43]]=element[OxO210d[56]];} ;} ;if(element[OxO210d[57]]){inp_width[OxO210d[43]]=element[OxO210d[57]];} ;if(element[OxO210d[58]]){inp_height[OxO210d[43]]=element[OxO210d[58]];} ;if(element[OxO210d[59]]){inp_HSpace[OxO210d[43]]=element[OxO210d[59]];} ;if(element[OxO210d[60]]){inp_VSpace[OxO210d[43]]=element[OxO210d[60]];} ;if(element[OxO210d[61]]){inp_Border[OxO210d[43]]=element[OxO210d[61]];} ;if(element[OxO210d[62]]){sel_Align[OxO210d[43]]=element[OxO210d[62]];} ;if(element[OxO210d[63]]){alt[OxO210d[43]]=element[OxO210d[63]];} ;switch((element[OxO210d[48]]).toLowerCase()){case OxO210d[64]:;case OxO210d[68]:row_img[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img3[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img4[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img5[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_chk[OxO210d[66]][OxO210d[65]]=OxO210d[67];break ;;case OxO210d[69]:row_img[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img3[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img4[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img5[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_chk[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt1[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt3[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt4[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt5[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt6[OxO210d[66]][OxO210d[65]]=OxO210d[67];break ;;case OxO210d[70]:;case OxO210d[71]:row_img[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img3[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img4[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img5[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt1[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt6[OxO210d[66]][OxO210d[65]]=OxO210d[67];break ;;case OxO210d[72]:;case OxO210d[73]:;case OxO210d[74]:row_chk[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img3[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img4[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_img5[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt1[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt6[OxO210d[66]][OxO210d[65]]=OxO210d[67];break ;;case OxO210d[75]:row_chk[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt1[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt2[OxO210d[66]][OxO210d[65]]=OxO210d[67];row_txt6[OxO210d[66]][OxO210d[65]]=OxO210d[67];break ;;} ;} ;SyncTo=function SyncTo_Input(element){element[OxO210d[45]]=inp_name[OxO210d[43]];if(element[OxO210d[44]]){element[OxO210d[44]]=inp_name[OxO210d[43]];} else {if(element[OxO210d[45]]){element.removeAttribute(OxO210d[45],0);element[OxO210d[44]]=inp_name[OxO210d[43]];} else {element[OxO210d[44]]=inp_name[OxO210d[43]];} ;} ;element[OxO210d[46]]=inp_id[OxO210d[43]];if(inp_src[OxO210d[43]]){element[OxO210d[47]]=inp_src[OxO210d[43]];} ;element[OxO210d[49]]=inp_checked[OxO210d[49]];element[OxO210d[43]]=inp_value[OxO210d[43]];element[OxO210d[50]]=inp_Disabled[OxO210d[49]];element[OxO210d[51]]=inp_Readonly[OxO210d[49]];element[OxO210d[54]]=inp_access[OxO210d[43]];element[OxO210d[52]]=inp_index[OxO210d[43]];element[OxO210d[56]]=inp_MaxLength[OxO210d[43]];element[OxO210d[57]]=inp_width[OxO210d[43]];element[OxO210d[58]]=inp_height[OxO210d[43]];element[OxO210d[59]]=inp_HSpace[OxO210d[43]];element[OxO210d[60]]=inp_VSpace[OxO210d[43]];element[OxO210d[61]]=inp_Border[OxO210d[43]];element[OxO210d[62]]=sel_Align[OxO210d[43]];element[OxO210d[63]]=AlternateText[OxO210d[43]];try{element[OxO210d[55]]=inp_Size[OxO210d[43]];} catch(e){element[OxO210d[55]]=20;} ;if(element[OxO210d[52]]==OxO210d[53]){element.removeAttribute(OxO210d[52]);} ;if(element[OxO210d[54]]==OxO210d[53]){element.removeAttribute(OxO210d[54]);} ;if(element[OxO210d[56]]==OxO210d[53]){element.removeAttribute(OxO210d[56]);} ;if(element[OxO210d[55]]==0){element.removeAttribute(OxO210d[55]);} ;if(element[OxO210d[57]]==0){element.removeAttribute(OxO210d[57]);} ;if(element[OxO210d[58]]==0){element.removeAttribute(OxO210d[58]);} ;if(element[OxO210d[60]]==OxO210d[53]){element.removeAttribute(OxO210d[60]);} ;if(element[OxO210d[59]]==OxO210d[53]){element.removeAttribute(OxO210d[59]);} ;if(element[OxO210d[46]]==OxO210d[53]){element.removeAttribute(OxO210d[46]);} ;if(element[OxO210d[44]]==OxO210d[53]){element.removeAttribute(OxO210d[44]);} ;if(element[OxO210d[63]]==OxO210d[53]){element.removeAttribute(OxO210d[63]);} ;if(element[OxO210d[62]]==OxO210d[53]){element.removeAttribute(OxO210d[62]);} ;if(element[OxO210d[76]]==OxO210d[53]){element.removeAttribute(OxO210d[77]);} ;if(element[OxO210d[76]]==OxO210d[53]){element.removeAttribute(OxO210d[76]);} ;switch((element[OxO210d[48]]).toLowerCase()){case OxO210d[64]:;case OxO210d[68]:;case OxO210d[69]:;case OxO210d[70]:;case OxO210d[71]:;case OxO210d[72]:;case OxO210d[73]:;case OxO210d[74]:element.removeAttribute(OxO210d[58]);element.removeAttribute(OxO210d[61]);element.removeAttribute(OxO210d[47]);break ;;case OxO210d[75]:break ;;} ;} ;