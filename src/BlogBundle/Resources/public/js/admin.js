/**
 * Created by vitalij.bell on 27.10.2017.
 */
$(document).ready(function () {

    $(document).on('click', '.admin-delete-post-btn', function () {
        return confirm('Delete this post?')
    });

})