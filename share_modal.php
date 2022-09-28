<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="shareModal" tabindex="-1" style="" role="dialog" aria-labelledby="shareModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsModalLabel">Share video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" name="" id="inputURL" value="<?php echo $url ?>" class="form-control" disabled>
                    <span onclick="copyURL()" style="cursor:pointer" class="input-group-text" id="copy-URL">
                        <i class="fa-regular fa-copy"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function copyURL() {
    var copyText = document.getElementById("inputURL");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
}
$(document).ready(function() {
    $('#copy-URL').tooltip({
        title: "Copied",
        trigger: "click"
    });
});
</script>