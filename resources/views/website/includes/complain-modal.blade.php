<div class="modal fade" id="complainModal" tabindex="-1" aria-labelledby="complainModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="complainModalLabel">
                    Complain Submission
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('website.complain.store') }}" method="post" class="px-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name-text" class="col-form-label fw-semibold">Name *</label>
                        <input type="text" id="name-text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone-text" class="col-form-label fw-semibold">Phone *</label>
                        <input type="number" id="phone-text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email-text" class="col-form-label fw-semibold">Email *</label>
                        <input type="email" id="email-text" name="email" class="form-control" required>
                        <input type="hidden" name="subject" value="complain">
                    </div>
                    <div class="mb-3">
                        <label for="massage-text" class="col-form-label fw-semibold">Complain Text *</label>
                        <textarea id="massage-text" name="details" cols="30" rows="4"
                            class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
                            Complain Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>