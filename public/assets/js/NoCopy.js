document.addEventListener("load", function(){
    // TARGET THIS SECTION ONLY
    var target = document.getElementById("no-copy");

    // PREVENT CONTEXT MENU FROM OPENING
    target.addEventListener("contextmenu", function(evt){
        evt.preventDefault();
    }, false);

    // PREVENT CLIPBOARD COPYING
    target.addEventListener("copy", function(evt){
        // Change the copied text if you want
        evt.clipboardData.setData("text/plain", "Copying is not allowed on this webpage");

        // Prevent the default copy action
        evt.preventDefault();
    }, false);
});