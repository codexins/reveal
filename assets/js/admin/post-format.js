jQuery(document).ready(function($) {

    var metaboxes = [
        "#reveal-gallery-meta",
        "#reveal-video-meta",
        "#reveal-audio-meta",
        "#reveal-quote-meta",
    ];

    var ids = metaboxes.join(", ");

    // Default Hide
    $(ids).hide();

    $("#post-formats-select input:radio[name=post_format]").change(function() {

        var cx_input_selected = $("#post-formats-select input:radio[name=post_format]:checked").val();

        // Hide during changing
        $(ids).hide();
        if (this.value == cx_input_selected) {
            $("#reveal-" + cx_input_selected + "-meta").show().insertAfter($("#titlediv")).css({ "marginTop": "20px", "marginBottom": "0px" });
        }

    });

    var cx_input_selected = $("#post-formats-select input:radio[name=post_format]:checked").val();

    // Show Default checked.
    $("#reveal-" + cx_input_selected + "-meta").show().insertAfter($("#titlediv")).css({ "marginTop": "20px", "marginBottom": "0px" });

    // Behaviour for post format image
    // if( $( "input#post-format-image" ).is(':checked') ){
    //     $("#postimagediv").insertAfter($("#titlediv")).css({ "marginTop": "20px", "marginBottom": "0px" });
    // }
    // $( "input#post-format-image" ).change( function() {
    //     if( $(this).is(':checked') ){
    //         $("#postimagediv").insertAfter($("#titlediv")).css({ "marginTop": "20px", "marginBottom": "0px" });
    //     }
    // } );
    // $( ":input:not(#post-format-image)" ).change( function() {
    //     $("#postimagediv").insertAfter($("#tagsdiv-post_tag"));
    // } );



});