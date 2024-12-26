<div class="modal center-modal fade" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Country</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- The Form -->
            <form id="countryForm" action="{{ route('countries.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Country Name -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-700 font-size-16" for="country_name">Country Name</label>
                                <input type="text" id="country_name" name="name" class="form-control" placeholder="Input Country Name" required>
                            </div>
                        </div>

                        <!-- Note -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-700 font-size-16" for="note">Note</label>
                                <textarea id="note" name="note" class="form-control p-20" rows="4" placeholder="Enter any additional information here"></textarea>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="checkbox"  id="status" name="status" class="chk-col-success" value="1" checked>
                                <label  for="status">Active/Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
