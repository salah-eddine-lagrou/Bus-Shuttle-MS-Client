<form method="POST" action="{{ route('verification') }}">
    @csrf
    <div>
        <label for="mastercard">Numéro de compte Mastercard:</label>
        <input type="text" name="mastercard" id="mastercard">
    </div>

    <div>
        <label for="visa">Numéro de compte Visa:</label>
        <input type="text" name="visa" id="visa">
    </div>

    <button type="submit">Vérifier</button>
</form>
