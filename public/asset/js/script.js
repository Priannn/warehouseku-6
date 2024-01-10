$(document).ready(function() {
    // start: Sidebar
    $('.sidebar-dropdown-menu').slideUp('fast')

    $('.sidebar-menu-divider.has-dropdown > a, .sidebar-dropdown-menu-item.has-dropdown > a').click(function(e){
        e.preventDefault()

        $(this).next().slideToggle('fast')
    })
    // end: Sidebar
})