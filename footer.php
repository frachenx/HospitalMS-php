<script>
    var dropdown = document.getElementsByClassName("sidebar-dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                console.log('SET TO NONE')
                dropdownContent.style.display = "none";
            } else {
                console.log('SET TO BLOCK')
                dropdownContent.style.display = "block";
            }
        });
    }



    var flagActive1 = false;
    var flagActive2 = false;
    /* ***************************** DROPDOWN ******************************** */
    const profileList = document.getElementsByClassName('profile-list')[0];
    profileList.style.display = 'none'

    function profileDropdown() {
        console.log(profileList);
        if (profileList.style.display == 'none') {
            profileList.style.display = 'block'
        } else {
            profileList.style.display = 'none'
        }
    }

    /* Toggle Sidebar 1*/
    const navbar = document.getElementsByClassName('navbar')[0];
    const sidebar = document.getElementsByClassName('sidebar')[0];
    const mainContent = document.getElementsByClassName('main')[0]
    const sidebarItem = document.getElementsByClassName('sidebar-item');
    const sidebarItemText = document.getElementsByClassName('sidebar-item-text');
    const sidebarItemLogo = document.getElementsByClassName('sidebar-item-logo');
    const sidebarMainSubtitle = document.getElementsByClassName('sidebar-main-subtitle');
    const sidebarBrandToggle = document.getElementsByClassName('sidebar-brand-toggle')[0];
    const sidebarDropdownContent = document.getElementsByClassName('sidebar-dropdown-container');

    function sidebarToggle1() {
        navbar.classList.toggle('navbar-active1');
        sidebar.classList.toggle('sidebar-active1');
        mainContent.classList.toggle('main-active1');
        sidebarBrandToggle.classList.toggle('sidebar-brand-toggle-active1');
        for (i = 0; i < sidebarItem.length; i++) {
            sidebarItem[i].classList.toggle('sidebar-item-active1');
        }
        for (i = 0; i < sidebarItemText.length; i++) {
            sidebarItemText[i].classList.toggle('sidebar-item-text-active1');
        }
        for (i = 0; i < sidebarItemLogo.length; i++) {
            sidebarItemLogo[i].classList.toggle('sidebar-item-logo-active1');
        }
        for (i = 0; i < sidebarMainSubtitle.length; i++) {
            sidebarMainSubtitle[i].classList.toggle('sidebar-main-subtitle-active1');
        }
        for (i = 0; i < sidebarDropdownContent.length; i++) {
            sidebarDropdownContent[i].classList.toggle('sidebar-dropdown-container-active1');
        }
        flagActive1 = !flagActive1;
    }

    /* Toggle Sidebar 2 */
    const sidebarBrand = document.getElementsByClassName('sidebar-brand')[0];
    const sidebarBrandText = document.getElementsByClassName('sidebar-brand-text')[0];

    function sidebarToggle2() {
        navbar.classList.toggle('navbar-active2');
        sidebar.classList.toggle('sidebar-active2');
        mainContent.classList.toggle('main-active2');
        sidebarBrand.classList.toggle('sidebar-brand-active2');
        sidebarBrandText.classList.toggle('sidebar-brand-text-active2');
        for (i = 0; i < sidebarItem.length; i++) {
            sidebarItem[i].classList.toggle('sidebar-item-active2');
        }
        for (i = 0; i < sidebarItemText.length; i++) {
            sidebarItemText[i].classList.toggle('sidebar-item-text-active2');
        }
        for (i = 0; i < sidebarItemLogo.length; i++) {
            sidebarItemLogo[i].classList.toggle('sidebar-item-logo-active2');
        }
        for (i = 0; i < sidebarMainSubtitle.length; i++) {
            sidebarMainSubtitle[i].classList.toggle('sidebar-main-subtitle-active2');
        }
        for (i = 0; i < sidebarDropdownContent.length; i++) {
            sidebarDropdownContent[i].classList.toggle('sidebar-dropdown-container-active2');
        }
        flagActive2 = !flagActive2;
    }


    /* Toggle Function */
    var lastWidth;

    function checkSize() {
        var width = window.innerWidth;
        if (flagActive1 && width > 1000) {
            sidebarToggle1();
        }
        if (flagActive2 && width < 1000) {
            sidebarToggle2();
        }
    }
    window.onresize = checkSize;
    // for(i=0;i<sidebarItemLogo.length;i++){
    //     sidebarItemLogo[i].addEventListener('mouseover',function(){
    //         var sidebarItemChildren = this.children;
    //         var tooltipText = null;
    //         for(k=0;k<sidebarItemChildren.length;k++){
    //             if(sidebarItemChildren[k].classList.contains('tooltip-text')){
    //                 tooltipText = sidebarItemChildren[k];
    //             }
    //         }
    //         if(tooltipText!=null){
    //             tooltipText.classList.toggle('tooltip-text-show');
    //         }
    //     })
    // }
    /* ********************************************************************************* */
    var sidebarPopup = document.getElementsByClassName('sidebar-popup');
    for (i = 0; i < sidebarPopup.length; i++) {
        sidebarPopup[i].addEventListener('click', function() {
            var sidebarPopupText = this.children;
            var mySidebarPopupText = null;
            for (j = 0; j < sidebarPopupText.length; j++) {
                if (sidebarPopupText[j].classList.contains('sidebar-popup-text')) {
                    mySidebarPopupText = sidebarPopupText[j];
                }
            }

            if (mySidebarPopupText != null) {
                if (flagActive2) {
                    var extraSidebarPopupText = document.getElementsByClassName('sidebar-popup-text');
                    for (k = 0; k < extraSidebarPopupText.length; k++) {
                        if (extraSidebarPopupText[k].classList.contains('sidebar-popup-show') && mySidebarPopupText !== extraSidebarPopupText[k]) {
                            extraSidebarPopupText[k].classList.remove('sidebar-popup-show');
                        }
                    }

                    mySidebarPopupText.classList.toggle('sidebar-popup-show');
                    var currentPopup = i;
                    
                }
            }
        })
    }
    /* ********************************************************************************* */
</script>
</body>

</html>