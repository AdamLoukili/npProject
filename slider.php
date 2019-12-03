
<ul class="slideshow">
	<li><span></span></li>
  <li><span>2</span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
</ul>
<style>
.slideshow {
  list-style-type: none;
  width:75%;
  margin:auto;
}

/** SLIDESHOW **/
.slideshow,
.slideshow:after { 
    width: 100%;
    height: 501px;
    box-shadow: rgba(0, 0, 0, 0.500) 3px 5px 3px;
    border: solid 2px #E00000;
    border-radius:10px;
    padding:0;
    margin:0;
    margin:auto;
}
.slideshow li span { 
	position: absolute;
    width: 80%;
    height: 501px;
    color: transparent;
    background-repeat: no-repeat;
    opacity: 0;
    border-radius: 7px;
    animation: imageAnimation 20s linear infinite 0s; 
}

.slideshow li:nth-child(1) span { 
    background-image: url("imgs/accueil/Ahri_0.jpg"); 
    background-position: center;
}
.slideshow li:nth-child(2) span { 
    background-image: url("imgs/accueil/Ahri_1.jpg");
    animation-delay: 10s; 
}
.slideshow li:nth-child(3) span { 
    background-image: url("imgs/accueil/Akali_0.jpg");
    animation-delay: 20s; 
}
.slideshow li:nth-child(4) span { 
    background-image: url("imgs/accueil/Akali_2.jpg");   
    animation-delay: 30s; 
}
.slideshow li:nth-child(5) span { 
    background-image: url("imgs/accueil/Akali_5.jpg");
    animation-delay: 40s; 
}

@keyframes imageAnimation { 
    0% { opacity: 0; animation-timing-function: ease-in; }
    8% { opacity: 1; animation-timing-function: ease-out; }
    17% { opacity: 1 }
    25% { opacity: 0,75 }
    100% { opacity: 0 }
}

@keyframes titleAnimation { 
    0% { opacity: 0,5 }
    8% { opacity: 1 }
    17% { opacity: 1 }
    19% { opacity: 0,5 }
    100% { opacity: 0 }
}
.no-cssanimations .cb-slideshow li span {
	opacity: 1;
}
</style>