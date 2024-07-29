

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


//kiem tra  trang thai dang nhap
FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});


{
    status: 'connected',
    authResponse: {
        accessToken: '...',
        expiresIn:'...',
        signedRequest:'...',
        userID:'...'
    }
}


// Thuộc tính onlogin trên nút để thiết lập lệnh gọi lại JavaScript kiểm tra trạng thái đăng nhập để xem người đó đã đăng nhập thành công chưa:

<fb:login-button 
  scope="public_profile,email"
  onlogin="checkLoginState();">
</fb:login-button>


// Đây là lệnh gọi lại. Lệnh này gọi FB.getLoginStatus() để nhận trạng thái đăng nhập gần đây nhất. (statusChangeCallback() là hàm thuộc một phần của ví dụ xử lý phản hồi.)
function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }