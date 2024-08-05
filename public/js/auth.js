window.fbAsyncInit = function() {
    FB.init({
        appId: '849025356764898',
        cookie: true,
        xfbml: true,
        version: 'v20.0'
    });

    FB.AppEvents.logPageView();

    document.getElementById('fb-login-btn').onclick = function() {
        FB.login(function(response) {
            if (response.status === 'connected') {
                // Người dùng đã đăng nhập thành công
                var accessToken = response.authResponse.accessToken;
                console.log('Access Token:', accessToken);

                // Gọi API Facebook để lấy thông tin người dùng
                FB.api('/me', {
                    fields: 'name,email,picture'
                }, function(response) {
                    console.log('Successful login for: ' + response.name);
                    console.log('Email: ' + response.email);
                    console.log('Profile picture: ' + response.picture.data.url);

                    // Gửi thông tin người dùng đến server để xử lý đăng nhập
                    fetch('/your-backend-endpoint', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            name: response.name,
                            email: response.email,
                            picture: response.picture.data.url,
                            accessToken: accessToken
                        })
                    }).then(res => res.json()).then(data => {
                        console.log('Server response:', data);
                        // Xử lý dữ liệu từ server, ví dụ: chuyển hướng, lưu thông tin người dùng, vv.
                    }).catch(error => console.error('Error:', error));
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
            }
        }, {
            scope: 'public_profile,email'
        });
    };
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


//modal
var modal = document.getElementById("myModal");

var btn = document.getElementById("btn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}