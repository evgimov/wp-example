// !function(){var e,t,a;if(e=document.getElementById("site-navigation"),e&&(t=e.getElementsByTagName("button")[0],"undefined"!=typeof t)){if(a=e.getElementsByTagName("ul")[0],"undefined"==typeof a)return void(t.style.display="none");a.setAttribute("aria-expanded","false"),-1===a.className.indexOf("nav-menu")&&(a.className+=" nav-menu"),t.onclick=function(){-1!==e.className.indexOf("toggled")?(e.className=e.className.replace(" toggled",""),t.setAttribute("aria-expanded","false"),a.setAttribute("aria-expanded","false")):(e.className+=" toggled",t.setAttribute("aria-expanded","true"),a.setAttribute("aria-expanded","true"))}}}(),function($){$(window).resize(function(){windowWidth=$(window).width(),navigation=$("#masthead, #site-navigation"),isToggled=navigation.hasClass("toggled"),windowWidth>768&&isToggled&&navigation.removeClass("toggled")})}(jQuery);