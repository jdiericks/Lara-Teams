function markNotifAsRead(count) {
    var el = document.getElementById('notif');

    if(count !== 0){
        $.get('/markread');
        el.setAttribute('data-badge', 0);
    }


}

function openContact(contactID, el) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("_tabcontent");
    tablinks = document.getElementsByClassName("_tablink");

    for(i=0; i<tabcontent.length; i++){
        tabcontent[i].style.display = "none";
    }

    jQuery(tablinks).removeClass("_active", false);

    // Show the specific tab content
    document.getElementById(contactID).style.display = "block";

    var item = document.getElementsByClassName(contactID);

    jQuery(item).addClass("_active"); 
}

function openPanel(panelID, ID) {

    var i, tabcontent, tablinks;


    tabcontent = document.getElementsByClassName("_panel-content-" + ID);
    tablinks = document.getElementsByClassName("_panel-link-" + ID);

    for(i=0; i<tabcontent.length; i++){
        tabcontent[i].style.display = "none";
    }

    jQuery(tablinks).removeClass("is-active", false);

    // Show the specific tab content
    document.getElementById(panelID).style.display = "block";

    var item = document.getElementsByClassName(panelID);

    jQuery(item).addClass("is-active");
}