function cmsCommentDeleteSubmit(that) {
    // TODO: message
    $.ajax({
        url: $(that).attr("href"),
        type: "DELETE",
        dataType: "json",
        timeout: 5000,
        success: function(data, status, xhr) {
            if (!xhr.responseJSON) {
                // TODO: message
                cmsCommentLock = false;
                return;
            }
            if (xhr.responseJSON.success !== true) {
                // TODO: message
                cmsCommentLock = false;
                return;
            }
            if (!xhr.responseJSON.msg || !xhr.responseJSON.comment_id) {
                // TODO: message
                cmsCommentLock = false;
                return;
            }
            if ($("#comments > div").length == 1) {
                $("#comment_"+xhr.responseJSON.comment_id).fadeOut(300, function() {
                    $(this).remove();
                    $("<p id=\"nocomments\">There are currently no comments.</p>").prependTo("#comments").hide().fadeIn(300);
                    cmsCommentLock = false;
                }); 
            } else {
                $("#comment_"+xhr.responseJSON.comment_id).slideUp(300, function() {
                    $(this).remove();
                    cmsCommentLock = false;
                });
            }
        },
        error: function(xhr, status, error) {
            // TODO: message
            cmsCommentLock = false;
        }
    });
}

function cmsCommentDelete(bindval) {
    bindval = bindval || ".deletable";
    $(bindval).click(function() {
        var that = this;
        var cmsCommentDeleteCheck = setInterval(function() {
            if (cmsCommentLock == false) {
                clearInterval(cmsCommentDeleteCheck);
                cmsCommentLock = true;
                cmsCommentDeleteSubmit(that);
            }
        }, 10);
        return false;
    });
}