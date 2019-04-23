document.addEventListener("DOMContentLoaded", function() {
    var collapsible = document.querySelectorAll(".collapsible");
    M.Collapsible.init(collapsible);
    // M.updateTextFields();
    var tooltip = document.querySelectorAll(".tooltipped");
    M.Tooltip.init(tooltip);

    var modal = document.querySelectorAll(".modal");
    M.Modal.init(modal);

    var select = document.querySelectorAll("select");
    M.FormSelect.init(select);
});
