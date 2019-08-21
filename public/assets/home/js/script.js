document.addEventListener('DOMContentLoaded',function(){
    var sidenavElems = document.querySelectorAll('.sidenav');
    M.Sidenav.init(sidenavElems);

    var dropdownElems = document.querySelectorAll('.dropdown-trigger');
    M.Dropdown.init(dropdownElems, {
        hover: true,
        constrainWidth: false,
        coverTrigger: false
    });

    var materialbpxedElems = document.querySelectorAll('.materialboxed');
    M.Materialbox.init(materialbpxedElems);

    var tooltipedElems = document.querySelectorAll('.tooltipped');
    M.Tooltip.init(tooltipedElems);

}, false);
