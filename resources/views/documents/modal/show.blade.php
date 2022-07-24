<!-- Modal -->
<div class="modal fade" id="showDocModal-{{$item->id}}" tabindex="-1" aria-labelledby="showDocModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="showDocModal">{{$item->no}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
            <div class=" d-flex justify-content-end">
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">วันที่</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="date" value="{{$item->dateInToThai()}} - {{$item->dateOutToThai()}}" readonly>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="topic" class="form-label">เรื่อง</label>
                <input type="text" class="form-control" id="topic" value="{{$item->topic}}" readonly>
            </div>

            <div class="mb-3">
                <label for="from" class="form-label">จาก</label>
                <input type="text" class="form-control" id="from" value="{{$item->from}}" readonly>
            </div>

            <div class="mb-3">
                <label for="for" class="form-label">ถึง</label>
                <input type="text" class="form-control" id="for" value="{{$item->for}}" readonly>
            </div>

            <div>
                <label for="for" class="form-label">ผู้ดำเนินการ</label>
                <p class="text-secondary">{{$item->users}}</p>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        </div>
    </div>
    </div>
</div>
