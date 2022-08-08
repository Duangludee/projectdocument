function showAlertWithCallBack(type, title, msg) {
    return Swal.fire({
        icon: type,
        title: title,
        text: msg,
        showDenyButton: true,
        confirmButtonText: 'ยืนยัน',
        denyButtonText: `ยกเลิก`,
      }).then((result) => {
        if (result.isConfirmed) {
            return true;
        }else {
            return false;
        }
    });
}
function showAlert(type, title, msg) {
    return Swal.fire({
        icon: type,
        title: title,
        text: msg,
        confirmButtonText: 'ยืนยัน',
      }).then((result) => {
        if (result.isConfirmed) {
            return true;
        }else {
            return false;
        }
    });
}
