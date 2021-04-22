<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave a comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('comments.store')}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="commentText" id="labComment" class="col-form-label">Comment :</label>
                        <input type="text" class="form-control" id="commentText" name="commentText">
                        <input type="hidden" name="categoryId" value="{{$id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" id="comment-btn" name="comment-btn" onsubmit="return proveraComment()">Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
