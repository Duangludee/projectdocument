<!-- Modal -->
<div class="modal fade" id="showUserModal-{{ $index }}" tabindex="-1" aria-labelledby="showUserModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showUserModal-{{ $index }}">ข้อมูลผู้ใช้งาน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
                <form id="createUserForm" action="{{ route('setting.user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="firstname">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $user->getFullName() }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="role">ระดับ</label>
                        <input type="text" class="form-control" name="role" id="role" value="{{ $user->role->name }}" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>
