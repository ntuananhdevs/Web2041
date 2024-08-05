var commentForm = document.getElementById('comment-form');
    var textarea = document.querySelector('.content-comments textarea');
    var submitBtn = document.querySelector('.submit-btn span');
    var loadingIcon = document.querySelector('.submit-btn .loading');

    textarea.addEventListener('input', function() {
        if (textarea.value.trim() !== "") {
            submitBtn.classList.add('enabled');
        } else {
            submitBtn.classList.remove('enabled');
        }
    });

    submitBtn.addEventListener('click', function(e) {
        if (!submitBtn.classList.contains('enabled')) {
            e.preventDefault(); // Ngăn chặn gửi form nếu không hợp lệ
        } else {
            // Thêm hiệu ứng loading và submit form
            submitBtn.classList.add('hidden');
            loadingIcon.classList.add('active');
            commentForm.submit();
        }
    });