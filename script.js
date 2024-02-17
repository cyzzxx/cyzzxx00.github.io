function courseTable(){
    let input, filter, table, tr, td, txtValue;

    input = document.getElementById("table-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("course-data-storage");
    tr = table.getElementsByTagName("tr");

    for(let i = 0; i < tr.length; i++){
        td = tr[i].getElementsByTagName("td")[0];
        if(td){
            txtValue = td.textContent || td.innerText;
            if(txtValue.toUpperCase().indexOf(filter) > -1){
                tr[i].style.display = "";
            }
            else{
                tr[i].style.display = "none";
            }
        }
    }
}

//-----------------------------------------------------------------------------------------------
//Show and hide menu on scroll Y
// var prevScrollpos = window.pageYOffset;

// 	window.onscroll = function() {
// 		var currentScrollPos = window.pageYOffset;

// 	    if (prevScrollpos > currentScrollPos) {
// 			    document.getElementById("topNav").style.top = "0";
// 	    }   
//         else {
// 			    document.getElementById("topNav").style.top = "-150px";
// 	    }
// 			  prevScrollpos = currentScrollPos;
// 	}

//-----------------------------------------------------------------------------------------------
//Show nav onclick | mobile navigation bar
function funcShow(){
    let slideLeftWrapper = document.getElementById("sideNav");
    let slideLeftNav = document.getElementById("sideNavRight");
    let showNav = document.getElementById("bxMenu");
    let hideNav = document.getElementById("bxX");

    showNav.style.transform = "translateX(1rem)";
    hideNav.style.transform = "translateX(-1rem)";

    setTimeout(() => {
        hideNav.style.display = "block";
    },10);
    

    slideLeftWrapper.style.display = "block";
    setTimeout(() => {
        slideLeftWrapper.style.width = "100%";
    },100);

    slideLeftNav.style.display = "flex";
    slideLeftNav.style.opacity = "0";
    setTimeout(() => {
        slideLeftNav.style.width = "calc(100% - 50dvw)";
        slideLeftNav.style.opacity = "1";   
    },150);

    setTimeout(() => {
        showNav.style.opacity = "0";
    },5);

    setTimeout(() => {
        showNav.style.display = "none";
    },100);

    setTimeout(() => {
        hideNav.style.opacity = "1";
    },100);

    setTimeout(() => {
        hideNav.style.transform = "translateX(0)";
        hideNav.style.transform = "rotate(180deg)";
    },200);
}

//-----------------------------------------------------------------------------------------------
//Hide nav onclick | mobile navigation bar
function funcHide(){
    let slideLeftWrapper = document.getElementById("sideNav");
    let slideLeftNav = document.getElementById("sideNavRight");
    let showNav = document.getElementById("bxMenu");
    let hideNav = document.getElementById("bxX");


    showNav.style.display = "block";
    hideNav.style.transform = "translateX(-1rem)";

    slideLeftWrapper.style.transition = ".7s";
    setTimeout(() => {
        slideLeftWrapper.style.width = "0";
    },200);

    setTimeout(() => {
        slideLeftWrapper.style.display = "none";
    },800);

    slideLeftNav.style.transition = ".92s ease";
    setTimeout(() => {
        slideLeftNav.style.width = "0";
    },20);

    setTimeout(() => {
        slideLeftNav.style.display= "none";
    },800)

    setTimeout(() => {
        slideLeftNav.style.opacity = "0";
    },5);

    setTimeout(() => {
        hideNav.style.opacity = "0";
    },10);

    setTimeout(() => {
        hideNav.style.display = "none";
    },100);

    setTimeout(() => {
        showNav.style.transform = "translateX(0)";
    },40);

    setTimeout(() => {
        showNav.style.opacity = "1";
    },10);
}

//================================================================================================

function showTooltip(tooltipId) {
    document.getElementById(tooltipId).style.display = "block";
}

  // Function to hide the tooltip
function hideTooltip(tooltipId) {
    document.getElementById(tooltipId).style.display = "none";
}




// scroll to section
function scrollToSection(sectionId) {
    document.getElementById(sectionId).scrollIntoView({
        behavior: 'smooth'
    });
}

