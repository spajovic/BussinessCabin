<div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leave a message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('send.mail')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailText" id="labEmailText" class="col-form-label">Message :</label>
                        <input type="text" class="form-control" id="emailMessage" name="emailText">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" id="message-btn" name="message-btn" onsubmit="return proveraTextMail()">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
