@if(session()->has('user'))
<div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update your profile picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('user.new.picture',session()->get('user')->users_id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="updatePostPicture">Choose new image</label>
                        <input type="file" class="form-control" id="updateUserPicture" name="updateUserPicture">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" id="updatePicture-btn" name="message-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
