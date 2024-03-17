
// JavaScript để thêm chức năng cho nút chính
document.getElementById("dropdownButton").addEventListener("click", function() {
    var dropdownContent = document.getElementById("dropdownContent");
    // Toggle class "show" để ẩn/hiển thị nút con
    dropdownContent.classList.toggle("show");
});

// JavaScript để xử lý khi nhấp vào các nút con
var buttons = document.querySelectorAll('.dropdown-item button');
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        this.classList.toggle('selected');
    });
});

// JavaScript để xử lý khi nhấn nút "Bỏ Chọn"
document.getElementById("clearButton").addEventListener("click", function() {
    buttons.forEach(function(button) {
        button.classList.remove('selected');
    });
});

// JavaScript để xử lý khi nhấn nút "Xem Kết Quả"
document.getElementById("showResultButton").addEventListener("click", function() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.remove("show");
});
