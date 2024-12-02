document.addEventListener("DOMContentLoaded", function () {
    const activeTab = localStorage.getItem("activeTab");
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab("show");
    }

    $("#myTab a").on("click", function (e) {
        localStorage.setItem("activeTab", $(this).attr("href"));
    });
});
