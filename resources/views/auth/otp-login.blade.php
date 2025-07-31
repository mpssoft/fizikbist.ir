@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('otp.send') }}">
    @csrf
    <input type="text" name="login" placeholder="Email or Mobile" required>
    <button type="submit">Send OTP</button>
</form>

<form method="POST" action="{{ route('otp.verify') }}">
    @csrf
    <input type="text" name="login" placeholder="Email or Mobile again" required>
    <input type="text" name="otp" placeholder="Enter OTP" required>
    <button type="submit">Verify OTP</button>
</form>
