
<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Medpux Lab - Login </title>

    <link rel="stylesheet" href="/css/reset.css">

    <link rel="stylesheet" href="/css/style.css" media="screen" type="text/css" />

</head>

<body>

<div class="wrap">
    <div class="avatar">
        <img src="/img/photo.jpg">
    </div>
    <?php echo form_open('/Home/CheckAuthetication/')?>
        <input type='hidden' name='csrfmiddlewaretoken' value='DTSinFHK25y8LauUx7KUGH1noBsbuugV' />
        <input type="text" name="login_id" placeholder="username" required>
        <div class="bar">
            <i></i>
        </div>
        <input type="password" name="password" placeholder="password" required>
        <a href="" class="forgot_link">forgot ?</a>

        <button type="submit">Sign in</button>
    </form>
</div>

<script src="/js/index.js"></script>

</body>

</html>
