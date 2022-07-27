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
                @foreach ($item->handlers as $index => $handler)
                <div class="d-flex align-items-center">
                    <p class="text-secondary m-0">{{$index + 1}}. {{$handler->user->getFullName()}}</p>
                    @if ($handler->status == 1)
                    <i class="fas fa-check-circle p-1" style='color:#28a745'></i>
                    @else
                    <i class="fas fa-times-circle p-1" style='color:#dc3545'></i>

                    @endif
                </div>
                @endforeach
            </div>
            {{-- แนบไฟล์ --}}
            <div class="form-group row px-2">
                <label class="col-sm-auto col-form-label ps-0" for="formFile">แนบไฟล์</label>
                <div class="col-sm-6 px-0">
                    <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" accept="image/*" value="{{ old('file') }}">

                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-success" id="btnSubmit">ยืนยัน</button>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
        </div>
    </div>
    </div>
</div>
