var OxO6bae=["onload","contentWindow","idSource","innerHTML","body","document","","designMode","on","contentEditable","fontFamily","style","Tahoma","fontSize","11px","color","black","background","white","length","\x22","\x3C$1$3"," ","\x26nbsp;","$1","\x3Ch$1\x3E","\x3C$1\x3E$2\x3C/$1\x3E","\x27"];var editor=Window_GetDialogArguments(window);function cancel(){Window_CloseDialog(window);} ;window[OxO6bae[0]]=function (){var iframe=document.getElementById(OxO6bae[2])[OxO6bae[1]];iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[3]]=OxO6bae[6];iframe[OxO6bae[5]][OxO6bae[7]]=OxO6bae[8];iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[9]]=true;iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[11]][OxO6bae[10]]=OxO6bae[12];iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[11]][OxO6bae[13]]=OxO6bae[14];iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[11]][OxO6bae[15]]=OxO6bae[16];iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[11]][OxO6bae[17]]=OxO6bae[18];iframe.focus();} ;function insertContent(){var iframe=document.getElementById(OxO6bae[2])[OxO6bae[1]];var Ox18f=iframe[OxO6bae[5]][OxO6bae[4]][OxO6bae[3]];if(Ox18f&&Ox18f[OxO6bae[19]]>0){editor.PasteHTML(_RemoveWord(Ox18f));Window_CloseDialog(window);} ;} ;function _RemoveWord(Ox236){Ox236=Ox236.replace(/<[\/]?(base|meta|link|style|font|st1|shape|path|lock|imagedata|stroke|formulas|xml|del|ins|[ovwxp]:\w+)[^>]*?>/gi,OxO6bae[6]);Ox236=Ox236.replace(/\s*mso-[^:]+:[^;"]+;?/gi,OxO6bae[6]);Ox236=Ox236.replace(/<!--[\s\S]*?-->/gi,OxO6bae[6]);Ox236=Ox236.replace(/\s*MARGIN: 0cm 0cm 0pt\s*;/gi,OxO6bae[6]);Ox236=Ox236.replace(/\s*MARGIN: 0cm 0cm 0pt\s*"/gi,OxO6bae[20]);Ox236=Ox236.replace(/\s*TEXT-INDENT: 0cm\s*;/gi,OxO6bae[6]);Ox236=Ox236.replace(/\s*TEXT-INDENT: 0cm\s*"/gi,OxO6bae[20]);Ox236=Ox236.replace(/\s*TEXT-ALIGN: [^\s;]+;?"/gi,OxO6bae[20]);Ox236=Ox236.replace(/\s*PAGE-BREAK-BEFORE: [^\s;]+;?"/gi,OxO6bae[20]);Ox236=Ox236.replace(/\s*FONT-VARIANT: [^\s;]+;?"/gi,OxO6bae[20]);Ox236=Ox236.replace(/\s*tab-stops:[^;"]*;?/gi,OxO6bae[6]);Ox236=Ox236.replace(/\s*tab-stops:[^"]*/gi,OxO6bae[6]);Ox236=Ox236.replace(/<(\w[^>]*) class=([^ |>]*)([^>]*)/gi,OxO6bae[21]);Ox236=Ox236.replace(/\s*style="\s*"/gi,OxO6bae[6]);Ox236=Ox236.replace(/<SPAN\s*[^>]*>\s* \s*<\/SPAN>/gi,OxO6bae[22]);Ox236=Ox236.replace(/<(\w+)[^>]*\sstyle="[^"]*DISPLAY\s?:\s?none(.*?)<\/\1>/ig,OxO6bae[6]);Ox236=Ox236.replace(/<span\s*[^>]*>\s*&nbsp;\s*<\/span>/gi,OxO6bae[23]);Ox236=Ox236.replace(/<SPAN\s*[^>]*><\/SPAN>/gi,OxO6bae[6]);Ox236=Ox236.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/gi,OxO6bae[21]);Ox236=Ox236.replace(/<SPAN\s*>(.*?)<\/SPAN>/gi,OxO6bae[24]);Ox236=Ox236.replace(/<\/?\w+:[^>]*>/gi,OxO6bae[6]);Ox236=Ox236.replace(/<\!--.*?-->/g,OxO6bae[6]);Ox236=Ox236.replace(/<H\d>\s*<\/H\d>/gi,OxO6bae[6]);Ox236=Ox236.replace(/<(\w[^>]*) language=([^ |>]*)([^>]*)/gi,OxO6bae[21]);Ox236=Ox236.replace(/<(\w[^>]*) onmouseover="([^\"]*)"([^>]*)/gi,OxO6bae[21]);Ox236=Ox236.replace(/<(\w[^>]*) onmouseout="([^\"]*)"([^>]*)/gi,OxO6bae[21]);Ox236=Ox236.replace(/<H(\d)([^>]*)>/gi,OxO6bae[25]);Ox236=Ox236.replace(/<(H\d)><FONT[^>]*>(.*?)<\/FONT><\/\1>/gi,OxO6bae[26]);Ox236=Ox236.replace(/<(H\d)><EM>(.*?)<\/EM><\/\1>/gi,OxO6bae[26]);Ox236=Ox236.replace(/<a name="?OLE_LINK\d+"?>((.|[\r\n])*?)<\/a>/gi,OxO6bae[24]);Ox236=Ox236.replace(/<a name="?_Hlt\d+"?>((.|[\r\n])*?)<\/a>/gi,OxO6bae[24]);Ox236=Ox236.replace(/<a name="?_Toc\d+"?>((.|[\r\n])*?)<\/a>/gi,OxO6bae[24]);Ox236=Ox236.replace(/[\\]/gi,OxO6bae[20]);Ox236=Ox236.replace(/[\\]/gi,OxO6bae[27]);return Ox236;} ;