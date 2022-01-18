window.fbAsyncInit = function () {
  FB.init({ appId: '1119182411925760', autoLogAppEvents: true, xfbml: true, version: 'v11.0' })
}

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0]
    if (d.getElementById(id)) return
    js = d.createElement(s); js.id = id
    js.src = 'https://connect.facebook.net/sk_SK/sdk/xfbml.customerchat.js'
    fjs.parentNode.insertBefore(js, fjs)
  }(document, 'script', 'facebook-jssdk'))