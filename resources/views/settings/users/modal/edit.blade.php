<!-- Modal -->
<div class="modal fade" id="editUserModal-{{$index}}" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModal-{{$index}}">แก้ไขผู้ใช้งาน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left createUserForm">
                {{-- <form id="createUserForm" action="{{ route('setting.user.store') }}" method="post">
                    @csrf --}}
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly>

                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="prefix">คำนำหน้า</label>
                        <select name="prefix" class="form-control @error('prefix') is-invalid @enderror prefix">
                            <option value="default" selected disabled>กรุณาเลือกคำนำหน้า</option>
                            @foreach ($prefixes as $item)
                            <option value="{{$item->id}}" {{ old('prefix') == $item->id ? 'selected' : '' }}>{{$item->name_th}}</option>
                            @endforeach
                        </select>

                        @error('prefix')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="firstname">ชื่อ</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}">

                        @error('firstname')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="lastname">นามสกุล</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}">

                        @error('lastname')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role" class="text-danger">*</label><label for="role">ระดับ</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror role">
                            <option value="default" selected disabled>กรุณาเลือกระดับ</option>
                            @foreach ($roles as $item)
                            <option value="{{$item->id}}" {{ $user->role_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                            @endforeach
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                {{-- </form> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-success" id="editBtn" data-item="{{ $user }}">บันทึก</button>
            </div>
        </div>
    </div>
</div>
