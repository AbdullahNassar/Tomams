<script id="delete-modal-template" type="text/html" >
    <div class="modal-dialog" role="document">
        <div class = "modal-content" >
            <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
            <div class = "modal-header" >
                <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                <h4 class = "modal-title bold" > Delete Item </h4>
            </div>
            <div class = "modal-body" >
                <p > Do you want to confirm deletion ? </p>
            </div>
            <div class = "modal-footer" >
                <a
                href = "{url}"
                id = "delete" class = "btn btn-danger" >
                <li class = "fa fa-trash" > </li> Delete
            </a>
            <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                <li class = "fa fa-times" > </li> Cancel</button >
            </div>
        </div>
    </div>
</script>
