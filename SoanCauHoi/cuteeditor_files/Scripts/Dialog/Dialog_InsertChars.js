var OxOa5bc=["Verdana","innerHTML","Unicode","innerText","\x3Cspan style=\x27font-family:","\x27\x3E","\x3C/span\x3E","selfont","length","checked","value","charstable1","charstable2","fontFamily","style","display","block","none"];var editor=Window_GetDialogArguments(window);function getchar(obj){var Ox236;var Ox27d=getFontValue()||OxOa5bc[0];if(!obj[OxOa5bc[1]]){return ;} ;Ox236=obj[OxOa5bc[1]];if(Ox27d==OxOa5bc[2]){Ox236=obj[OxOa5bc[3]];} else {if(Ox27d!=OxOa5bc[0]){Ox236=OxOa5bc[4]+Ox27d+OxOa5bc[5]+obj[OxOa5bc[1]]+OxOa5bc[6];} ;} ;editor.PasteHTML(Ox236);Window_CloseDialog(window);} ;function cancel(){Window_CloseDialog(window);} ;function getFontValue(){var Ox1f=document.getElementsByName(OxOa5bc[7]);for(var i=0;i<Ox1f[OxOa5bc[8]];i++){if(Ox1f.item(i)[OxOa5bc[9]]){return Ox1f.item(i)[OxOa5bc[10]];} ;} ;} ;function sel_font_change(){var Ox280=getFontValue()||OxOa5bc[0];var Ox281=Window_GetElement(window,OxOa5bc[11],true);var Ox282=Window_GetElement(window,OxOa5bc[12],true);Ox281[OxOa5bc[14]][OxOa5bc[13]]=Ox280;Ox281[OxOa5bc[14]][OxOa5bc[15]]=(Ox280!=OxOa5bc[2]?OxOa5bc[16]:OxOa5bc[17]);Ox282[OxOa5bc[14]][OxOa5bc[15]]=(Ox280==OxOa5bc[2]?OxOa5bc[16]:OxOa5bc[17]);} ;