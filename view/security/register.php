
<form action="index.php?ctrl=security&action=registerTraitement" method="post">
    <p>
        <label>
            Nickname :
            <input type="text" name="nickname" maxlength="255">
        </label>
    </p>
    <p>
        <label>
            Email :
            <input type="email"  name="email" maxlength="255">
        </label>
    </p>
    <p>
        <label>
            Password :
            <input type="password"  name="password1" maxlength="255">
        </label>
    </p>
    <p>
        <label>
            Confirm Password :
            <input type="password"  name="password2" maxlength="255">
        </label>
    </p>
    <p>
        <input type="submit" name="submit" value="Register">
    </p>
</form>
