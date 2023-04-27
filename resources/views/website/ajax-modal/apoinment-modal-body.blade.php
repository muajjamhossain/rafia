

<form action="{{ url('website/apoinment/store') }}" method="post" class="px-3 row" id="newModalForm">
    @csrf
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name-text"
                class="col-form-label fw-semibold">Name</label>
            <input type="text" name="name" id="name-text" class="form-control" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="age-text" class="col-form-label fw-semibold">Age</label>
            <input type="text" name="age" id="age-text" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="datepicker" class="col-form-label fw-semibold">Date</label>
            <input type="date" name="date" id="datepicker" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="timepicker" class="col-form-label fw-semibold">Time</label>
            <input type="time" name="time" id="timepicker" class="form-control">
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label for="gender-text"
                class="col-form-label fw-semibold">Gender</label>
            <select class="form-select" name="gender" id="gender-text">
                <option value="1" selected>Male</option>
                <option value="2">Female</option>
                <option value="3">Gay</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label for="patient-text" class="col-form-label fw-semibold">Patient
                Status New Patient or Old Patient</label>
            <select class="form-select" name="patient_status" id="patient-text" required>
                <option value="New" selected>New Patient</option>
                <option value="Old">Old Patient</option>
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3">
            <label for="description" class="col-form-label fw-semibold">Description</label>
            {{-- <input type="text" name="description" id="description" class="form-control"> --}}
            <textarea id="description" name="description" cols="30" rows="4" class="form-control" ></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="speciality-text"
                class="col-form-label fw-semibold">Speciality</label>
            <select class="form-select" name="speciality_id" id="speciality-text" required>
                <option selected disabled>Please Select</option>

            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="doctors -text"
                class="col-form-label fw-semibold">Doctors </label>
            <select class="form-select" name="doctor_id" id="doctors -text" required>
                <option selected disabled>Please Select</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
            Appointment Submit
        </button>
    </div>
</form>
