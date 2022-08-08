<!-- Modal -->
<div class="modal fade" id="editOrganizationModal-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="editOrganizationModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แก้ไขหน่วยงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body text-left update-organization-form">
                <input type="hidden" name="organization_id" value="{{$item->id}}">
                <div class="form-group">
                    <label for="organization_name">ชื่อหน่วยงาน</label>
                    <input type="text" class="form-control" name="organization_name" id="organization_name" placeholder="กรอกชื่อหน่วยงาน" value="{{ $item->name }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary update-submit-btn">บันทึก</button>
            </div>
        </div>
    </div>
</div>
