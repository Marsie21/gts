$(document).ready(function() {

    $(".search-box").keyup(function() {
        var value = $('.search-box').val();
        var filterArr = [];
        
        $(".filter-by:checked").each(function(){
            filterArr.push($(this).val());
        });

        var selected;
        selected = filterArr.join(',');

        $.ajax({
            url: "search.php",
            type: "POST",
            data: { search:value, selected:selected },
            success: function(data) {
                $(".profile-card-container").html(data);
            }
        });
    });
});