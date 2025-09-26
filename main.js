$(document).ready(function(){
    fetch_posts();

    $("#post-form").submit(function(event){
        event.preventDefault();

        $.ajax({
            url: "insert_post.php",
            type: "post",
            data: {post_content: $("#post-content").val() },
            dataType: "json",
            success: function(response){
                if(response.status === "success"){
                    $("#message").text(response.message);
                    $("#post-content").val("");
                    fetch_posts();
                }
                else{
                    $message.text(response.message);
                }
            }

        })
    })

    function fetch_posts(){
        $.ajax({
            url: "fetch_post.php",
            type: "GET",
            success: function(data){
                $("#post-container").html(data);
            }
        })
    }

})