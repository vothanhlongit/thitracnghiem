var OxOb70f=["INPUT","TEXTAREA","DIV","SPAN","","contentWindow","innerHTML","body","document","length","type","text","id","isContentEditable","showModalDialog","?","?Modal=true","\x26Modal=true","dialogHeight:340px; dialogWidth:395px; edge:Raised; center:Yes; help:No; resizable:Yes; status:No; scroll:No","newWindow","height=300,width=400,scrollbars=no,resizable=no,toolbars=no,status=no,menubar=no,location=no","ElementIndex","dialogArguments","window","opener","value","SpellMode","start","suggest","end","SpellingForm","checkElements","innerText","StatusText","Spell Checking Text ...","CurrentText","WordIndex","Spell Check Complete","selectedIndex","ReplacementWord","form","options"];var showCompleteAlert=true;var tagGroup= new Array(OxOb70f[0],OxOb70f[1],OxOb70f[2],OxOb70f[3]);var checkElements= new Array();function getText(Oxe8){var Oxe9=document.getElementById(checkElements[Oxe8]);var Oxea=OxOb70f[4];var Oxeb=document.getElementById(Oxe9.id);if(Oxeb[OxOb70f[5]]){Oxea=Oxeb[OxOb70f[5]][OxOb70f[8]][OxOb70f[7]][OxOb70f[6]];} else {Oxea=Oxeb[OxOb70f[8]][OxOb70f[7]][OxOb70f[6]];} ;return Oxea;} ;function setText(Oxe8,Oxed){var Oxe9=document.getElementById(checkElements[Oxe8]);var Oxeb=document.getElementById(Oxe9.id);if(Oxeb[OxOb70f[5]]){Oxeb[OxOb70f[5]][OxOb70f[8]][OxOb70f[7]][OxOb70f[6]]=Oxed;} else {Oxeb[OxOb70f[8]][OxOb70f[7]][OxOb70f[6]]=Oxed;} ;} ;function checkSpelling(){checkElements= new Array();for(var i=0;i<tagGroup[OxOb70f[9]];i++){var Oxef=tagGroup[i];var Oxf0=document.getElementsByTagName(Oxef);for(var Oxf1=0;Oxf1<Oxf0[OxOb70f[9]];Oxf1++){if((Oxef==OxOb70f[0]&&Oxf0[Oxf1][OxOb70f[10]]==OxOb70f[11])||Oxef==OxOb70f[1]){checkElements[checkElements[OxOb70f[9]]]=Oxf0[Oxf1][OxOb70f[12]];} else {if((Oxef==OxOb70f[2]||Oxef==OxOb70f[3])&&Oxf0[Oxf1][OxOb70f[13]]){checkElements[checkElements[OxOb70f[9]]]=Oxf0[Oxf1][OxOb70f[12]];} ;} ;} ;} ;openSpellChecker();} ;function checkSpellingById(Oxaa,Oxf3){checkElements= new Array();checkElements[checkElements[OxOb70f[9]]]=Oxaa;openSpellChecker(Oxf3);} ;function checkElementSpelling(Oxe9){checkElements= new Array();checkElements[checkElements[OxOb70f[9]]]=Oxe9[OxOb70f[12]];openSpellChecker();} ;function openSpellChecker(Oxf3){if(window[OxOb70f[14]]){var Oxf6;if(Oxf3.indexOf(OxOb70f[15])==-1){Oxf6=OxOb70f[16];} else {Oxf6=OxOb70f[17];} ;var Oxf7=window.showModalDialog(Oxf3+Oxf6,window,OxOb70f[18]);} else {var Oxf8=window.open(Oxf3,OxOb70f[19],OxOb70f[20]);} ;} ;var iElementIndex=-1;var parentWindow;function initialize(){iElementIndex=parseInt(document.getElementById(OxOb70f[21]).value);if(parent[OxOb70f[23]][OxOb70f[22]]){parentWindow=parent[OxOb70f[23]][OxOb70f[22]];} else {if(top[OxOb70f[24]]){parentWindow=top[OxOb70f[24]];} ;} ;var Oxfc=document.getElementById(OxOb70f[26])[OxOb70f[25]];switch(Oxfc){case OxOb70f[27]:break ;;case OxOb70f[28]:updateText();break ;;case OxOb70f[29]:updateText();;default:if(loadText()){document.getElementById(OxOb70f[30]).submit();} else {endCheck();} ;break ;;} ;} ;function loadText(){if(!parentWindow[OxOb70f[8]]){return false;} ;for(++iElementIndex;iElementIndex<parentWindow[OxOb70f[31]][OxOb70f[9]];iElementIndex++){var Oxfe=parentWindow.getText(iElementIndex);if(Oxfe[OxOb70f[9]]>0){updateSettings(Oxfe,0,iElementIndex,OxOb70f[27]);document.getElementById(OxOb70f[33])[OxOb70f[32]]=OxOb70f[34];return true;} ;} ;return false;} ;function updateSettings(Ox100,Ox101,Ox102,Ox103){document.getElementById(OxOb70f[35])[OxOb70f[25]]=Ox100;document.getElementById(OxOb70f[36])[OxOb70f[25]]=Ox101;document.getElementById(OxOb70f[21])[OxOb70f[25]]=Ox102;document.getElementById(OxOb70f[26])[OxOb70f[25]]=Ox103;} ;function updateText(){if(!parentWindow[OxOb70f[8]]){return false;} ;var Oxfe=document.getElementById(OxOb70f[35])[OxOb70f[25]];parentWindow.setText(iElementIndex,Oxfe);} ;function endCheck(){if(showCompleteAlert){alert(OxOb70f[37]);} ;closeWindow();} ;function closeWindow(){top.close();} ;function changeWord(Oxe9){var Ox108=Oxe9[OxOb70f[38]];Oxe9[OxOb70f[40]][OxOb70f[39]][OxOb70f[25]]=Oxe9[OxOb70f[41]][Ox108][OxOb70f[25]];} ;