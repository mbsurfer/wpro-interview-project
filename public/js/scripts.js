$(function() {

    $(".star-item").on("click", function() {
        $selectedRow = $(this);
        $.ajax({
            url: "/service/save.php",
            method: "POST",
            dataTye: "json",
            data: {
                item_type_id : $("select[name=item_type]").find(":selected").data('type-id'),
                name :$selectedRow.find("td.name").text()
            },
            success: function(data) {
                data = JSON.parse(data);
                if( data.success ) {
                	$selectedRow.addClass("favorited");
                }
            }
        })
    });
    
    $("button[name=paginate]").click( function() {
        //window.location.href = "http://localhost:8001/paginateUrl=" + $(this).data('url');
    });
});